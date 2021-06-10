<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Produk;
use App\Pesanan;

class pesananController extends Controller
{

    //menampilkan seluruh produk
    public function index()
    {

        // $allProduk = DB::table('produks')->get();
        $allProduk = Produk::all();
        // dd($allProduk);
        return view('home', ['allProduk' => $allProduk]);
    }
    //menampilkan seluruh produk indonesia
    public function indonesia()
    {
        // $allProduk = DB::table('produks')->where('KATEGORI', '=', 'INDONESIA FOOD')->get();
        // dd($allProduk);
        $allProduk = Produk::all()->where('KATEGORI', '=', 'INDONESIA FOOD');
        return view('indonesia', ['allProduk' => $allProduk]);
    }
    //menampilkan seluruh produk korea
    public function korea()
    {
        // $allProduk = DB::table('produk')->where('KATEGORI', '=', 'KOREAN FOOD')->get();
        // dd($allProduk);
        $allProduk = Produk::all()->where('KATEGORI', '=', 'KOREAN FOOD');
        return view('korea', ['allProduk' => $allProduk]);
    }
    //menampilkan seluruh produk japan
    public function japan()
    {
        // $allProduk = DB::table('produk')->where('KATEGORI', '=', 'KOREAN FOOD')->get();
        // dd($allProduk);
        $allProduk = Produk::all()->where('KATEGORI', '=', 'JAPANESE FOOD');
        return view('japan', ['allProduk' => $allProduk]);
    }
    //menampilkan seluruh produk india
    public function india()
    {
        $allProduk = Produk::all()->where('KATEGORI', '=', 'INDIAN FOOD');
        return view('india', ['allProduk' => $allProduk]);
    }
    //akses detail 
    public function detailProduk($id)
    {
        // $produk = DB::table('produk')->where('ID_PRODUK', $id)->first();
        // dd($produk);
        $produk = Produk::where('id', $id)->first();
        return view('detail', compact('produk'));
    }

    // simpan pesanan
    public function pesanProduk(Request $request)
    {

        $stok = $request->stok;
        $jumlah = $request->jumlah;
        $stock = $stok - $jumlah;
        if ($jumlah > $stok) {
            return redirect()->route('home')->with('status', 'pemesanan tidak berhasil, stok kurang');
        }

        $produk = Produk::where('id', $request->id)->first();
        $produk->JUMLAH = $stock;
        $produk->save();

        $produk = new Pesanan();
        $produk->NAMA_KONSUMEN = $request->nama_konsumen;
        $produk->ID_PRODUK = $request->id;
        $produk->NAMA_PRODUK = $request->nama_produk;
        $produk->HARGA = $request->harga;
        $produk->JUMLAH_BELI = $request->jumlah;
        $produk->JUMLAH_BAYAR = $request->jumlah_bayar;
        $produk->TANGGAL_PESAN = $request->tanggal;
        $produk->save();
        return redirect()->route('home')->with('status', 'pemesanan berhasil dilakukan');
    }

    // public function minStock(Request $request, $id)
    // {
    //     $stok = $request->stok;
    //     $jumlah = $request->jumlah;

    //     $stock = $stok - $jumlah;

    //     $produk = Produk::where('id', $id)->first();
    //     $produk->JUMLAH = $stock;
    //     $produk->save();
    // }


    public function homepage()
    {
        return view('home');
    }

    public function pesanan()
    {
        $pesanan = Pesanan::paginate(5);;
        // dd($pesanan);
        return view('pesanan', ['pesanan' => $pesanan]);
    }

    // hapus pesanan
    public function hapusPesanan($ID_PESANAN)
    {
        $pesanan = Pesanan::find($ID_PESANAN);
        if (!$pesanan) {
            return redirect()->back();
        }
        $pesanan->delete();
        return redirect()->route('pesanan')->with('status', 'produk berhasil dihapus');
    }

    // public function chekout($id)
    // {
    //     $produk = Produk::where('id', $id)->first();
    //     return view('checkout', compact('produk'));
    // }
}
