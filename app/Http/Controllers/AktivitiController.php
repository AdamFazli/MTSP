<?php

namespace App\Http\Controllers;

use App\Models\Aktiviti;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AktivitiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aktivitis = Aktiviti::all();

        $today = today();

        $upcomingAktivitis = Aktiviti::where('tarikh_aktiviti', '>=', $today)
            ->orderBy('tarikh_aktiviti')
            ->orderBy('masa_mula')
            ->get();

        $latestAktivitis = Aktiviti::where('tarikh_aktiviti', '<', $today)
            ->orderByDesc('tarikh_aktiviti')
            ->orderByDesc('masa_mula')
            ->take(3)
            ->get();

        $pastAktivitis = Aktiviti::where('tarikh_aktiviti', '<', $today)
            ->orderByDesc('tarikh_aktiviti')
            ->orderByDesc('masa_mula')
            ->get();

        // nanti tiga tiga satu kan pahhm

        return view('Berita.Aktiviti.aktiviti', [
            'aktivitis' => $aktivitis,
            'upcomingAktivitis' => $upcomingAktivitis,
            'latestAktivitis' => $latestAktivitis,
            'pastAktivitis' => $pastAktivitis,
        ]);
    }


    public function calendar()
    {
        return view('Berita.Aktiviti.aktiviti_calendar', ['useBootstrap' => true]);
    }

    public function getEvents()
    {
        $aktivitis = Aktiviti::all();

        $events = $aktivitis->map(function ($aktiviti) {
            return [
                'title' => $aktiviti->tajuk_aktiviti,
                'start' => $aktiviti->tarikh_aktiviti->format('Y-m-d') . ' ' . $aktiviti->masa_mula,
                'end' => $aktiviti->tarikh_aktiviti->format('Y-m-d') . ' ' . $aktiviti->masa_tamat,
                'location' => $aktiviti->tempat_aktiviti,
                'description' => $aktiviti->deskripsi_aktiviti,
            ];
        });

        return response()->json($events);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Berita.Aktiviti.tambah_aktiviti');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'tajuk_aktiviti' => 'required',
            'gambar_aktiviti' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tarikh_aktiviti' => 'required|date',
            'masa_mula' => 'required',
            'masa_tamat' => 'required',
            'tempat_aktiviti' => 'required',
            'deskripsi_aktiviti' => 'required',
        ]);

        if ($request->hasFile('gambar_aktiviti')) {
            $image = $request->file('gambar_aktiviti');
            $name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            
            // Store the image in storage/app/public/images
            $image->storeAs('public/images', $name);
            $incomingFields['gambar_aktiviti'] = $name;
        }

        //This is a security measure to prevent Cross-Site Scripting (XSS) attacks, which are a common attack vector for malicious users.
        $incomingFields['tajuk_aktiviti'] = strip_tags($incomingFields['tajuk_aktiviti']);
        $incomingFields['gambar_aktiviti'] = strip_tags($incomingFields['gambar_aktiviti']);
        $incomingFields['tarikh_aktiviti'] = strip_tags($incomingFields['tarikh_aktiviti']);
        $incomingFields['masa_mula'] = strip_tags($incomingFields['masa_mula']);
        $incomingFields['masa_tamat'] = strip_tags($incomingFields['masa_tamat']);
        $incomingFields['tempat_aktiviti'] = strip_tags($incomingFields['tempat_aktiviti']);
        $incomingFields['deskripsi_aktiviti'] = strip_tags($incomingFields['deskripsi_aktiviti']);
        $incomingFields['user_id'] = auth()->id();

        Aktiviti::create($incomingFields);

        return redirect()->route('aktiviti.index')->with('success', 'Aktiviti berjaya ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aktiviti $aktiviti)
    {
        return view('Berita.Aktiviti.lihat_aktiviti', [
            'aktiviti' => $aktiviti,
        ]);
    }

    public function search(Request $request)
    {
        try {
            $searchQuery = $request->input('search');

            // Implement your search logic here, e.g., using Eloquent
            $searchResults = Aktiviti::where('tajuk_aktiviti', 'like', "%$searchQuery%")
                ->orWhere('tempat_aktiviti', 'like', "%$searchQuery%")
                ->orWhere('deskripsi_aktiviti', 'like', "%$searchQuery%")
                ->get();

            return view('Berita.Aktiviti.search_aktiviti', [
                'searchResults' => $searchResults,
                'searchQuery' => $searchQuery,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aktiviti $aktiviti)
    {
        return view('Berita.Aktiviti.tambah_aktiviti', [
            'aktiviti' => $aktiviti,
        ]);
    }

    /**
     * Return the partial view for AJAX tab loading.
     */
    public function partial()
    {
        // Fetch the latest 10 activities (customize this if you want more)
        $aktiviti = Aktiviti::orderBy('tarikh', 'DESC')->take(10)->get();

        // Return the 'ajax' view from 'Aktiviti' folder
        return view('Berita.Aktiviti.ajax', compact('aktiviti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aktiviti $aktiviti)
    {
        $incomingFields = $request->validate([
            'tajuk_aktiviti' => 'required',
            'gambar_aktiviti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tarikh_aktiviti' => 'required|date',
            'masa_mula' => 'required',
            'masa_tamat' => 'required',
            'tempat_aktiviti' => 'required',
            'deskripsi_aktiviti' => 'required',
        ]);

        if ($request->hasFile('gambar_aktiviti')) {
            // Delete old image if it exists
            if ($aktiviti->gambar_aktiviti) {
                Storage::delete('public/images/' . $aktiviti->gambar_aktiviti);
            }
            
            $image = $request->file('gambar_aktiviti');
            $name = date('YmdHis') . '.' . $image->getClientOriginalExtension();
            
            // Store the new image in storage/app/public/images
            $image->storeAs('public/images', $name);
            $incomingFields['gambar_aktiviti'] = $name;
        } else {
            unset($incomingFields['gambar_aktiviti']);
        }

        //This is a security measure to prevent Cross-Site Scripting (XSS) attacks, which are a common attack vector for malicious users.
        $incomingFields['tajuk_aktiviti'] = strip_tags($incomingFields['tajuk_aktiviti']);
        if (isset($incomingFields['gambar_aktiviti'])) {
            $incomingFields['gambar_aktiviti'] = strip_tags($incomingFields['gambar_aktiviti']);
        }
        $incomingFields['tarikh_aktiviti'] = strip_tags($incomingFields['tarikh_aktiviti']);
        $incomingFields['masa_mula'] = strip_tags($incomingFields['masa_mula']);
        $incomingFields['masa_tamat'] = strip_tags($incomingFields['masa_tamat']);
        $incomingFields['tempat_aktiviti'] = strip_tags($incomingFields['tempat_aktiviti']);
        $incomingFields['deskripsi_aktiviti'] = strip_tags($incomingFields['deskripsi_aktiviti']);

        $aktiviti->update($incomingFields);

        return redirect()->route('aktiviti.index')->with('success', 'Aktiviti berjaya dikemaskini!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aktiviti $aktiviti)
    {
        // Delete the image file using Storage facade
        if ($aktiviti->gambar_aktiviti) {
            Storage::delete('public/images/' . $aktiviti->gambar_aktiviti);
        }
        
        $aktiviti->delete();
        return redirect()->route('aktiviti.index')->with('success', 'Aktiviti berjaya dipadam!');
    }
}
