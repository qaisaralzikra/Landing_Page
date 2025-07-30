<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Support\Facades\DB;
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


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo_daerah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'daerah' => 'required|in:Kabupaten,Kota',
            'nama_daerah' => 'required|string',
            'deskripsi' => 'nullable|string',
            'sosial_media' => 'nullable|array',
            'sosial_media.*.media_sosial' => 'nullable|in:instagram,facebook,youtube,x,email',
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
    public function update(Request $request, $id)
    {
        $daerah = Daerah::findOrFail($id);

        // ✅ Validasi lebih dulu sebelum update
        $validated = $request->validate([
            'nama_daerah' => 'required|string',
            'daerah' => 'required|string',
            'logo_daerah' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sosial_media' => 'nullable|array',
            'sosial_media.*.media_sosial' => 'nullable|string',
            'sosial_media.*.link_sosmed' => 'nullable|url',
        ]);

        // ✅ Simpan logo jika diupload
        if ($request->hasFile('logo_daerah')) {
            $path = $request->file('logo_daerah')->store('images', 'public');
            $validated['logo_daerah'] = $path;
        } else {
            // Tetap pakai logo lama
            $validated['logo_daerah'] = $daerah->logo_daerah;
        }

        // ✅ Update data daerah hanya sekali
        $daerah->update([
            'nama_daerah' => $validated['nama_daerah'],
            'daerah' => $validated['daerah'],
            'logo_daerah' => $validated['logo_daerah'],
        ]);

        // ✅ Simpan atau perbarui sosial media berdasarkan 'media_sosial'
        if (!empty($validated['sosial_media'])) {
            foreach ($validated['sosial_media'] as $item) {
                $daerah->sosial_media()->updateOrCreate(
                    ['media_sosial' => $item['media_sosial']], // kriteria pencarian
                    [
                        'link_sosmed' => $item['link_sosmed'] ?? '',
                    ]
                );
            }
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
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
}
