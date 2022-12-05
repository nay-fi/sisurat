@extends('sumda.layout')

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

		<form method="post" action="{{ route('sumda.update', $data->no_sumda) }}">
			@csrf
            <div class="mb-3">
                <label for="no_sumda" class="form-label">Nomor Surat Masuk</label>
                <input type="text" class="form-control" id="no_sumda" name="no_sumda" value="{{ $data->no_sumda }}">
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
                <label for="isi" class="form-label">Isi Surat</label>
                <input type="text" class="form-control" id="isi" name="isi" value="{{ $data->isi }}">
            </div>
            <div class="mb-3">
                <label for="petugas" class="form-label">Petugas Surat</label>
                <input type="text" class="form-control" id="petugas" name="petugas" value="{{ $data->petugas }}">
            </div>
            <div class="mb-3">
                <label for="no_sium" class="form-label">Nomor Sium Surat</label>
                <input type="text" class="form-control" id="no_sium" name="no_sium" value="{{ $data->no_sium }}">
            </div>
			<div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ubah" />
			</div>
		</form>
	</div>
</div>

@stop