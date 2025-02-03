<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Transaksi</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="{{ asset('darkpan-1.0.0/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('darkpan-1.0.0/css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('user.layout.navbar')
    <script>
        $(document).ready(function() {
            function getCurrentDate() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
                var yyyy = today.getFullYear();

                return yyyy + '-' + mm + '-' + dd;
            }

            $('.kembali-button').on('click', function() {
                var transaksiId = $(this).data('id');
                $('#id_transaksi').val(transaksiId);
                $('#tgl_kembali').val(getCurrentDate()); // Set the date to today
                $('#kembaliForm').attr('action', '/transaksi/' + transaksiId + '/kembali'); // Set the action dynamically
                $('#kembaliModal').modal('show');
            });

            $('#kembaliForm').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                var formData = form.serialize();

                $.ajax({
                    type: 'POST',
                    url: actionUrl,
                    data: formData,
                    success: function(response) {
                        if (response.status === 'kembali') {
                            $('button[data-id="' + response.id + '"]').closest('tr').find('td:eq(5)').text('kembali');
                            $('button[data-id="' + response.id + '"]').remove();
                            $('#kembaliModal').modal('hide');
                        }
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            });

            // Add event listener to update denda based on kondisi_mobil length
            $('textarea[name="kondisi_mobil"]').on('input', function() {
                var kondisiMobilLength = $(this).val().length;
                var denda = kondisiMobilLength * 50000; // Calculate denda
                $('input[name="denda"]').val(denda);
            });

            // Add event listener to handle empty kondisi_mobil
            $('textarea[name="kondisi_mobil"]').on('blur', function() {
                if ($(this).val().trim() === '') {
                    $(this).val('.');
                }
            });
        });
    </script>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Data Transaksi Anda</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th scope="col">NIK</th>
                            <th scope="col">No.Pol</th>
                            <th scope="col">TGL_Booking</th>
                            <th scope="col">TGL_Ambil</th>
                            <th scope="col">TGL_Kembali</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksis as $transaksi)
                        <tr>
                            <td class="border px-4 py-2">{{ $transaksi->nik }}</td>
                            <td class="border px-4 py-2">{{ $transaksi->nopol }}</td>
                            <td class="border px-4 py-2">{{ $transaksi->tgl_booking }}</td>
                            <td class="border px-4 py-2">{{ $transaksi->tgl_ambil }}</td>
                            <td class="border px-4 py-2">{{ $transaksi->tgl_kembali }}</td>
                            <td class="border px-4 py-2">{{ $transaksi->status }}</td>
                            <td class="border px-4 py-2">
                                @if($transaksi->status === 'approve')
                                    <form action="{{ route('transaksi.ambil', $transaksi->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success btn-sm">Ambil</button>
                                    </form>
                                @elseif($transaksi->status === 'ambil')
                                <form action="{{ route('member.transaksi.kembali', $transaksi->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-warning btn-sm">Kembali</button>
                                </form>
                                @endif
                            </td>                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('darkpan-1.0.0/js/main.js') }}"></script>
    <script>
       $('.kembali-button').on('click', function() {
    var transaksiId = $(this).data('id');
    $('#kembaliForm').attr('action', '/transaksi/' + transaksiId + '/kembali'); // Set the action dynamically
    $('#kembaliModal').modal('show');
});

$('#kembaliForm').on('submit', function(e) {
    e.preventDefault();
    var form = $(this);
    var actionUrl = form.attr('action');

    $.ajax({
        type: 'POST',
        url: actionUrl,
        data: { _token: '{{ csrf_token() }}' }, // Include CSRF token
        success: function(response) {
            if (response.status === 'kembali') {
                $('button[data-id="' + response.id + '"]').closest('tr').find('td:eq(5)').text('kembali');
                $('#kembaliModal').modal('hide');
            }
        },
        error: function(response) {
            console.log('Error:', response);
        }
    });
});

    </script>
    
</body>
</html>
