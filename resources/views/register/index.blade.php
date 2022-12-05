@extends('register.layout')

@section('content')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach
        </ul>
    </div>
@endif  

<div class="card mt-5 mb-4 col-6 m-auto">
	<div class="card-body ">

        <h5 class="card-title fw-bolder mb-3">Registrasi</h5>

		<form method="post" action="{{ route('user.store') }}">
			@csrf
            <div class="mb-3">
                <label for="nip" class="form-label">NIP / NRP</label>
                <input type="text" class="form-control" id="nip" name="nip">
            </div>
			<div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan">
            </div>
            <div class="mb-3">
                <label for="bagian" class="form-label">Bagian</label>
                <input type="text" class="form-control" id="bagian" name="bagian">
            </div>          
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Sign Up" />
			</div>
            <br />
            Anda sudah memiliki Akun? <a href="{{ route('login.index') }}">Login</a>
		</form>
	</div>
</div>

@stop