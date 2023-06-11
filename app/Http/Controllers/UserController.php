<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Makanan as MakananModel;
use App\Models\Pesanan as PesananModel;

class UserController extends Controller
{
    //
    public function dataMakanan()
    {
        $showData = MakananModel::select('makanan.id', 'makanan.image', 'makanan.nama', 'makanan.stok', 'makanan.harga')
            ->get();
        //dd($showData);
        return view('user/productUser', ['dataMakanan' => $showData]);
    }

    public function dataRiwayat()
    {
        $showData = PesananModel::join('makanan','makanan.id','=','Pesanan.makanan_id')
            ->select('pesanan.id', 'makanan.nama', 'pesanan.jumlah_barang', 'pesanan.tanggal', 'pesanan.total_harga', 'pesanan.status')
            ->get();
        //dd($showData);
        return view('user/riwayat', ['dataPesanan' => $showData]);
    }

    public function store(Request $request)
    {
        DB::table('makanan')->insert(
            [
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga
            ]
        );
        return redirect('/product');
    }

    public function delete($id)
    {
        DB::table('makanan')->where('id', $id)->delete();
        return redirect('/product');
    }

    public function detail($id)
    {
        $data = MakananModel::select('makanan.id', 'makanan.image', 'makanan.nama', 'makanan.stok', 'makanan.harga')
            ->find($id);
        return view('user/detailUser', ['data' => $data]);
    }

    public function update(Request $request)
    {
        DB::table('pesanan')->insert(
            [
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga
            ]
        );
        return redirect('/product');
    }

    public function beli(Request $request,$id)
    {
        $data = MakananModel::select('makanan.id', 'makanan.image', 'makanan.nama', 'makanan.stok', 'makanan.harga')
        ->find($id);
        $status = "Belum";
        $tanggal = date("Y-m-d");
        $total_harga = $request->jumlah_barang * $data->harga;
        DB::table('pesanan')->insert([
            'makanan_id' => $id,
            'tanggal' => $tanggal,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $total_harga,
            'status' => $status
        ]);
        return redirect('/produk');
    }

}
