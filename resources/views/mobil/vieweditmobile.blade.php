@extends('templet.templet')

@section('title', 'Home Page')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container mt-4">
    <h1>Edit Data Mobil</h1>
    <form action="{{ route('updatemobil', $mobil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="merek" class="form-label">Merek</label>
            <input type="text" name="merek" id="merek" class="form-control" value="{{ $mobil->merek }}" required>
        </div>
        <div class="mb-3">
            <label for="model" class="form-label">Model</label>
            <input type="text" name="model" id="model" class="form-control" value="{{ $mobil->model }}" required>
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Kapasitas</label>
            <input type="number" name="kapasitas" id="kapasitas" class="form-control" value="{{ $mobil->kapasitas }}" required>
        </div>
        <div class="mb-3">
            <label for="plat" class="form-label">Plat</label>
            <input type="text" name="plat" id="plat" class="form-control" value="{{ $mobil->plat }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="Tersedia" {{ $mobil->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                <option value="Tidak Tersedia" {{ $mobil->status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="price_per_day" class="form-label">Harga per Hari</label>
            <input type="number" name="price_per_day" id="price_per_day" class="form-control" value="{{ $mobil->price_per_day }}" required>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
