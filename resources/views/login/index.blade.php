@extends('login.layout')

@section('content')

<div class="card mt-4">
	<div class="card-body text-center">
    <div class="col-md-3">
        <main class="form-signin flex-lg-wrap m-auto">
          <form method="post" href="{{route('user.index')}}"> 
          
          <h1 class="h3 mb-3 text-lg-center fw-normal">Sign In</h1>
          <div class="input-group mb-2">
            <span class="input-group-text" id="nip">NIP / NRP</span>
            <input type="number" name="nip" class="form-control" aria-label="NIP / NRP">
          </div>
          <div class="input-group mb-2">
            <span class="input-group-text" name="nip" id="nip">Password</span>
            <input type="password" name="password" class="form-control" aria-label="Password">
          </div>
            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <br />
            <br />
            Apakah Anda belum memiliki Akun? <a href="regis.index">Registrasi disini</a>
          </form>
        </main>
    </div>
</div>
</div>

@endsection