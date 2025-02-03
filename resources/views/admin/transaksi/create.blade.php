<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaksi</title>
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Create Transaksi</h1>
        <form action="{{ route('transaksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
            </div>
            <div class="mb-3">
                <label for="nopol" class="form-label">Nomor Polisi</label>
                <input type="text" class="form-control" id="nopol" name="nopol" required>
            </div>
            <div class="mb-3">
                <label for="tgl_booking" class="form-label">Tanggal Booking</label>
                <input type="date" class="form-control" id="tgl_booking" name="tgl_booking" required>
            </div>
            <div class="mb-3">
                <label for="tgl_ambil" class="form-label">Tanggal Ambil</label>
                <input type="date" class="form-control" id="tgl_ambil" name="tgl_ambil" required>
            </div>
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" required>
            </div>
            <div class="mb-3">
                <label for="supir" class="form-label">Supir</label>
                <select class="form-select" id="supir" name="supir" required>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" step="0.01" class="form-control" id="total" name="total" required>
            </div>
            <div class="mb-3">
                <label for="downpayment" class="form-label">Down Payment</label>
                <input type="number" step="0.01" class="form-control" id="downpayment" name="downpayment" required>
            </div>
            <div class="mb-3">
                <label for="kekurangan" class="form-label">Kekurangan</label>
                <input type="number" step="0.01" class="form-control" id="kekurangan" name="kekurangan" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="Booking">Booking</option>
                    <option value="approve">Approve</option>
                    <option value="ambil">Ambil</option>
                    <option value="kembali">Kembali</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <script src="{{ asset('templateadmin/../assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('templateadmin/../assets/js/core/bootstrap.min.js') }}"></script>
</body>
</html>
