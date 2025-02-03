<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Data Mobil</title>

  <script src="{{ asset('templateadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <link rel="icon" href="{{ asset('templateadmin/../assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

  <!-- Fonts and icons -->
  <script>
    WebFont.load({
      google: { families: ["Public Sans:300,400,500,600,700"] },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["../assets/css/fonts.min.css"],
      },
      active: function () {
        sessionStorage.fonts = true;
      },
    });
  </script>

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
          <h4 class="card-title">Data Mobil</h4>
          <a href="{{ route('mobils.create') }}" class="btn btn-success">Create</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table id="basic-datatables" class="display table table-striped table-hover">
              <thead>
                <tr>
                  <th>Brand</th>
                  <th>Type</th>
                  <th>Tahun</th>
                  <th>Harga</th>
                  <th>Foto</th>
                  <th>Status</th>
                  <th>Aksi</th> <!-- Added action column -->
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Brand</th>
                  <th>Type</th>
                  <th>Tahun</th>
                  <th>Harga</th>
                  <th>Foto</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($mobils as $mobil)
                  <tr>
                    <td>{{ $mobil->brand }}</td>
                    <td>{{ $mobil->type }}</td>
                    <td>{{ $mobil->tahun }}</td>
                    <td>{{ $mobil->harga }}</td>
                    <td><img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->brand }}" width="100"></td>
                    <td>{{ $mobil->status }}</td>
                    <td>
                      <a href="" class="btn btn-warning">Edit</a>
                      <form action="" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Hapus</button>
                      </form>
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

  <!-- jQuery Scrollbar -->
  <script src="{{ asset('templateadmin/../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
  <!-- Datatables -->
  <script src="{{ asset('templateadmin/../assets/js/plugin/datatables/datatables.min.js') }}"></script>
  <!-- Kaiadmin JS -->
  <script src="{{ asset('templateadmin/../assets/js/kaiadmin.min.js') }}"></script>
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="{{ asset('templateadmin/../assets/js/setting-demo2.js') }}"></script>
  <script>
    $(document).ready(function () {
      $("#basic-datatables").DataTable({});
    });
  </script>
</body>
</html>
