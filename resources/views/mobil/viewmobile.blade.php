@extends('templet.templet')

@section('title', 'Home Page')

@section('content')


<div class="container mt-5">
    <div class="row">
        <div class="col-10">
        <h2 class="mb-4">Daftar Kendaraan</h2>
        </div>
        <div class="col-2">
            @if(Auth::user()->role_user === 'admin')
            <a href="{{ route('mobiladd') }}" class="btn btn-primary">AddMobil</a>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Merek</th>
                <th>Kapasitas</th>
                <th>Plat</th>
                <th>Status</th>
                <th>Harga per Hari</th>
                <th>Gambar</th>
                <th>Model</th>
                <th>Terakhir Update</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ( $datamobil as $mobil )

            <tr>
                <td>{{ $no }}</td>
                <td>{{ $mobil->merek }}</td>
                <td>{{ $mobil->kapasitas }}</td>
                <td>{{ $mobil->plat }}</td>
                <td>{{ $mobil->status }}</td>
                <td>{{ number_format($mobil->price_per_day, 2) }}</td>
                <td>
                    @if($mobil->gambar_direc && file_exists(public_path('storage/'. $mobil->gambar_direc)))
                        <img src="{{ asset('storage/'. $mobil->gambar_direc) }}" alt="Gambar Mobil" class="img-fluid" width="100">
                    @else
                        <span> Gambar tidak Ada </span>
                    @endif
                </td>
                <td>{{ $mobil->model }}</td>
                <td>{{ $mobil->updated_at }}</td>
                <td>
                    <form action="{{ route('viewedit', $mobil->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-warning btn-sm">Edit</button>
                    </form>
                    <form id="delet-form" action="{{ route('mobil.deletmobil', $mobil->id ) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @php $no++; @endphp
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data mobil.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection
