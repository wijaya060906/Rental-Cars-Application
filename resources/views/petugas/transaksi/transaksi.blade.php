<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
    <link rel="icon" href="{{ asset('templateadmin/../assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/demo.css') }}" />
</head>

<body>
    @include('component.navbarpetugas')
    <div class="wrapper" style="margin-top: 5%">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data Transaksi</h4>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-success">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>No. Polisi</th>
                                    <th>Tanggal Booking</th>
                                    <th>Tanggal Ambil</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>NIK</th>
                                    <th>No. Polisi</th>
                                    <th>Tanggal Booking</th>
                                    <th>Tanggal Ambil</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $transaksi->nik }}</td>
                                        <td>{{ $transaksi->nopol }}</td>
                                        <td>{{ $transaksi->tgl_booking }}</td>
                                        <td>{{ $transaksi->tgl_ambil }}</td>
                                        <td>{{ $transaksi->tgl_kembali }}</td>
                                        <td>{{ $transaksi->status }}</td>
                                        <td>
                                            <a href="{{ route('transaksi.edit', $transaksi) }}"
                                                class="btn btn-warning">Edit</a>
                                            <form action="{{ route('transaksi.destroy', $transaksi) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                            @if ($transaksi->status === 'Booking')
                                            <form action="{{ route('petugas.transaksi.approve', $transaksi) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">Approve</button>
                                            </form>
                                            
                                            @endif
                                            @if ($transaksi->status === 'kembali')
                                                <button type="button" class="btn btn-warning btn-sm kembali-button"
                                                    data-id="{{ $transaksi->id }}">Kembali</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for returning the car -->
    <div id="kembaliModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="kembaliModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="kembaliModalLabel">Kembali Mobil</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="kembaliForm" action="" method="POST"> <!-- Action akan diatur dinamis -->
                    @csrf
                    <input type="hidden" name="id_transaksi" id="id_transaksi">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_kembali">Tanggal Kembali</label>
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="kondisi_mobil">Kondisi Mobil (tulis kalau ada kerusakan saja)</label>
                            <textarea name="kondisi_mobil" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="denda">Denda</label>
                            <input type="number" name="denda" class="form-control" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Kembalikan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('templateadmin/../assets/js/core/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('templateadmin/../assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('templateadmin/../assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('templateadmin/../assets/js/plugin/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('templateadmin/../assets/js/kaiadmin.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#basic-datatables").DataTable({});
    
            function getCurrentDate() {
                var today = new Date();
                var dd = String(today.getDate()).padStart(2, '0');
                var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
                var yyyy = today.getFullYear();
    
                return yyyy + '-' + mm + '-' + dd;
            }
    
            $('.kembali-button').on('click', function() {
                var transaksiId = $(this).data('id');
                $('#id_transaksi').val(transaksiId);
                $('#tgl_kembali').val(getCurrentDate());
    
                // Set action menggunakan route name
                var actionUrl = '{{ route('petugas.transaksi.kembali', ':transaksi') }}';
                actionUrl = actionUrl.replace(':transaksi', transaksiId);
                $('#kembaliForm').attr('action', actionUrl);
    
                $('#kembaliModal').modal('show');
            });
    
            $('.approve-button').on('click', function() {
                var transaksiId = $(this).data('id');
                var actionUrl = '{{ route('petugas.transaksi.approve', ':transaksi') }}';
                actionUrl = actionUrl.replace(':transaksi', transaksiId);
    
                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: transaksiId
                    },
                    success: function(response) {
                        location.reload(); // Reload the page to see changes
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message); // Display error message if any
                    }
                });
            });
        });
    </script>
    
</body>

</html>
