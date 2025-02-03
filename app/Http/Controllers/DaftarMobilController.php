<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class DaftarMobilController extends Controller
{
    public function index()
    {
        // Fetch all vehicles
        $mobils = Mobil::all();

        // Return the view with the list of vehicles
        return view('daftar_mobil.index', compact('mobils'));
    }
}
