<?php

namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Kembali;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;


class BayarController extends Controller
{
    public function index()
{
    $kembalis = Kembali::with('transaksi')->get(); // Adjust as needed to load related data
    $bayars = Bayar::all(); // Fetch all payment records
    return view('petugas.bayar.bayar', compact('kembalis', 'bayars'));
}

public function store(Request $request)
{
    $request->validate([
        'id_kembali' => 'required|exists:kembalis,id',
        'tgl_bayar' => 'required|date',
        'status' => 'required|in:Lunas,belum_lunas',
    ]);

    // Fetch the kembalis data to get the return date
    $kembali = Kembali::find($request->id_kembali);
    
    // Fetch the associated transaksi data
    $transaksi = Transaksi::find($kembali->id_transaksi);
    
    // Convert dates to Carbon instances
    $tgl_kembali_kembalis = Carbon::parse($kembali->tgl_kembali);
    $tgl_kembali_transaksi = Carbon::parse($transaksi->tgl_kembali);
    
    // Calculate late return fee
    $late_fee = 0;
    if ($tgl_kembali_kembalis > $tgl_kembali_transaksi) {
        $late_days = $tgl_kembali_kembalis->diffInDays($tgl_kembali_transaksi);
        $late_fee = $late_days * 2000; // Add 2000 for each late day
    }

    // Fetch the mobil data to get harga
    $mobil = Mobil::where('nopol', $transaksi->nopol)->first();

    // Calculate total_bayar
    $total_bayar = $mobil->harga + $kembali->denda + $late_fee;

    // Create the payment record
    Bayar::create([
        'id_kembali' => $request->id_kembali,
        'tgl_bayar' => $request->tgl_bayar,
        'total_bayar' => $total_bayar,
        'status' => $request->status,
    ]);

    return redirect()->route('petugas.kembali.kembali')->with('success', 'Payment recorded successfully.');
}



public function edit(Bayar $bayar)
{
    $kembalis = Kembali::all(); // Get all Kembali records to populate the dropdown
    return view('petugas.bayar.edit', compact('bayar', 'kembalis'));
}

public function update(Request $request, Bayar $bayar)
{
    $request->validate([
        'id_kembali' => 'required|exists:kembalis,id',
        'tgl_bayar' => 'required|date',
        'total_bayar' => 'required|numeric',
        'status' => 'required|in:Lunas,belum_lunas',
    ]);

    // Update the payment record
    $bayar->update($request->all());

    return redirect()->route('petugas.kembali.kembali')->with('success', 'Payment updated successfully.');
}


// Remove the specified resource from storage
public function destroy(Bayar $bayar)
{
    $bayar->delete();
    return redirect()->route('bayar.index')->with('success', 'Payment deleted successfully.');
}

}
