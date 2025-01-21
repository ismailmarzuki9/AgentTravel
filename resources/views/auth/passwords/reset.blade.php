@extends('templet.templetLogin')

@section('title', 'Home Page')

@section('content')

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p>{{ $error}}</p>
    @endforeach
    @endif
    @if (Session::has('message') ) // untuk session waktu user akses aktif atau tidak
    <p>{{ Session ::get('message')}}</p>
    @endif

<div class="container my-5">
    <form method="POST" action="{{ route('changepasswordCek') }}" class="mx-5">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail">Chane Password</label>
            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Enter Email Address..." required>
        </div>

        <div class="form-group">
            <input type="password" name="new_password" class="form-control form-control-user" placeholder="New Password" required>
        </div>

        <div class="form-group">
            <input type="password" name="new_password_confirmation" class="form-control form-control-user" placeholder="Confirm New Password" required>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block">Submit</button>
    </form>
</div>

@endsection
