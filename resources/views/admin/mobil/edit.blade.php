@include('component.navbaradmin')
@section('content')
    <div class="container">
        <h1>Edit Mobil</h1>
        <form action="{{ route('mobils.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="brand">Brand:</label>
                <input type="text" name="brand" id="brand" class="form-control" value="{{ $mobil->brand }}" required>
            </div>
            <div class="form-group">
                <label for="type">Type:</label>
                <input type="text" name="type" id="type" class="form-control" value="{{ $mobil->type }}" required>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="number" name="tahun" id="tahun" class="form-control" value="{{ $mobil->tahun }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" id="harga" class="form-control" value="{{ $mobil->harga }}" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control">
                @if ($mobil->foto)
                    <img src="{{ asset('storage/' . $mobil->foto) }}" alt="{{ $mobil->brand }}" width="100">
                @endif
            </div>
            
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" name="status" id="status" class="form-control" value="{{ $mobil->status }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Mobil</button>
        </form>
    </div>
@endsection