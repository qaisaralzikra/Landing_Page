<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Daerah;
use App\Models\SosialMedia;
use Illuminate\Http\Request;
use Inertia\Inertia;


class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Footer $footer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
