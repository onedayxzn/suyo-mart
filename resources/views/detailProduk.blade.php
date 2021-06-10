@extends('layouts/master')
@section('title', 'Produk')
@section('content')

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('produk') }}">Produk</a></div>
                    <div class="breadcrumb-item active"><a href="#">{{ $produk->NAMA_PRODUK }}</a></div>

                </div>
            </div>

            <div class="container d-flex">

                <div>
                    <div class="single-product-gallery-item" id="slide1">
                        <a data-lightbox="image-1" data-title="Gallery" href="">
                            <img class="img-responsive" alt="" src="{{ url('Image/' . $produk->GAMBAR) }}" width="400px"
                                height="400px" />
                        </a>
                    </div>
                </div>
                <div style="margin-top: 40px; margin-left:10px">
                    <h3> {{ $produk->NAMA_PRODUK }}</h3>
                    <h5>Rp. {{ $produk->HARGA }}</h5>
                    <p>Stok : {{ $produk->JUMLAH }}</p>
                    <p>KATEGORI : {{ $produk->KATEGORI }}</p>
                    <article>{{ $produk->DESKRIPSI }}</article>
                    <p style="margin-top:20px"><b>Tambah stok:</b></p>
                    <form action="{{ route('tambahStok', $produk->id) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="d-flex">
                            <input type="text" name="STOK" class="form-control">
                            <input type="hidden" name="STOK2" class="form-control" value="{{ $produk->JUMLAH }}">
                            <button class="btn btn-primary" type="submit">Add</button>
                        </div>
                    </form>
                </div>

            </div>



        @endsection
