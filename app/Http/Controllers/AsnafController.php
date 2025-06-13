<?php

namespace App\Http\Controllers;

use App\Models\Asnaf;
use Illuminate\Http\Request;
use App\Exports\AsnafExport;
use Maatwebsite\Excel\Facades\Excel;

class AsnafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asnafs = Asnaf::all();
        return view('admin.e-asnaf', compact('asnafs'));
    }

    public function create()
    {
        return view('E-Asnaf.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'ic' => 'required|unique:asnafs',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'household_size' => 'required|integer',
            'income' => 'required|numeric',
            'expenses' => 'required|numeric',
            'job_status' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);


        // Save logic (example)
        Asnaf::create($validated + [
            'photo' => $request->file('photo')?->store('photos', 'public'),
            'documents' => $request->file('documents')?->store('docs', 'public'),
        ]);

        return redirect()->route('asnaf.index')->with('success', 'Asnaf saved!');
    }

    public function edit($id)
    {
        $asnaf = Asnaf::findOrFail($id);
        return view('E-Asnaf.edit', compact('asnaf'));
    }

    public function update(Request $request, $id)
    {
        $asnaf = Asnaf::findOrFail($id);
        $asnaf->update($request->all());
        return redirect()->route('asnaf.index')->with('success', 'Maklumat berjaya dikemaskini.');
    }

    public function destroy($id)
    {
        $asnaf = Asnaf::findOrFail($id);
        $asnaf->delete();

        return redirect()->route('asnaf.index')->with('success', 'Rekod Asnaf berjaya dipadam.');
    }

    public function exportExcel()
    {
        return Excel::download(new AsnafExport, 'asnafs.xlsx');
    }
}
