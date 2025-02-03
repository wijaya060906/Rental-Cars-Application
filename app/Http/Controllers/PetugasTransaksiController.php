<?php

namespace App\Http\Controllers;

use App\Models\Kembali;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasTransaksiController extends Controller
{
    public function index()
    {
        // Fetch all records from the Kembali model
        $kembalis = Kembali::with('transaksi')->get();
        return view('petugas.kembali.kembali', compact('kembalis'));
    }

    public function indextransaksi()
    {
        $transaksis = Transaksi::all();
        return view('petugas.transaksi.transaksi', compact('transaksis'));
    }

    public function kembali(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'tgl_kembali' => 'required|date',
            'kondisi_mobil' => 'required|string',
        ]);

        $denda = strlen($request->kondisi_mobil) ; // Adjust the penalty calculation

        // Create a new entry in the Kembali table
        Kembali::create([
            'id_transaksi' => $transaksi->id,
            'tgl_kembali' => $request->tgl_kembali,
            'kondisi_mobil' => $request->kondisi_mobil,
            'denda' => $denda,
        ]);

        // Update the transaction status to 'kembali'
        $transaksi->update(['status' => 'kembali']);

        return redirect()->route('petugas.kembali.kembali')->with('success', 'Mobil berhasil dikembalikan.');
    }

    public function create()
    {
        return view('petugas.transaksi.create'); // Create a form view for creating new transaksi
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:members,id',
            'nopol' => 'required|exists:mobils,nopol',
            'tgl_booking' => 'required|date',
            'tgl_ambil' => 'required|date',
            'tgl_kembali' => 'required|date',
            'supir' => 'required|integer',
            'total' => 'required|numeric',
            'downpayment' => 'required|numeric',
            'kekurangan' => 'required|numeric',
            'status' => 'required|in:Booking,approve,ambil,kembali',
        ]);

        Transaksi::create($request->all());
        return redirect()->route('petugas.transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    public function edit(Transaksi $transaksi)
{
    if (!$transaksi) {
        \Log::error('Transaksi not found');
    }
    return view('petugas.transaksi.edit', compact('transaksi'));
}

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            // Same validation rules as in store
        ]);

        $transaksi->update($request->all());
        return redirect()->route('petugas.transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('petugas.transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }

    

    public function approve(Transaksi $transaksi)
{
    $transaksi->update(['status' => 'approve']);
    return redirect()->route('petugas.kembali.kembali')->with('success', 'Transaksi approved successfully.');
}

public function memberkembali(Request $request, Transaksi $transaksi)
{

    $transaksi->update([
        'status' => 'kembali',
    ]);

    return redirect()->route('dashboard')->with('success', 'Transaksi approved successfully.');
}


}
