@extends('ops.layout')

@section('content')

<h4 class="mt-5">Data Surat Masuk Bag Ops Polrestabes</h4>

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div class="input-group mb-3 mt-2 flex-lg-wrap">
    <a href="{{ route('ops.create') }}" type="button" class="btn btn-success rounded-3">Tambah Surat Masuk</a>
    <form action="{{route('ops.search')}}" method="get">  
        <input type="search" id="search" name="search" class="form-control" placeholder="Search" aria-label="Search">
    </form>
    </div>

@if($message = Session::get('success'))
    <div class="alert alert-success mt-3" role="alert">
        {{ $message }}
    </div>
@endif

<table class="table table-responsive-lg table-hover mt-2">
    <thead>
      <tr>
        <th>Nomor Surat</th>
        <th>Tanggal Surat</th>
        <th>Tentang</th>
        <th>Isi</th>
        <th>Petugas</th>
        <th>Nomor Sium</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->no_ops }}</td>
                <td>{{ $data->tgl_surat }}</td>
                <td>{{ $data->tentang }}</td>
                <td>{{ $data->isi }}</td>
                <td>{{ $data->petugas }}</td>
                <td>{{ $data->no_sium }}</td>
                <td>
                    <a href="{{ route('ops.edit', $data->no_ops) }}" type="button" class="btn btn-warning rounded-3">
                        <i class="material-icons" style="font-size:20px;color:white;">edit_document</i>
                    </a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->no_ops }}">
                        <i class="material-icons" style="font-size:20px;color:white;">delete_outline</i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="hapusModal{{ $data->no_ops }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('ops.delete', $data->no_ops) }}">
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