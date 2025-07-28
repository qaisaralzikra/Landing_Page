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

        // Decode nama daerah jika ada spasi atau karakter spesial
        $nama_daerah = urldecode($nama_daerah);

        // Cari data daerah berdasarkan nama
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        // Filter data AppSection berdasarkan daerah_id yang cocok
        $query = HeroSection::where('daerah_id', $daerah->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%$search%")
                    ->orWhere('subtitle', 'like', "%$search%");
            });
        }

        $heros = $query->get();

        return Inertia::render('Main/Admin/Daerah_Components/HeroSection', [
            'daerah' => $daerah,
            'hero' => $heros, // Ganti dari 'app' agar lebih konsisten
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
        // Decode nama daerah dari URL
        $nama_daerah = urldecode($nama_daerah);

        // Filter data AppSection berdasarkan daerah_id yang cocok

        // Ambil hanya 1 data daerah yang cocok
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        $query = SosialMedia::where('daerah_id', $daerah->id);

        $sosmed = $query->get();

        // Kirim hanya data daerah itu ke view
        return Inertia::render('Main/Admin/Daerah_Components/FooterSection', [
            'daerah' => $daerah,
            'sosmed' => $sosmed,
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
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:daerahs,id',
        ]);

        $daerah = Daerah::find($request->id);
        $daerah->delete();

        return back()->with('success', 'Anggota berhasil dihapus.');
    }

    public function destroyhero(Request $request, $nama_daerah)
    {
        // Temukan data daerah berdasarkan nama_daerah dari URL
        $daerah = Daerah::where('nama_daerah', urldecode($nama_daerah))->firstOrFail();

        // Ambil ID HeroSection dari request body
        $id = $request->input('id');

        // Cek jika ID tidak dikirim
        if (!$id) {
            return redirect()->back()->withErrors(['id' => 'ID HeroSection tidak dikirim.']);
        }

        // Temukan HeroSection berdasarkan ID dan daerah yang sesuai
        $hero = HeroSection::where('id', $id)->where('daerah_id', $daerah->id)->first();

        // Jika tidak ditemukan, kembalikan error
        if (!$hero) {
            return redirect()->back()->withErrors(['id' => 'Data HeroSection tidak ditemukan.']);
        }

        // Hapus HeroSection
        $hero->delete();

        // Redirect kembali (atau bisa return inertia redirect)
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    public function destroyapp(Request $request, $nama_daerah)
    {
        // Temukan data daerah berdasarkan nama_daerah dari URL
        $daerah = Daerah::where('nama_daerah', urldecode($nama_daerah))->firstOrFail();

        // Ambil ID HeroSection dari request body
        $id = $request->input('id');

        // Cek jika ID tidak dikirim
        if (!$id) {
            return redirect()->back()->withErrors(['id' => 'ID AppSection tidak dikirim.']);
        }

        // Temukan HeroSection berdasarkan ID dan daerah yang sesuai
        $app = AppSection::where('id', $id)->where('daerah_id', $daerah->id)->first();

        // Jika tidak ditemukan, kembalikan error
        if (!$app) {
            return redirect()->back()->withErrors(['id' => 'Data AppSection tidak ditemukan.']);
        }

        // Hapus HeroSection
        $app->delete();

        // Redirect kembali (atau bisa return inertia redirect)
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
