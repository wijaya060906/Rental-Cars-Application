<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create User</title>

  <script src="{{ asset('templateadmin/assets/js/plugin/webfont/webfont.min.js') }}"></script>
  <link rel="icon" href="{{ asset('templateadmin/../assets/img/kaiadmin/favicon.ico') }}" type="image/x-icon" />

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
          <h4 class="card-title">Create Petugas</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" name="name" id="name" class="form-control" required>
              @error('name')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" name="email" id="email" class="form-control" required>
              @error('email')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" name="password" id="password" class="form-control" required>
              @error('password')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirm Password:</label>
              <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
              @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label for="lvl">Level:</label>
              <select name="lvl" id="lvl" class="form-control" required>
                <option value="petugas">Petugas</option>
              </select>
              @error('lvl')
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
  <script src="{{ asset('templateadmin/../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('templateadmin/../assets/js/kaiadmin.min.js') }}"></script>
  <script src="{{ asset('templateadmin/../assets/js/setting-demo2.js') }}"></script>
</body>
</html>
