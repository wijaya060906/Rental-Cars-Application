<?php
namespace App\Http\Controllers;

use App\Models\Bayar;
use App\Models\Kembali;
use App\Models\Mobil;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('admin.transaksi.transaksi', compact('transaksis'));
    }

    public function create()
    {
        return view('admin.transaksi.create'); // Create a form view for creating new transaksi
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
        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }

    public function edit(Transaksi $transaksi)
{
    if (!$transaksi) {
        \Log::error('Transaksi not found');
    }
    return view('transaksi.edit', compact('transaksi'));
}

    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            // Same validation rules as in store
        ]);

        $transaksi->update($request->all());
        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }

    

    public function approve(Transaksi $transaksi)
{
    $transaksi->update(['status' => 'approve']);
    return redirect()->route('transaksi.index')->with('success', 'Transaksi approved successfully.');
}

public function userTransactions()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    $transaksis = Transaksi::where('nik', auth()->user()->id)->get();
    return view('user.sewa', compact('transaksis'));
}


public function ambil(Transaksi $transaksi)
{
    // Check if the status is already 'approve'
    if ($transaksi->status === 'approve') {
        $transaksi->update(['status' => 'ambil']);
        return redirect()->route('dashboard')->with('success', 'Transaksi status updated to "ambil" successfully.');
    }

    return redirect()->route('transaksi.index')->with('error', 'Transaksi cannot be updated.');
}

public function kembali(Request $request, Transaksi $transaksi)
{
    $request->validate([
        'tgl_kembali' => 'required|date',
        'kondisi_mobil' => 'required|string',
    ]);

    // Get the tgl_kembali from the transaction
    $tglKembali = \Carbon\Carbon::parse($transaksi->tgl_kembali);
    $tglKembaliInput = \Carbon\Carbon::parse($request->tgl_kembali);

    // Calculate the penalty based on the condition text length
    $denda = strlen($request->kondisi_mobil) * 50000; // Penalty based on condition text

    // Calculate any delay
    $delayDays = $tglKembaliInput->diffInDays($tglKembali, false); // false to get a negative value if it's early
    if ($delayDays > 0) {
        $denda += $delayDays * 100000; // Adjust this rate as needed
    }

    // Create a new entry in the Kembali table
    Kembali::create([
        'id_transaksi' => $transaksi->id,
        'tgl_kembali' => $request->tgl_kembali,
        'kondisi_mobil' => $request->kondisi_mobil,
        'denda' => $denda,
    ]);

    // Update the transaction status to 'kembali'
    $transaksi->update(['status' => 'kembali']);

    return redirect()->route('dashboard')->with('success', 'Mobil berhasil dikembalikan.');
}

public function updateBayar(Request $request, $id)
    {
        $request->validate([
            'tgl_bayar' => 'required|date',
            'total_bayar' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $payment = Bayar::findOrFail($id);
        $payment->tgl_bayar = $request->input('tgl_bayar');
        $payment->total_bayar = $request->input('total_bayar');
        $payment->status = $request->input('status');
        $payment->save();

        return redirect()->back()->with('success', 'Payment updated successfully.');
    }




public function bookingstore(Request $request)
{

    $request->validate([
        'tgl_booking' => 'required|date',
        'tgl_ambil' => 'required|date',
        'supir' => 'required|boolean',
        'downpayment' => 'required|numeric',
        'nopol' => 'required|exists:mobils,nopol',
    ]);

    $mobil = Mobil::where('nopol', $request->nopol)->first();
    $total = $mobil->harga; // Ambil harga mobil berdasarkan nopol
    $kekurangan = $total - $request->downpayment;

    Transaksi::create([
        'nik' => Auth::id(),
        'nopol' => $request->nopol,
        'tgl_booking' => now(),
        'tgl_ambil' => $request->tgl_ambil,
        'tgl_kembali' => now()->addDays(2), // 2 hari dari tgl ambil
        'supir' => $request->supir,
        'total' => $total,
        'downpayment' => $request->downpayment,
        'kekurangan' => $kekurangan,
        'status' => 'Booking',
    ]);


    return redirect()->back()->with('success', 'Booking berhasil dilakukan!');
}
}
