@extends('layouts.master')
@section('title', 'Produk')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('produk') }}">Daftar Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-12 col-md-12 col-lg-12">
                    <a href="{{ route('tambahProduk') }}" class="btn btn-icon icon-left btn-primary"><i
                            class="far fa-edit"></i>Tambah Produk</a>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible show fade">
                            <div class="alert-body">
                                <button class="close" data-dismiss="alert">
                                    <span>x</span>
                                </button>
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-md-center">
                            @foreach ($allProduk as $ap)
                                <div class="col-12 col-md-3 col-sm-3 col-lg-3 mr-5">
                                    <div class="card" style="width: 18rem;">
                                        <img src="{{ url('Image/' . $ap->GAMBAR) }}" class="card-img-top"
                                            style="width: 18rem; height: 14rem">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">{{ $ap->NAMA_PRODUK }}</h5>
                                            {{-- <p class="card-text">ID_PRODUK : {{ $ap->id }}</p> --}}
                                            <p class="card-text">KATEGORI : {{ $ap->KATEGORI }}</p>
                                            <p class="card-text">JUMLAH : {{ $ap->JUMLAH }}</p>
                                            <p class="card-text">HARGA Satuan: Rp. {{ $ap->HARGA }}</p>
                                            <a href="{{ route('editProduk', $ap->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('detailProduk', $ap->id) }}"
                                                class="btn btn-primary">detail</a>
                                            <a href="javascript:void(0)" onclick="$(this).find('form').submit()"
                                                class="btn btn-danger">
                                                <span class="fa fa-trash">Hapus</span>
                                                <form action="{{ route('hapusProduk', $ap->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- {{ $allProduk->links() }} --}}

                </div>

            </div>




            @push('page-scripts')

            @endpush

            @push('after-script')



            @endpush
        @endsection
