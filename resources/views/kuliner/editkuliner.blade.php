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

    <h2 class="mb-4">Form Input Data Kuliner</h2>

    <form action="{{ route('kulineredit_Store', $data->id) }}" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf

        <div class="mb-3">
            <label for="merek" class="form-label">Nama Kuliner</label>
            <input type="text" name='nama_kuliner' class="form-control" id="nama_kuliner" value="{{ $data->nama_kuliner }}">
        </div>
        <div class="mb-3">
            <label for="kapasitas" class="form-label">Reting</label>
            <input type="number" name='reting' class="form-control" id="reting" value="{{ $data->reting }}">
        </div>
        <div class="mb-3">
            <label for="plat" class="form-label">descripsi</label>
            <textarea type="text" name='deskripsi' class="form-control" id="deskripsi" rows="4" cols="50" value="{{ $data->deskripsi }}"></textarea>
        </div>
        <div class="mb-3">
            <label for="merek" class="form-label">lokasi</label>
            <input type="text" name='lokasi' class="form-control" id="lokasi" value="{{ $data->lokasi }}">
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" name='harga' class="form-control" id="harga" step="0.01" value="{{ $data->harga_rata }}">
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" id="gambar" placeholder="gambar size max 200mb">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </form>
</div>



@endsection
