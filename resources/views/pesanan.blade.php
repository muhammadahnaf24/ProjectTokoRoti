@extends('layout/master')

@section('konten')
<div class="container p-3">
    <h3 class="p-3 fw-bold text-light text-center">Pesanan</h3>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mb-3" style="max-width: 1080px;">
                <table class="table table-striped table-hover">
                    <tr>
                        <td>ID Pesanan</td>
                        <td>Nama</td>
                        <td>Jumlah</td>
                        <td>Tanggal Pemesanan</td>
                        <td>Total Harga</td>
                        <td>Status</td>
                    </tr>
                    @foreach($dataPesanan as $dp)
                    <tr>
                        <td>{{$dp->id}}</td>
                        <td>{{$dp->nama}}</td>
                        <td>{{$dp->jumlah_barang}}</td>
                        <td>{{$dp->tanggal}}</td>
                        <td>{{$dp->total_harga}}</td>
                        @if ($dp->status === "Belum")
                            <td>
                                <a href="{{ route('verif',['id' => $dp->id])}}">
                                    <button type="button" class="btn btn-success">Verifikasi</button>
                                </a>
                            </td>
                        @else
                            <td>{{$dp->status}}</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>

@endsection