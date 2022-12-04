@extends('ops.layout')

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

<div class="card mt-4">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Surat Masuk</h5>

		<form method="post" action="{{ route('ops.store') }}">
			@csrf
            <div class="mb-3">
                <label for="no_ops" class="form-label">Nomor Surat Ops</label>
                <input type="text" class="form-control" id="no_ops" name="no_ops">
            </div>
			<div class="mb-3">
                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                <input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
            </div>
			<div class="mb-3">
                <label for="tentang" class="form-label">Perihal</label>
                <input type="text" class="form-control" id="tentang" name="tentang">
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Surat</label>
                <input type="text" class="form-control" id="isi" name="isi">
            </div>
            <div class="mb-3">
                <label for="petugas" class="form-label">Petugas yang mengisi</label>
                <input type="text" class="form-control" id="petugas" name="petugas">
            </div>
            <div class="mb-3">
                <label for="no_sium" class="form-label">No Sium</label>
                <input type="text" class="form-control" id="no_sium" name="no_sium">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Tambah" />
			</div>
		</form>
	</div>
</div>

@stop