<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>

    <link rel="icon" href="{{ asset('templateadmin/../assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/demo.css') }}" />
</head>

<body>
    @include('component.navbaradmin')
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
                                            @if ($transaksi)
                                                <p>ID: {{ $transaksi->id }}</p>
                                            @else
                                                <p>Transaksi not found.</p>
                                            @endif

                                            @if ($transaksi->status === 'Booking')
                                                <form action="{{ route('transaksi.approve', $transaksi) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success">Approve</button>
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
        });
    </script>
</body>

</html>
