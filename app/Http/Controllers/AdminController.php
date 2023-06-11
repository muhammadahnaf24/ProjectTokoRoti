<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Makanan as MakananModel;
use App\Models\Pesanan as PesananModel;
use App\Models\Admin as AdminModel;

class AdminController extends Controller
{
    //
    public function dataMakanan()
    {
        $showData = MakananModel::select('makanan.id', 'makanan.image', 'makanan.nama', 'makanan.stok', 'makanan.harga')
            ->get();
        //dd($showData);
        return view('product', ['dataMakanan' => $showData]);
    }

    public function dataPesanan()
    {
        $showData = PesananModel::join('makanan','makanan.id','=','Pesanan.makanan_id')
            ->select('pesanan.id', 'makanan.nama', 'pesanan.jumlah_barang', 'pesanan.tanggal', 'pesanan.total_harga', 'pesanan.status')
            ->get();
        //dd($showData);
        return view('pesanan', ['dataPesanan' => $showData]);
    }

    public function store(Request $request)
    {
        $file = $request->file('file');
        $tujuan_upload = 'img';
		$file->move($tujuan_upload,$file->getClientOriginalName());
        $name_image = 'img/'.$file->getClientOriginalName();
        DB::table('makanan')->insert(
            [
                'nama' => $request->nama,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'image' => $name_image
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
        return view('detail', ['data' => $data]);
    }

    public function update(Request $request)
    {
        // $stok = (int)$request->stok;
        // $harga = (int)$request->harga;

        DB::table('makanan')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'harga' => $request->harga
        ]);
        // alihkan halaman ke halaman pegawai
        // $data = MakananModel::where('id', $request->id)
        //     ->update(['nama' => $request->nama])
        //     ->update(['stok' => $stok])
        //     ->update(['harga' => $harga]);
            
        return redirect('/product');
    }

    public function login(Request $request) {
        $showData = AdminModel::where('name',$request->username)
            ->get();
        // echo $request->username;
        
        foreach ($showData as $data) {
            if ($data->password == $request->password) {
                return view('halamanUtama');
            } else {
                return view('loginAdmin');
            }
        }
        
    }

    public function verif($id)
    {
        $update_status = "Dalam Proses";
        DB::table('pesanan')->where('id', $id)->update([
                'status' => $update_status
        ]);

        return redirect('/pesanan');
    }
}
