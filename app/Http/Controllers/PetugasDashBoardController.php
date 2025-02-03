<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class PetugasDashBoardController extends Controller
{
    public function index()
    {
        $transaksiCount = Transaksi::count(); // Menghitung jumlah transaksi
        $mobilCount = Mobil::count(); // Menghitung jumlah mobil
        $petugasCount = User::where('lvl', 'petugas')->count(); // Menghitung jumlah user dengan level petugas
        $memberCount = Member::count(); // Menghitung jumlah members

        return view('dashboard', compact('transaksiCount', 'mobilCount', 'petugasCount', 'memberCount'));
    }
}
