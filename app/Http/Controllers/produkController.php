<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;

class produkController extends Controller
{
    // tampil produk
    public function index()
    {
        // $allProduk = DB::table('produks')->paginate(6);
        $allProduk = Produk::all();
        return view('produk', ['allProduk' => $allProduk]);
        // var_dump($allProduk);
    }

    //tambah produk
    public function tambahProduk()
    {
        return view('tambahProduk');
    }

    //simpan tambah produk

    public function simpanProduk(Request $request)
    {
        // // dd($request->all());
        //DB::insert('insert into produks (NAMA_PRODUK, KATEGORI, JUMLAH, HARGA, GAMBAR) values (?, ?, ?, ?, ?)', [$request->NAMA_PRODUK, $request->KATEGORI, $request->JUMLAH, $request->HARGA, $request->GAMBAR]);
        // return redirect()->route('produk');
        // DB::table('produks')->insert(
        //     [
        //         'NAMA_PRODUK' => $request->NAMA_PRODUK,
        //         'KATEGORI' => $request->KATEGORI,
        //         'JUMLAH' => $request->JUMLAH,
        //         'HARGA' => $request->HARGA,
        //         'GAMBAR' => $request->GAMBAR,
        //         'DESKRIPSI' => $request->DESKRIPSI
        //     ]
        // );

        $file = Request()->GAMBAR;
        $filenName = Request()->NAMA_PRODUK . '.' . $file->extension();
        $file->move(public_path('image'), $filenName);

        $produk = new Produk;
        $produk->NAMA_PRODUK = $request->NAMA_PRODUK;
        $produk->KATEGORI = $request->KATEGORI;
        $produk->JUMLAH = $request->JUMLAH;
        $produk->HARGA = $request->HARGA;
        $produk->GAMBAR = $filenName;
        $produk->DESKRIPSI = $request->DESKRIPSI;
        $produk->save();
        return redirect()->route('produk')->with('status', 'produk berhasil ditambahkan');



        // $data = [
        //     'NAMA_PRODUK' => Request()->NAMA_PRODUK,
        //     'KATEGORI' => Request()->KATEGORI,
        //     'JUMLAH' => Request()->JUMLAH,
        //     'HARGA' => Request()->HARGA,
        //     'GAMBAR' => $filenName,
        //     'DESKRIPSI' => Request()->DESKRIPSI,
        // ];

        // $this->Produk->addData($data);
        // return redirect()->route('tambahProduk')->with('pesan', 'Data berhasil ditambahkan');

    }

    //edit produk
    public function editProduk($id)
    {
        // return redirect()->route('editProduk');
        $produk = Produk::where('id', $id)->first();
        // $produk = DB::table('produks')->where('id', $id)->first();
        // var_dump($produk);
        return view('editDataProduk', compact('produk'));
    }

    //edit produk proses
    public function editProdukProses(Request $request, $id)
    {
        // return redirect()->route('editProduk');
        // DB::table('produks')->where('id', $id)
        //     ->update([

        //         'NAMA_PRODUK' => $request->NAMA_PRODUK,
        //         'KATEGORI' => $request->KATEGORI,
        //         'JUMLAH' => $request->JUMLAH,
        //         'HARGA' => $request->HARGA,
        //         'GAMBAR' => $request->GAMBAR,
        //         'DESKRIPSI' => $request->DESKRIPSI

        //     ]);

        $produk = Produk::where('id', $id)->first();
        $produk->NAMA_PRODUK = $request->NAMA_PRODUK ? $request->NAMA_PRODUK : $produk->NAMA_PRODUK;
        $produk->KATEGORI = $request->KATEGORI ? $request->KATEGORI : $produk->KATEGORI;
        $produk->JUMLAH = $request->JUMLAH ? $request->JUMLAH : $produk->JUMLAH;
        $produk->HARGA = $request->HARGA ? $request->HARGA : $produk->HARGA;
        $produk->GAMBAR = $request->GAMBAR ? $request->GAMBAR : $produk->GAMBAR;
        $produk->DESKRIPSI = $request->DESKRIPSI ? $request->DESKRIPSI : $produk->DESKRIPSI;
        $produk->save();
        // dd($produk);
        return redirect()->route('produk')->with('status', 'produk berhasil diedit');
    }

    //detail produk 
    public function detailProduk($id)
    {
        // return redirect()->route('editProduk');
        $produk = DB::table('produks')->where('id', $id)->first();
        // dd($produk);
        return view('detailProduk', compact('produk'));
    }

    // hapus produk
    public function hapusProduk($id)
    {
        // $produk = DB::table('produk')->where('id', $id)->delete();
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->back();
        }
        $produk->delete();
        return redirect()->route('produk')->with('status', 'produk berhasil dihapus');
    }

    public function homepage()
    {
        return view('autentikasi.login');
    }

    public function addStock(Request $request, $id)
    {
        $stock2 = $request->STOK2;
        $stock = $request->STOK;

        $addstock = $stock2 + $stock;
        $produk = Produk::where('id', $id)->first();
        $produk->JUMLAH = $addstock;
        $produk->save();
        return redirect()->route('produk')->with('status', 'stok produk berhasil di tambah');
        // dd($produk);
    }
}
