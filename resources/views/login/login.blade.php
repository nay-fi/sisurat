@extends('login.layout')

@section('content')
<nav class="navbar navbar- navbar-dark">
    <div class="container-md m-auto">
      <main class="form-signin w-100 m-auto">
        <form>
          <i class="bi bi-shield-lock"></i>
          <h1 class="h3 mb-3 fw-normal">Please Log In</h1>
    
          <div class="form-floating">
            <input type="number" name="nip" class="form-control" id="floatingInput">
            <label for="floatingInput">NIP / NRP</label>
          </div>
          <div class="form-floating">
            <input type="password" name="password" class="form-control" id="floatingPassword">
            <label for="floatingPassword">Password</label>
          </div>
    
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me">Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

        </form>
      </main>
  </div>
</nav>

@endsection