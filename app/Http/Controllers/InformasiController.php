<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Http\Requests\StoreInformasiRequest;
use App\Http\Requests\UpdateInformasiRequest;


class InformasiController extends Controller
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

    public function visi_misi()
    {
        return view('Informasi.visi_misi');
        //
    }

    /**
     * Return the partial view for AJAX tab loading.
     */
    public function partial()
    {
        // Fetch the latest 10 pieces of Informasi (or customize as needed)
        $informasi = Informasi::latest()->take(10)->get();

        // Return the 'ajax' view from 'Informasi' folder
        return view('Informasi.ajax', compact('informasi'));
    }

    public function carta_organisasi()
    {
        return view('Informasi.carta_organisasi');
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInformasiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInformasiRequest $request, Informasi $informasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        //
    }
}
