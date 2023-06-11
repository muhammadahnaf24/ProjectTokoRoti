@extends('layout/master')

@section('konten')
<div class="container p-3">
    <div class="row p-3">
        <div class="col">
            <h3 class="p-0 fw-bold text-light">Daftar Cookies</h3>
        </div>
        <div class="col d-flex justify-content-end">
            <a class="btn btn-primary" href="{{route('formTambah')}}" role="button">Tambah Product</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @Foreach($dataMakanan as $dm)
        <div class="col">
            <div class="card h-100">
                <img src="{{asset($dm->image)}}" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$dm->nama}}</h5>
                    <p class="card-text">{{$dm->harga}}</p>
                    <a class="btn btn-primary" href="{{ route('detail',['id' => $dm->id])}}" role="button">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection