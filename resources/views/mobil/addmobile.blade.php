@extends('templet.templet')

@section('title', 'Home Page')

@section('content')

<div class="container mt-5">

    @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
    @if ($errors->any())
        @foreach($errors->all() as $error)
        <p>{{ $error}}</p>
        @endforeach
    @endif

    <h2 class="mb-4">Form Input Data Mobil</h2>

    <form action="{{ route('mobil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="merek" class="form-label">Merek</label>
            <input type="text" name='merek' class="form-control" id="merek" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" name='kapasitas' class="form-control" id="kapasitas" required>
        </div>
        <div class="mb-3">
            <label for="plat" class="form-label">Plat</label>
            <input type="text" name='plat' class="form-control" id="plat" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name='status' id="status" required>
                <option value="">Pilih Status</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga per Hari</label>
            <input type="number" name='price_per_day' class="form-control" id="harga" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar_direc" class="form-control" id="gambar" required placeholder="gambar size max 200mb">
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name='model' class="form-control" id="model" required>
        </div>
        <div class="mb-3">
            <label for="terakhirUpdate" class="form-label">Terakhir Update</label>
            <input type="date" class="form-control" id="terakhirUpdate" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>



@endsection
