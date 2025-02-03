<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kembali</title>

    <link rel="icon" href="{{ asset('templateadmin/../assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/kaiadmin.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('templateadmin/../assets/css/demo.css') }}" />

    <style>
        .modal-dialog-custom {
            max-width: 900px;
            margin: 30px auto;
        }

        .modal-content {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .modal-header {
            border-bottom: 1px solid #e0e0e0;
        }

        .modal-footer {
            border-top: 1px solid #e0e0e0;
        }

        .card-container {
            position: relative;
        }

        .sewa-button {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    @include('component.navbarpetugas')
    <div class="wrapper" style="margin-top: 5%">
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data Pembayaran</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="bayar-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID Bayar</th>
                                    <th>ID Kembali</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Bayar</th>
                                    <th>ID Kembali</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($bayars as $bayar)
                                    <tr>
                                        <td>{{ $bayar->id }}</td>
                                        <td>{{ $bayar->id_kembali }}</td>
                                        <td>{{ $bayar->tgl_bayar }}</td>
                                        <td>{{ $bayar->total_bayar }}</td>
                                        <td>{{ $bayar->status }}</td>
                                        <td>
                                            <button class="btn btn-warning edit-button" data-id="{{ $bayar->id }}"
                                                data-id-kembali="{{ $bayar->id_kembali }}"
                                                data-tgl-bayar="{{ $bayar->tgl_bayar }}"
                                                data-total-bayar="{{ $bayar->total_bayar }}"
                                                data-status="{{ $bayar->status }}">Edit</button>
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

    <div id="bayarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayarModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="bayarForm" action="{{ route('payments.update', '') }}" method="POST" onsubmit="setAction(event)">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="bayar_id">
                    <input type="hidden" name="id_kembali" id="bayar_id_kembali">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" id="bayar_tgl_bayar" required>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="number" name="total_bayar" class="form-control" id="bayar_total_bayar"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" id="bayar_status" required>
                                <option value="Lunas">Lunas</option>
                                <option value="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
            $("#bayar-datatables").DataTable({});

            $('.edit-button').on('click', function() {
                const id = $(this).data('id');
                const idKembali = $(this).data('id-kembali');
                const tglBayar = $(this).data('tgl-bayar');
                const totalBayar = $(this).data('total-bayar');
                const status = $(this).data('status');

                $('#bayar_id').val(id);
                $('#bayar_id_kembali').val(idKembali);
                $('#bayar_tgl_bayar').val(tglBayar);
                $('#bayar_total_bayar').val(totalBayar);
                $('#bayar_status').val(status);
                $('#bayarModal').modal('show');
            });
        });

        $('.edit-button').on('click', function() {
    const id = $(this).data('id');
    const idKembali = $(this).data('id-kembali');
    const tglBayar = $(this).data('tgl-bayar');
    const totalBayar = $(this).data('total-bayar');
    const status = $(this).data('status');

    $('#bayar_id').val(id);
    $('#bayar_id_kembali').val(idKembali);
    $('#bayar_tgl_bayar').val(tglBayar);
    $('#bayar_total_bayar').val(totalBayar);
    $('#bayar_status').val(status);

    // Set the form action correctly for updating
    $('#bayarForm').attr('action', '{{ url('/payments') }}/' + id);

    $('#bayarModal').modal('show');
});


    </script>
</body>

</html>
