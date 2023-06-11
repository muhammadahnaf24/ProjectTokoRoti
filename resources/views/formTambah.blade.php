@extends('layout/master')

@section('konten')
<div class="container p-3">
    <h3 class="p-3 fw-bold text-light text-center">Isi Product</h3>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card mb-3" style="max-width: 1080px;">
                <div class="row g-0">
                    <form action="/formTambah/store" method="post" class="p-3" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Makanan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail3" name="nama">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="stok">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputPassword3" name="harga">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" name="file">
                        </div> 
                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        Example checkbox
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary justify-content-center">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>



@endsection