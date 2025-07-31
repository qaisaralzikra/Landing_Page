<?php

namespace App\Http\Controllers;

use App\Models\AppSection;
use App\Models\Daerah;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AppSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo_app' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_app' => 'required|string',
            'deskripsi' => 'required|string',
            'link' => 'required|string',
            'versi' => 'nullable|string',
            'daerah_id' => 'required|exists:daerahs,id',
        ]);

        if ($request->hasFile('logo_app')) {
            $validated['logo_app'] = $request->file('logo_app')->store('images', 'public');
        }

        AppSection::create($validated);

        $daerah = Daerah::find($request->daerah_id); // PENTING: ambil objek daerah berdasarkan ID

        return redirect()
            ->route('daerah.show.app', ['nama_daerah' => $daerah->nama_daerah])
            ->with('success', 'App Section berhasil ditambahkan.');
    }

    public function update(Request $request, $nama_daerah, $id)
    {
        $app = AppSection::findOrFail($id);
        // ✅ Validasi lebih dulu sebelum update
        $validated = $request->validate([
            'logo_app' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_app' => 'required|string',
            'deskripsi' => 'required|string',
            'link' => 'required|string',
            'versi' => 'nullable|string',
        ]);

        // Temukan daerah berdasarkan nama_daerah
        $daerah = Daerah::where('nama_daerah', $nama_daerah)->firstOrFail();

        // Upload gambar baru jika ada
        if ($request->hasFile('logo_app')) {
            $validated['logo_app'] = $request->file('logo_app')->store('images', 'public');
        }

        // ✅ Update data daerah hanya sekali
        $app->update([
            'nama_app' => $validated['nama_app'],
            'logo_app' => $validated['logo_app'],
            'deskripsi' => $validated['deskripsi'],
            'link' => $validated['link'],
            'versi' => $validated['versi'],
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
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
