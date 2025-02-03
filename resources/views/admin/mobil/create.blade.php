<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Mobil</title>

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
        <div class="card-header">
          <h4 class="card-title">Create Mobil</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('mobils.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="brand">Brand:</label>
              <input type="text" name="brand" id="brand" class="form-control" required>
              @error('brand')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="type">Type:</label>
              <input type="text" name="type" id="type" class="form-control" required>
              @error('type')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="tahun">Tahun:</label>
              <input type="date" name="tahun" id="tahun" class="form-control" required>
              @error('tahun')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="harga">Harga:</label>
              <input type="number" name="harga" id="harga" class="form-control" required>
              @error('harga')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="nopol">Nomor Polisi:</label>
              <input type="text" name="nopol" id="nopol" class="form-control" required>
              @error('nopol')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="foto">Foto:</label>
              <input type="file" name="foto" id="foto" class="form-control" accept="image/*" required>
              @error('foto')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="status">Status:</label>
              <select name="status" id="status" class="form-control" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak">Tidak</option>
              </select>
              @error('status')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
          </form>
          
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('templateadmin/../assets/js/core/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('templateadmin/../assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('templateadmin/../assets/js/core/bootstrap.min.js') }}"></script>

  <!-- jQuery Scrollbar -->
  <script src="{{ asset('templateadmin/../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
  <!-- Kaiadmin JS -->
  <script src="{{ asset('templateadmin/../assets/js/kaiadmin.min.js') }}"></script>
  <!-- Kaiadmin DEMO methods, don't include it in your project! -->
  <script src="{{ asset('templateadmin/../assets/js/setting-demo2.js') }}"></script>
</body>
</html>
