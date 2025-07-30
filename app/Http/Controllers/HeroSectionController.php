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
}
