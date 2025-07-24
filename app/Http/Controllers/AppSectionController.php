<?php

namespace App\Http\Controllers;

use App\Models\AppSection;
use App\Models\Daerah;
use Illuminate\Http\Request;

class AppSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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
            'logo_app' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_app' => 'required|string',
            'deskripsi' => 'required|string',
            'link' => 'required|string',
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

    /**
     * Display the specified resource.
     */
    public function show(AppSection $appSection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppSection $appSection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppSection $appSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppSection $appSection)
    {
        //
    }
}
