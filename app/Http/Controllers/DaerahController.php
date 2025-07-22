<?php

namespace App\Http\Controllers;

use App\Models\Daerah;
use Illuminate\Http\Request;
use inertia\Inertia;

class DaerahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daerah = Daerah::all();
        $activities = Daerah::count();
        
        return Inertia::render('Main/Admin/Daftar_Kab', [
            'daerahs' => $daerah,
            'jumlah' => $activities

        ]);
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
            'logo_daerah' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama_daerah' => 'required|string',
            'deskripsi' => 'required|string',
            'daerah' => 'required|in:Kabupaten,Kota',
        ]);

        // Simpan gambar
        if ($request->hasFile('logo_daerah')) {
            $validated['logo_daerah'] = $request->file('logo_daerah')->store('images', 'public');
        }

        Daerah::create($validated);

        return redirect()->route('index.admin');
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
