@extends('login.layout')

@section('content')

  <div class="container fw-bolder">
    <div class="card mt-6 col-6 m-auto">
      <div class="card-body">

        <div class="wrap ml-3 mr-3 mb-4 mt-3">
            <form method="post" action="/login/auth">
              @csrf
              @if (session()->has('success'))
                <div class="alert alert-success col-lg mt-3" role="alert">
                    {{ session('success') }}
                </div>
              @endif
              @if (session()->has('loginError'))
                <div class="alert alert-danger col-lg" role="alert">
                    {{ session('loginError') }}
                </div>
              @endif
                <h1 class="h3 mb-3 text-lg-center fw-normal">Sign In</h1>
                <div class="input-group mb-2">
                  <span class="input-group-text" id="nip">NIP / NRP</span>
                  <input type="number" name="nip" class="form-control" aria-label="NIP / NRP">
                </div>
    
                <div class="input-group mb-2">
                  <span class="input-group-text" name="nip" id="nip">Password</span>
                  <input type="password" name="password" class="form-control" aria-label="Password">
                </div>
                
                  <!-- Link Registrasi -->
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                  <br />
                  <br />
                  Apakah Anda belum memiliki Akun? <a href="/register/index">Registrasi disini</a>
              </form>
            </div>
        </div>
    </div>
  </div>

@endsection