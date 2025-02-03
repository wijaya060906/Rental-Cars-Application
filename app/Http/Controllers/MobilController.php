<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::all();
        return view('admin.mobil.data_mobil', compact('mobils'));
    }

    public function edit(Mobil $mobil)
    {
     return view('admin.mobil.edit', compact('mobil'));
    }


    public function create()
    {
        return view('admin.mobil.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'tahun' => 'required|date',
            'harga' => 'required|numeric',
            'nopol' => 'required|string|max:20', // Add validation for nopol
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'required|in:Tersedia,Tidak',
        ]);
    
        $filePath = $request->file('foto')->store('uploads', 'public');
    
        // Create the mobil record
        Mobil::create([
            'brand' => $request->brand,
            'type' => $request->type,
            'tahun' => $request->tahun,
            'harga' => $request->harga,
            'nopol' => $request->nopol, // Store nopol in the database
            'foto' => $filePath,
            'status' => $request->status,
        ]);
    
        return redirect()->route('admin.mobil')->with('success', 'Mobil created successfully.');
    }
    
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'brand' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'tahun' => 'required|date_format:Y',
            'harga' => 'required|numeric',
            'nopol' => 'required|string|max:20', // Add validation for nopol
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|string|max:255',
        ]);
    
        $mobil->brand = $request->brand;
        $mobil->type = $request->type;
        $mobil->tahun = $request->tahun;
        $mobil->harga = $request->harga;
        $mobil->nopol = $request->nopol; // Update nopol
        $mobil->status = $request->status;
    
        if ($request->hasFile('foto')) {
            if ($mobil->foto) {
                Storage::disk('public')->delete($mobil->foto);
            }
            $mobil->foto = $request->file('foto')->store('uploads', 'public');
        }
    
        $mobil->save();
    
        return redirect()->route('mobils.index')->with('success', 'Mobil updated successfully');
    }
    

    public function destroy(Mobil $mobil)
    {
        $mobil->delete();
        return redirect()->route('mobils.index')->with('success', 'Mobil deleted successfully.');
    }
}
