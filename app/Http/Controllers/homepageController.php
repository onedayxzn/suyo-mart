<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Illuminate\Support\Facades\DB;

class homepageController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function searchAdmin(Request $request)
    {
        $cari = $request->get('search');
        $allProduk = Produk::all();

        if ($cari) {
            $allProduk = Produk::where("NAMA_PRODUK", "LIKE", "%$cari%")
                ->orWhere("KATEGORI", "LIKE", "%$cari%")->get();
        }
        return view('produk', ['allProduk' => $allProduk]);
    }

    public function searchKonsumen(Request $request)
    {
        $cari = $request->get('cari');
        $allProduk = Produk::all();

        if ($cari) {
            $allProduk = Produk::where("NAMA_PRODUK", "LIKE", "%$cari%")
                ->orWhere("KATEGORI", "LIKE", "%$cari%")->get();
        }
        return view('home', ['allProduk' => $allProduk]);
    }
    public function profile()
    {
        return view('profile');
    }
}
