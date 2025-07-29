<?php

namespace App\Http\Controllers;

use App\Models\HeroSection;
use App\Models\Daerah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HeroSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
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
            'bgimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'subtitle' => 'required|string',
            'daerah_id' => 'required|exists:daerahs,id',
        ]);

        if ($request->hasFile('bgimage')) {
            $validated['bgimage'] = $request->file('bgimage')->store('images', 'public');
        }

        HeroSection::create($validated);

        $daerah = Daerah::find($request->daerah_id); // PENTING: ambil objek daerah berdasarkan ID

        return redirect()
            ->route('daerah.show.hero', ['nama_daerah' => $daerah->nama_daerah])
            ->with('success', 'Hero Section berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(HeroSection $heroSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HeroSection $heroSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nama_daerah, $id)
    {
        $hero = HeroSection::findOrFail($id);
        // ✅ Validasi lebih dulu sebelum update
        $validated = $request->validate([
            'bgimage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'subtitle' => 'required|string',
        ]);

        // Temukan daerah berdasarkan nama_daerah
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        // Upload gambar baru jika ada
        if ($request->hasFile('bgimage')) {
            $validated['bgimage'] = $request->file('bgimage')->store('images', 'public');
        }

        // ✅ Update data daerah hanya sekali
        $hero->update([
            'bgimage' => $validated['bgimage'],
            'title' => $validated['title'],
            'subtitle' => $validated['subtitle'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HeroSection $heroSection)
    {
        //
    }
}
