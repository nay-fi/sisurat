@extends('sium.layout')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand mr-5" href="">Si Surat Polrestabes Semarang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse text-lg-left navbar-collapse justify-content-right" id="navbarScroll">
            </div>
        </div>
    </nav>
    
    @section('content')
    
    <h4 class="mt-5">Data Surat Masuk Sie Umum Polrestabes</h4><br /><br />
    <form class="d-flex" action="{{route('sium.search')}}" method="get">
        <input type="search" id="search" name="search" class="form-control me-2" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
    <div class="input-group mb-3 mt-2">
        <a href="{{ route('sium.create') }}" type="button" class="btn btn-success rounded-3">Tambah Surat Masuk</a>
    </div>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>Nomor Surat</th>
        <th>Tanggal Surat</th>
        <th>Tentang</th>
        <th>Kepada</th>
        <th>Tembusan</th>
        <th>Petugas</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->no_sium }}</td>
                <td>{{ $data->tgl_surat }}</td>
                <td>{{ $data->tentang }}</td>
                <td>{{ $data->kepada }}</td>
                <td>{{ $data->tembusan }}</td>
                <td>{{ $data->petugas }}</td>
                <td>
                    <a href="{{ route('sium.edit', $data->no_sium) }}" type="button" class="btn btn-warning rounded-3">
                        <i class="material-icons" style="font-size:20px;color:white;">edit_document</i>
                    </a>
                    <!-- Button harddelete -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->no_sium }}">
                        <i class="material-icons" style="font-size:20px;color:white;">delete_forever</i>
                    </button>

                    <a href="{{ route('sium.softDelete',$data->no_sium) }}" type="button" class="btn btn-secondary">
                        <i class="material-icons" style="font-size:20px;color:white;">delete_outline</i>
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->no_sium }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('sium.delete', $data->no_sium) }}">
                                    @csrf
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus data ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Ya</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop