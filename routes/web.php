<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PetugasDashBoardController;
use App\Http\Controllers\PetugasMobilController;
use App\Http\Controllers\PetugasTransaksiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Kembali;
use App\Models\Member;
use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.home');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/user/daftarmobil', function () {
    $mobils = Mobil::all();
    return view('user.mobil', compact('mobils'));
})->middleware(['auth', 'verified'])->name('daftar.mobil');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
Route::get('/download-pdf', [PdfController::class, 'downloadPDF'])->name('download.pdf');

Route::post('/transaksi/store', [TransaksiController::class, 'storebooking'])->name('transaksi.user.booking');
Route::post('/transaksi/booking', [TransaksiController::class, 'bookingstore'])->name('transaksi.booking');
Route::post('transaksi/{transaksi}/approve', [TransaksiController::class, 'approve'])->name('transaksi.approve');
Route::get('transaksi/user', [TransaksiController::class, 'userTransactions'])->name('transaksi.user');
Route::patch('/transaksi/{transaksi}/ambil', [TransaksiController::class, 'ambil'])->name('transaksi.ambil');
Route::post('transaksi/{transaksi}/kembali', [PetugasTransaksiController::class, 'memberkembali'])->name('member.transaksi.kembali');

Route::prefix('petugas')->group(function () {
    Route::get('transaksi', [PetugasTransaksiController::class, 'index'])->name('petugas.kembali.kembali');
    Route::post('transaksi/{transaksi}/approve', [PetugasTransaksiController::class, 'approve'])->name('petugas.transaksi.approve');
    Route::post('/transaksi/{transaksi}/ambil', [PetugasTransaksiController::class, 'ambil'])->name('petugas.transaksi.ambil');

    Route::post('transaksi/{transaksi}/kembali', [PetugasTransaksiController::class, 'kembali'])->name('petugas.transaksi.kembali');
    Route::delete('transaksi/{transaksi}', [PetugasTransaksiController::class, 'destroy'])->name('petugas.transaksi.destroy');
    Route::post('/bayar', [BayarController::class, 'store'])->name('bayar.store');

    Route::get('/kembali', [BayarController::class, 'index'])->name('kembali.index');
    Route::post('/bayar', [BayarController::class, 'store'])->name('bayar.store');
    Route::resource('bayar', BayarController::class);

    Route::get('/petugas/mobils', [PetugasMobilController::class, 'index'])->name('petugas.mobil');
    Route::get('/petugas/mobils/create', [PetugasMobilController::class, 'create'])->name('petugas.mobils.create');
    Route::post('/petugas/mobils', [PetugasMobilController::class, 'store'])->name('petugas.mobils.store');
    Route::get('/petugas/mobils/{mobil}/edit', [PetugasMobilController::class, 'edit'])->name('petugas.mobils.edit'); // Updated
    Route::put('/petugas/mobils/{mobil}', [PetugasMobilController::class, 'update'])->name('petugas.mobils.update');
    Route::delete('/petugas/mobils/{mobil}', [PetugasMobilController::class, 'destroy'])->name('petugas.mobils.destroy');
    Route::get('/petugas/mobils/{mobil}', [PetugasMobilController::class, 'show'])->name('petugas.mobils.show');

    Route::get('transaksi', [PetugasTransaksiController::class, 'indextransaksi'])->name('petugas.transaksi.index');
    Route::get('transaksi/create', [PetugasTransaksiController::class, 'create'])->name('petugas.transaksi.create');
    Route::post('transaksi', [PetugasTransaksiController::class, 'store'])->name('petugas.transaksi.store');
    Route::get('transaksi/{transaksi}/edit', [PetugasTransaksiController::class, 'edit'])->name('petugas.transaksi.edit');
    Route::put('transaksi/{transaksi}', [PetugasTransaksiController::class, 'update'])->name('petugas.transaksi.update');
    Route::delete('transaksi/{transaksi}', [PetugasTransaksiController::class, 'destroy'])->name('petugas.transaksi.destroy');

    Route::put('/payments/{id}', [BayarController::class, 'update'])->name('payments.update');
    Route::post('transaksi/{transaksi}/kembali', [PetugasTransaksiController::class, 'kembali'])->name('petugas.transaksi.kembali');

    Route::get('/dashboard', [PetugasDashBoardController::class, 'index'])->name('dashboard.index');


    Route::get('/petugas/kembali',function(){
        $kembalis = Kembali::with('transaksi')->get();
        return view('petugas.kembali.kembali', compact('kembalis'));
    })->name('petugas.kembali.kembali');
});


Route::get('/pengelola/login', [LoginController::class, 'login'])->name('login.pengelola');
Route::post('/pengelola/login', [LoginController::class, 'pengelola_login']);
Route::post('/pengelola/logout', [LoginController::class, 'logout'])->name('logout.pengelola');

Route::middleware('checkRole:admin')->group(function () {
    Route::get('/mobils', [MobilController::class, 'index'])->name('mobils.index');
    Route::get('/mobils/create', [MobilController::class, 'create'])->name('mobils.create');
    Route::post('/mobils', [MobilController::class, 'store'])->name('mobils.store');
    Route::get('/mobils/{mobil}/edit', [MobilController::class, 'edit'])->name('mobils.edit'); // Updated
    Route::put('/mobils/{mobil}', [MobilController::class, 'update'])->name('mobils.update');
    Route::delete('/mobils/{mobil}', [MobilController::class, 'destroy'])->name('mobils.destroy');
    Route::get('/mobils/{mobil}', [MobilController::class, 'show'])->name('mobils.show');

    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    Route::get('transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
    Route::post('transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
    Route::get('transaksi/{transaksi}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
    Route::put('transaksi/{transaksi}', [TransaksiController::class, 'update'])->name('transaksi.update');
    Route::delete('transaksi/{transaksi}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    
    Route::post('users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::get('/admin/dashboard', function () {
    $transaksiCount = Transaksi::count(); // Menghitung jumlah transaksi
    $mobilCount = Mobil::count(); // Menghitung jumlah mobil
    $petugasCount = User::where('lvl', 'petugas')->count(); // Menghitung jumlah user dengan level petugas
    $memberCount = Member::count(); // Menghitung jumlah members

    return view('admin.dashboard', compact('transaksiCount', 'mobilCount', 'petugasCount', 'memberCount'));
})->name('admin.dashboard')->middleware('checkRole:admin');
Route::get('admin/mobil', function () {
    return view('admin.mobil.create');
})->name('admin.mobil.create')->middleware('checkRole:admin');
Route::get('/admin/petugas/create', function () {
    return view('admin.petugas.create');
})->name('admin.petugas.create')->middleware('checkRole:admin');


Route::get('admin/mobil', function () {
    $mobils = Mobil::all();
    return view('admin.mobil.data_mobil', compact('mobils'));
})->name('admin.mobil')->middleware('checkRole:admin');
Route::get('admin/mobil/edit/{mobil}', function (Mobil $mobil) {
    return view('admin.mobil.edit', compact('mobil'));
})->name('edit.mobil')->middleware('checkRole:admin');


Route::get('/petugas/dashboard', function () {
    $transaksiCount = Transaksi::count(); // Menghitung jumlah transaksi
    $mobilCount = Mobil::count(); // Menghitung jumlah mobil
    $petugasCount = User::where('lvl', 'petugas')->count(); // Menghitung jumlah user dengan level petugas
    $memberCount = Member::count(); // Menghitung jumlah members

    return view('petugas.dashboard', compact('transaksiCount', 'mobilCount', 'petugasCount', 'memberCount'));
})->name('petugas.dashboard')->middleware('checkRole:petugas');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
