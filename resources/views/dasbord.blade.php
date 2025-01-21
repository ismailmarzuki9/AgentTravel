@extends('templet.templet')

@section('title', 'Home Page')

@section('content')
<div class="latarbelakang1 container-fluid p-5"> <!-- card 1 dasboard -->
    <div class="row align-items-center">
        <div class="col-sm-8 mt-5">
            <h1>Welcome to Our Travel Agent Website!</h1>
            <p>Book your tickets and services easily with us.</p>
            <div class="col-">
                <button type="button" class="btn btn-success" onclick="openWhatsApp()">WhatsApp</button>
                <button type="button" class="btn btn-light"> Availabel drivers</button>
            </div>
        </div>

        <div class="col-sm-4"></div>
    </div>
</div>

<div class="container mt-4 "> <!-- card mobil -->
    <div class="row d-flex justify-content-around">
        {{-- @dd($dataAll); --}}
        @foreach ($dataAll['mobil'] as  $mobil)

        <div class="card p-0" style="width: 13rem;">
            <img src="{{ asset('storage/'. $mobil->gambar_direc) }}" class="card-img-top mb-0" alt="...">
                <div class="card-body pt-1">
                    <h5 class="card-title fw-bold m-0">{{ $mobil->merek }}</h5>
                    <p class="card-text mt-0 p-0">Isi {{ $mobil->kapasitas }}</p>
                    <a href="https://wa.me/6282231792466?text=Halo%20saya%20ingin%20bertanya" target="_blank" class="btn btn-primary">Order Now</a>
                </div>
            </div>

        @endforeach
    </div>
</div>

<div class="container"> <!-- card diskon -->
    <div class="card text-dark bg-info mb-3 p-1" style="max-width: auto;">
        <div class="card-body">
            <h5 class="card-title">Diskon sampai dengan</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
</div>

<div class="container-fluid ms-5 mb-5"> <!-- card pariwisata -->
    <h5>Rediscover yourself in Asia and beyond</h5>
    <div class="row">
        <div class="col-3 mb-3">
            <div class="card bg-dark text-white rounded">
            <img src="/images/wpantai.jpg" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with .</p>
                    <p class="card-text">Last updated 3 mins ago</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- Endcard pariwisata -->

<div class="container bg-info mb-3 p-1 text-center"> Nikmati Kuliner Khas Batam</div>
{{-- kuliner start --}}
<div class="container">
    <div class="row">

        @foreach ( $dataAll['kuliner'] as $kuliner)
        <div class="card shadow p-3 mb-5 bg-body rounded" style="width: 18rem;">
            <img src="/images/makanan.jpg" class="rounded-circle card-img-top m-2" alt="...">
            <div class="card-body">
              <p class="card-text text-center">{{ $kuliner->nama_kuliner }}</p>
            </div>
          </div>
        @endforeach

    </div>
</div>
{{-- kuliner End --}}


 {{-- scrip pesan langsung ke watsapp --}}
 <script>
    function openWhatsApp() {
        const phoneNumber = "6281378569544"; // Ganti dengan nomor tujuan (gunakan format internasional, tanpa + atau 0 di depan)
        const message = "Halo, saya ingin bertanya..."; // Pesan yang ingin diisi otomatis
        const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
        window.open(url, '_blank'); // Membuka WhatsApp di tab baru
    }
</script>

@endsection
