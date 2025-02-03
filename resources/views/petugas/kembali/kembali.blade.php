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
</head>

<body>
    @include('component.navbarpetugas')
    <div class="wrapper" style="margin-top: 5%">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Data Kembali</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kondisi Mobil</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>ID Transaksi</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Kondisi Mobil</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($kembalis as $kembali)
                                    <tr>
                                        <td>{{ $kembali->transaksi->id }}</td>
                                        <td>{{ $kembali->tgl_kembali }}</td>
                                        <td>{{ $kembali->kondisi_mobil }}</td>
                                        <td>{{ $kembali->denda }}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary bayar-button" 
                                                    data-id="{{ $kembali->id }}" 
                                                    data-denda="{{ $kembali->denda }}" 
                                                    data-tgl-kembali="{{ $kembali->tgl_kembali }}">
                                                Bayar
                                            </button>
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
    <div id="bayarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bayarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bayarModalLabel">Pembayaran</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="bayarForm" action="{{ route('bayar.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_kembali" id="bayar_id_kembali">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tgl_bayar">Tanggal Bayar</label>
                            <input type="date" name="tgl_bayar" class="form-control" value="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="total_bayar">Total Denda</label>
                            <input type="number" name="total_bayar" class="form-control" id="bayar_total_bayar" readonly>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="Lunas">Lunas</option>
                                <option value="belum_lunas">Belum Lunas</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Bayar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
    $('.bayar-button').on('click', function() {
        const idKembali = $(this).data('id');
        const denda = $(this).data('denda');
        const tglKembali = new Date($(this).data('tgl-kembali'));
        const today = new Date();

        // Calculate keterlambatan
        const lateDays = Math.max(0, Math.ceil((today - tglKembali) / (1000 * 60 * 60 * 24)));
        const totalBayar = denda + (lateDays * 2000);

        $('#bayar_id_kembali').val(idKembali);
        $('#bayar_total_bayar').val(totalBayar);
        $('#bayarModal').modal('show');
    });
});

    </script>
    

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
