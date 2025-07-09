<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Berita\StoreBeritaRequest;


class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $berita = Berita::orderBy('created_at', 'ASC')->get();
        return view('Berita.berita_umum', compact('berita'));
    }

    public function search(Berita $berita)
    {
        $search_text = isset($_GET['query']) ? $_GET['query'] : '';

        $berita = Berita::where('name', 'LIKE', '%' . $search_text . '%')
            ->orWhere(function ($query) use ($search_text) {
                $query->where('description', 'LIKE', '%' . $search_text . '%')
                    ->orWhereRaw('description LIKE ?', ['%' . $search_text . '%']);
            })
            ->get();

        return view('Berita.berita_umum', compact('berita', 'search_text'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Berita.create_berita');
    }


    /**
     * Store a newly created resource in storage.
     */
    // ...existing code...

    public function store(StoreBeritaRequest $request, Berita $berita)
    {
        $validated = $request->validated();

        // Check if an image is uploaded
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Generate a unique filename for the image
            $profileImage = date('YmdHis') . "." . $request->file('image')->getClientOriginalExtension();
            
            // Store the image in storage/app/public/images
            $request->file('image')->storeAs('public/images', $profileImage);
            
            // Save the filename in the validated data
            $validated['image'] = $profileImage;
        }

        // Create a new 'berita' record with the uploaded image filename
        $berita = Berita::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? null,
        ]);

        return redirect()->route('berita umum')
            ->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    /* public function show(Berita $berita)
    {
        $previousBerita = Berita::where('id', '<', $berita->id)->orderByDesc('id')->first();
        $nextBerita = Berita::where('id', '>', $berita->id)->orderBy('id')->first();

        return view('Berita.details_berita', compact('berita', 'previousBerita', 'nextBerita'));
    } */

    public function show(Berita $berita)
    {
        $berita = Berita::find($berita->id);
        $previousBerita = Berita::where('id', '<', $berita->id)->orderByDesc('id')->first();
        $nextBerita = Berita::where('id', '>', $berita->id)->orderBy('id')->first();

        return view('Berita.details_berita', compact('berita', 'previousBerita', 'nextBerita'));
    }

    /* public function next(Berita $berita)
    {
        $nextBerita = Berita::where('id', '>', $berita->id)->orderBy('id')->first();

        return redirect()->route('details.berita', $nextBerita->id);
    }

    public function previous(Berita $berita)
    {
        $previousBerita = Berita::where('id', '<', $berita->id)->orderByDesc('id')->first();

        return redirect()->route('details.berita', $previousBerita->id);
    } */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {

        /*  $berita = Berita::find($id);
         return view('Berita.edit_berita', compact('berita')); */

        return view('Berita.edit_berita', compact('berita'));
    }

    /**
     * Return the partial view for AJAX tab loading.
     */
    public function partial()
    {
        $berita = Berita::orderBy('created_at', 'DESC')->take(10)->get(); // or paginate() if needed
        return view('Berita.ajax', compact('berita'));
    }


    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            // Delete old image if it exists
            if ($berita->image) {
                Storage::delete('public/images/' . $berita->image);
            }
            
            // Generate a unique filename for the new image
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            
            // Store the new image in storage/app/public/images
            $image->storeAs('public/images', $profileImage);
            
            $input['image'] = $profileImage;
        } else {
            unset($input['image']);
        }

        $berita->update($input);

        return redirect('berita_umum')
            ->with('success', 'Product updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Check if the Berita is found
        if (!$berita) {
            abort(404);
        }

        // Delete the image file using Storage facade
        if (!empty($berita->image)) {
            Storage::delete('public/images/' . $berita->image);
        }

        // Delete the Berita record
        $berita->delete();

        return back();
    }
}
