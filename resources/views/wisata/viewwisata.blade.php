@extends('templet.templet')

@section('title', 'Home Page')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-10">
        <h2 class="mb-4">Daftar Kuliner</h2>
        </div>
        <div class="col-2">
            @if(Auth::user()->role_user === 'admin')
            <a href="{{ route('wisataadd') }}" class="btn btn-primary">Add wisata</a>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama wisata</th>
                <th>Rating</th>
                <th>Deskripsi</th>
                <th>lokasi</th>
                <th>Harga_tiket</th>
                <th>Gambar</th>
                <th>* Action *</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ( $datawisata as $data )
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $data->nama_wisata }}</td>
                <td>{{ $data->reting }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>{{ $data->lokasi }}</td>
                <td>{{ $data->harga_tiket }}</td>

                <td>
                    {{-- {{ dd($data->gambar) }} --}}
                    @if($data->gambar && file_exists(public_path('storage/'. $data->gambar)))
                        <img src="{{ asset('storage/'. $data->gambar) }}" alt="Gambar Mobil" class="img-fluid" width="100">
                    @else
                        <span> Gambar tidak Ada </span>
                    @endif
                </td>

                <td>
                    <form action="{{ route('data.wisatedit', $data->id ) }}" method="GET">
                        @csrf
                        <button class="btn btn-warning btn-sm">Edit</button>
                    </form>
                    {{-- mencoba membuat link dengan form, method posts dan tanpa form, method post --}}
                    <form id="delet-form" action="{{ route('data.wisatdelet', $data->id ) }}" method="POST">
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
                    <td colspan="8" class="text-center">Tidak ada data !!.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
