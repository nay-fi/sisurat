@extends('sium.layout')

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

<div class="card mt-4 mb-3 col-8 m-auto">
	<div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Update Surat Masuk</h5>

		<form method="post" action="{{ route('sium.update', $data->no_sium) }}">
			@csrf
            <div class="mb-3">
                <label for="no_sium" class="form-label">Nomor Surat Masuk</label>
                <input type="text" class="form-control" id="no_sium" name="no_sium" value="{{ $data->no_sium }}">
            </div>
			<div class="mb-3">
                <label for="tgl_surat" class="form-label">Tanggal Surat</label>
                <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="{{ $data->tgl_surat }}">
            </div>
            <div class="mb-3">
                <label for="tentang" class="form-label">Perihal Surat</label>
                <input type="text" class="form-control" id="tentang" name="tentang" value="{{ $data->tentang }}">
            </div>
            <div class="mb-3">
                <label for="kepada" class="form-label">Tujuan Surat</label>
                <input type="text" class="form-control" id="kepada" name="kepada" value="{{ $data->kepada }}">
            </div>
            <div class="mb-3">
                <label for="tembusan" class="form-label">Tembusan Surat</label>
                <input type="text" class="form-control" id="tembusan" name="tembusan" value="{{ $data->tembusan }}">
            </div>
            <div class="mb-3">
                <label for="petugas" class="form-label">Petugas Penulis Surat</label>
                <input type="text" class="form-control" id="petugas" name="petugas" value="{{ $data->petugas }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@ssium