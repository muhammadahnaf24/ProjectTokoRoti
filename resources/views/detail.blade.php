@extends('layout/master')

@section('konten')
<div class="container p-3">
    <h3 class="p-3 fw-bold text-light text-center">Isi Product</h3>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mb-3" style="max-width: 1080px;">
                <div class="row g-0">
                    <form action="/product/update" method="post" class="p-3">
                        {{ csrf_field()}}
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset($data->image)}}" alt="" class="img-fluid rounded-start">
                            </div>
                            <div class="col-md-6">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">ID Makanan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{$data->id}}" name="id">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Nama Makanan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{$data->nama}}" name="nama">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Stok</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{$data->stok}}" name="stok">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" value="{{$data->harga}}" name="harga">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-danger" href="/product/delete/{{ $data->id }}" role="button">Hapus</a>
                                <input type="submit" value="Edit" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
@endsection