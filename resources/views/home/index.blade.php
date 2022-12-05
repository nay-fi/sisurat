@extends('home.layout')

@section('content')

<body class="antiliased">
    
    <nav class="bg-light justify-content-center">
        <div class="card px-4">
            <div class="row gx-3 flex-md-row">

                <div class="col-4 mt-5 mb-2 ">
                    <div class="p-3 border">
                        <h5 class="card-title">BAG OPS</h5><br />
                        <p class="card-text">Bag Ops adalah Suatu bagian yang mengurus keperluan administrasi lapangan dari Polrestabes.
                                Bertujuan mengirim setiap surat dari pihak external dan stakeholder yang akan dikirim ke Sium untuk dimintai tanda tangan.</p><br /><br />
                        <a href="{{ route('ops.index') }}" class="btn btn-primary">Bag Ops</a>
                    </div>
                </div>

                <div class="col-4 mt-5 mb-2">
                    <div class="p-3 border">
                        <h5 class="card-title">SIUM</h5><br />
                        <p class="card-text">Sium adalah Suatu bagian yang mengurus keperluan administrasi pusat dari Polrestabes.
                                Bertujuan menerima setiap surat dari seluruh bagian Sie dan memberikan nomor pada surat yang telah didistribusikan oleh bagian tersebut yang kemudian akan diteruskan ke atasan untuk dimintai tanda tangan.</p>
                        <a href="{{ route('sium.index') }}" class="btn btn-primary">SIUM</a>
                    </div>
                </div>

                <div class="col-4 mt-5 mb-5 ">
                    <div class="p-3 border">
                        <h5 class="card-title">BAG SUMDA</h5><br />
                        <p class="card-text">Sumda adalah Suatu bagian yang mengurus keperluan sumber daya Polrestabes.
                                Bertujuan mengirim setiap surat kapda sium dan meminta nomor pada surat yang telah didistribusikan oleh sium akan diteruskan ke atasan untuk dimintai tanda tangan.</p><br /><br />
                        <a href="{{ route('sumda.index') }}" class="btn btn-primary">BAG SUMDA</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>