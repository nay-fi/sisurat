@extends('data.layout')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Si Surat Polrestabes Semarang</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            </div>
        </div>
    </nav>
    
    @section('content')
    
    <h4 class="mt-5">Data Surat Masuk Polrestabes</h4>
    <br /><br />
    <form class="d-flex" action="{{route('join.search')}}" method="get">
            <input type="search" id="search" name="search" class="form-control me-2" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
    </form>

<!-- <div class="input-group mb-3 mt-2 flex-lg-wrap">
    <a href="{{ route('ops.create') }}" type="button" class="btn btn-success rounded-3">Tambah Surat Masuk</a>
    </div> -->

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
        <!-- <th>Isi</th> -->
        <th>Petugas</th>
        <!-- <th>Nomor Sium</th> -->
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
            <tr>
                <td>{{ $data->no_sium }}</td>
                <td>{{ $data->tgl_surat }}</td>
                <td>{{ $data->tentang }}</td>
                
                <td>{{ $data->petugas }}</td>
                
                
            </tr>
        @endforeach
    </tbody>
</table>
@stop