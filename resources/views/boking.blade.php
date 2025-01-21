@extends('templet.templet')

@section('title', 'Home Page')

@section('content')

<div class="latarbelakang1 container-fluid">

    {{-- st tombol1 --}}
    <div class="row p-2 pt-5 ms-5">
        <div class="col d-flex justify-content-start">
            <button type="button" class="btn btn-outline-primary m-2">Primary</button>
            <button type="button" class="btn btn-outline-primary m-2">Primary</button>
        </div>
    </div>
    {{-- end tombol1 --}}

    {{-- st input1 --}}
    <div class="mx-5">
        <h2>Form Input Data</h2>
        <form action="" method="POST">
            @csrf <!-- Token CSRF wajib untuk keamanan -->

            <div class="row align-items-end"> <!-- Mulai Baris -->

                <!-- Lokasi -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <select name="lokasi" id="lokasi" class="form-select" required>
                            <option value="" disabled selected>Pilih Lokasi</option>
                            <option value="Jakarta">Jakarta</option>
                            <option value="Surabaya">Surabaya</option>
                            <option value="Bandung">Bandung</option>
                            <option value="Yogyakarta">Yogyakarta</option>
                        </select>
                    </div>
                </div>

                <!-- Tanggal -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                </div>

                <!-- Jenis Kendaraan -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="jenis_kendaraan">Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" id="jenis_kendaraan" class="form-select" required>
                            <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                            <option value="Mobil">Mobil</option>
                            <option value="Motor">Motor</option>
                            <option value="Truk">Truk</option>
                            <option value="Bus">Bus</option>
                        </select>
                    </div>
                </div>

            </div> <!-- Akhir Baris -->

            <!-- Tombol Submit -->
            <div class="mt-3 text-end">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>

    </div>
    {{-- end input1 --}}

</div>
@endsection
