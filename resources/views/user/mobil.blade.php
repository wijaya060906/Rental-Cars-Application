<!-- resources/views/user/daftar_mobil.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Daftar Mobil</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('darkpan-1.0.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('darkpan-1.0.0/css/style.css') }}" rel="stylesheet">

    <style>
        .modal-dialog-custom {
            max-width: 900px;
            /* Lebarkan modal */
            margin: 30px auto;
            /* Beri margin vertikal */
        }

        .modal-content {
            padding: 20px;
            /* Tambah padding di dalam modal */
        }

        .form-group {
            margin-bottom: 15px;
            /* Tambah jarak antar input */
        }

        .modal-header {
            border-bottom: 1px solid #e0e0e0;
            /* Tambahkan border bawah pada header */
        }

        .modal-footer {
            border-top: 1px solid #e0e0e0;
            /* Tambahkan border atas pada footer */
        }

        .card-container {
            position: relative;
            /* Tambahkan posisi relatif untuk container kartu */
        }

        .sewa-button {
            position: absolute;
            /* Tambahkan posisi absolut untuk tombol */
            bottom: 10px;
            /* Jarak dari bawah */
            left: 10px;
            /* Jarak dari kiri */
        }
    </style>

</head>

<body>
    @include('user.layout.navbar')

    <div class="container mx-auto pt-4 px-4">
        <h1 class="text-2xl font-bold mb-4">Daftar Mobil</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($mobils as $mobil)
                <div class="bg-white shadow-md rounded-lg p-6 card-container">
                    <h1 class="text-gray-700 font-bold mb-2">{{ $mobil->brand }}</h1>
                    <p class="text-gray-700">Type: {{ $mobil->type }}</p>
                    <p class="text-gray-700">Tahun: {{ $mobil->tahun }}</p>
                    <p class="text-gray-700">Harga: {{ $mobil->harga }}</p>
                    <p class="text-gray-700">Status: {{ $mobil->status }}</p>
                    <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->brand }}"
                        class="w-full h-auto mt-2">

                    <button class="sewa-button btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#bookingModal{{ $mobil->id }}" data-harga="{{ $mobil->harga }}">Sewa</button>

                    <div id="bookingModal{{ $mobil->id }}" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="bookingModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-custom" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="bookingModalLabel">Booking Mobil</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('transaksi.booking') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="nik" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="nopol" value="{{ $mobil->nopol }}">
                                    <div class="form-group">
                                        <label for="tgl_booking">Tanggal Booking</label>
                                        <input type="date" name="tgl_booking" class="form-control"
                                            value="{{ now()->toDateString() }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_ambil">Tanggal Ambil</label>
                                        <input type="date" name="tgl_ambil" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="supir">Supir</label>
                                        <select name="supir" class="form-control" required>
                                            <option value="1">Dengan Supir</option>
                                            <option value="0">Tanpa Supir</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="downpayment">Down Payment</label>
                                        <input type="number" name="downpayment" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="total">Total Harga</label>
                                        <input type="number" name="total" class="form-control" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="kekurangan">Kekurangan</label>
                                        <input type="number" name="kekurangan" class="form-control" readonly>
                                    </div>
                                    <input type="hidden" name="status" value="Booking">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            function updateKekurangan() {
                const total = parseFloat($('input[name="total"]').val());
                const downpayment = parseFloat($('input[name="downpayment"]').val()) || 0;
                const kekurangan = total - downpayment;
                $('input[name="kekurangan"]').val(kekurangan);
            }

            // Update kekurangan when downpayment changes
            $('input[name="downpayment"]').on('input', updateKekurangan);

            // Update total when supir option changes
            $('select[name="supir"]').on('change', function() {
                const basePrice = parseFloat($(this).closest('.modal-content').find('input[name="total"]').data('harga'));
                const supirPrice = $(this).val() == '1' ? 2000 : 0;
                const newTotal = basePrice + supirPrice;
                $(this).closest('.modal-content').find('input[name="total"]').val(newTotal);
                updateKekurangan();
            });

            // Set initial total price when modal is shown
            $('.modal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const harga = button.data('harga');
                const modal = $(this);
                modal.find('input[name="total"]').val(harga).data('harga', harga);
                updateKekurangan();
            });
        });
    </script>

    <script src="{{ asset('darkpan-1.0.0/js/main.js') }}"></script>
</body>

</html>
