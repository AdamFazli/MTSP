<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempahDewan; // Create this model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TempahDewanController extends Controller
{
    // Show form to user
    public function create()
    {
        if (auth()->check() && auth()->user()->usertype === 'admin') {
            return redirect()->route('tempah.dewan.index'); 
        }

        
        $userBookings = [];

        if (Auth::check()) {
            $userBookings = TempahDewan::where('user_id', Auth::id())->orderBy('date', 'desc')->get();
        }

        $dewanTypes = ['Dewan ABU DAUD', 'Dewan AL BUKHARI', 'Dewan AL TIRMIZI'];
        return view('tempahDewan.create', compact('dewanTypes', 'userBookings'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'date' => 'required|date|after_or_equal:today',
            'dewan_type' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $booking = new TempahDewan($validated);

        if (auth()->check()) {
            $booking->user_id = auth()->id();
        }

        $booking->status = 'pending'; 
        $booking->save();

        return redirect()->route('tempah.dewan.create')->with('success', 'Tempahan dewan berjaya dihantar!');
    }


    public function adminIndex()
    {
        $bookings = TempahDewan::orderBy('date', 'desc')->paginate(10);
        return view('tempahDewan.admin.index', compact('bookings'));
    }

    public function adminShow($id)
    {
        $booking = TempahDewan::findOrFail($id);
        return view('tempahDewan.admin.show', compact('booking'));
    }

    public function adminUpdate(Request $request, $id)
    {
        $booking = TempahDewan::findOrFail($id);
        $booking->status = $request->input('status');
        $booking->save();

        return redirect()->route('tempah.dewan.index')->with('success', 'Status tempahan dikemaskini.');
    }
}
