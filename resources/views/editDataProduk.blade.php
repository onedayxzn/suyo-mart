@extends('layouts/master')
@section('title', 'Produk')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">produk</a></div>
                    <div class="breadcrumb-item"><a href="#">edit</a></div>
                    <div class="breadcrumb-item"><a href="#">{{ $produk->NAMA_PRODUK }}</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('editProdukProses', $produk->id) }}" method="POST">
                                <div class="card-body">
                                    @csrf
                                    @method('patch')
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="NAMA_PRODUK" class="form-control"
                                            value="{{ $produk->NAMA_PRODUK }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih kategori</label>
                                        <select class="form-control" name="KATEGORI">
                                            <option value="{{ $produk->KATEGORI }}">
                                                {{ $produk->KATEGORI }}
                                            </option>
                                            <option value="INDONESIA FOOD">INDONESIA FOOD</option>
                                            <option value="JAPANESE FOOD">JAPANESE FOOD</option>
                                            <option value="KOREAN FOOD">KOREAN FOOD</option>
                                            <option value="INDIAN FOOD">INDIA FOOD</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" name="JUMLAH" class="form-control"
                                            value="{{ $produk->JUMLAH }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <input type="text" name="HARGA" class="form-control" value="{{ $produk->HARGA }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Ubah gambar</label>
                                        <input type="file" name="GAMBAR" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea style="width:40rem; height:30rem" type="text" name="DESKRIPSI"
                                            class="form-control border border-secondary"> {{ $produk->DESKRIPSI }}</textarea>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <button class="btn btn-secondary" type="reset">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>



                @push('page-scripts')

                @endpush

            @endsection
