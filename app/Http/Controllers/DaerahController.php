<?php

namespace App\Http\Controllers;

use App\Models\AppSection;
use App\Models\Daerah;
use Illuminate\Support\Facades\DB;
use App\Models\SosialMedia;
use App\Models\HeroSection;
use Illuminate\Http\Request;
use inertia\Inertia;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('q');

        $query = Daerah::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('daerah', 'like', "%$search%")
                    ->orWhere('nama_daerah', 'like', "%$search%");
            });
        }

        $daerahs = $query->get();
        $jumlah = $daerahs->count();

        return Inertia::render('Main/Admin/Daftar_Kab', [ // sesuai path Vue
            'daerahs' => $daerahs,
            'jumlah' => $jumlah,
        ]);
    }

    public function componentHeroSection($nama_daerah, Request $request)
    {
        $search = $request->query('q');

        $query = HeroSection::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('subtitle', 'like', "%$search%");
            });
        }

        $heros = $query->get();
        // Decode jika URL mengandung spasi atau karakter khusus
        $nama_daerah = urldecode($nama_daerah);

        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        return Inertia::render('Main/Admin/Daerah_Components/HeroSection', [
            'daerah' => $daerah,
            'hero' => $heros,
        ]);
    }

    public function componentAppSection($nama_daerah, Request $request)
    {
        $search = $request->query('q');

        // Decode nama daerah jika ada spasi atau karakter spesial
        $nama_daerah = urldecode($nama_daerah);

        // Cari data daerah berdasarkan nama
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        // Filter data AppSection berdasarkan daerah_id yang cocok
        $query = AppSection::where('daerah_id', $daerah->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_app', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        $apps = $query->get();

        return Inertia::render('Main/Admin/Daerah_Components/AppSection', [
            'daerah' => $daerah,
            'apps' => $apps, // Ganti dari 'app' agar lebih konsisten
        ]);
    }

    public function componentFooterSection($nama_daerah, Request $request)
    {
        $search = $request->query('q');

        // Decode nama daerah jika ada spasi atau karakter spesial
        $nama_daerah = urldecode($nama_daerah);

        // Cari data daerah berdasarkan nama
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        // Filter data AppSection berdasarkan daerah_id yang cocok
        $query = AppSection::where('daerah_id', $daerah->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_app', 'like', "%$search%")
                    ->orWhere('deskripsi', 'like', "%$search%");
            });
        }

        $apps = $query->get();

        return Inertia::render('Main/Admin/Daerah_Components/FooterSection', [
            'daerah' => $daerah,
            'apps' => $apps, // Ganti dari 'app' agar lebih konsisten
        ]);
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'logo_daerah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'nama_daerah' => 'required|string',
        //     'deskripsi' => 'required|string',
        //     'daerah' => 'required|in:Kabupaten,Kota',
        // ]);

        // // Simpan gambar
        // if ($request->hasFile('logo_daerah')) {
        //     $validated['logo_daerah'] = $request->file('logo_daerah')->store('images', 'public');
        // }

        // Daerah::create($validated);



        $validated = $request->validate([
            'logo_daerah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'daerah' => 'required|in:Kabupaten,Kota',
            'nama_daerah' => 'required|string',
            'deskripsi' => 'nullable|string',
            'sosial_media' => 'array',
            'sosial_media.*.media_sosial' => 'required|in:instagram,facebook,youtube,x,email',
            'sosial_media.*.link_sosmed' => 'nullable|string',
        ]);

        // Simpan gambar
        if ($request->hasFile('logo_daerah')) {
            $validated['logo_daerah'] = $request->file('logo_daerah')->store('images', 'public');
        }

        DB::transaction(function () use ($validated) {
            $daerah = Daerah::create([
                'logo_daerah' => $validated['logo_daerah'],
                'daerah' => $validated['daerah'],
                'nama_daerah' => $validated['nama_daerah'],
                'deskripsi' => $validated['deskripsi'],
            ]);

            foreach ($validated['sosial_media'] as $sosmed) {
                if (!empty($sosmed['link_sosmed'])) {
                    $daerah->sosialMedia()->create([
                        'media_sosial' => $sosmed['media_sosial'],
                        'link_sosmed' => $sosmed['link_sosmed'],
                    ]);
                }
            }
        });

        return redirect()->route(route: 'index.admin');
    }
    /**
     * Display the specified resource.
     */
    public function show(Daerah $daerah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daerah $daerah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Daerah $daerah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daerah $daerah)
    {
        //
    }
}
