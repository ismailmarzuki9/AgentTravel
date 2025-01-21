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
            <a href="{{ route('kulineradd') }}" class="btn btn-primary">AddKuliner</a>
            @endif
        </div>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Kuliner</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Rating</th>
                <th>Gambar</th>
                <th>lokasi</th>
                <th>* Action *</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ( $datakuliner as $data )
            <tr>
                <td>{{ $no }}</td>
                <td>{{ $data->nama_kuliner }}</td>
                <td>{{ $data->deskripsi }}</td>
                <td>{{ $data->harga_rata }}</td>
                <td>{{ $data->reting }}</td>

                <td>
                    @if($data->gambar && file_exists(public_path('storage/'. $data->gambar)))
                        <img src="{{ asset('storage/'. $data->gambar) }}" alt="Gambar Mobil" class="img-fluid" width="100">
                    @else
                        <span> Gambar tidak Ada </span>
                    @endif
                </td>

                <td>{{ $data->lokasi }}</td>

                <td>
                    <form action="{{ route('kulineredit', $data->id) }}" method="GET">
                        @csrf
                        <button class="btn btn-warning btn-sm">Edit</button>
                    </form>

                    <form id="delet-form" action="{{ route('data.deletkuliner', $data->id ) }}" method="POST">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" >Delete</button>
                    </form>
                    membuat delet dengan alert untuk memastikan ulang, dan menyimpan script pada file public js tidak di paste satu2 pada view
                </td>
            </tr>
            @php $no++; @endphp
            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
            @empty
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data kuliner.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


{{-- memastikan data benar-benar mau di hapus --}}
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector("#delet-form").forEach(form => {
            form.addEventListener('submit', function(e) {
                if (!confirm('Yakin ingin menghapus data ini?')) {
                    e.preventDefault();
                }
            });
        });
    });
</script> --}}



@endsection
