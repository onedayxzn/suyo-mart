@extends('layouts/master')
@section('title', 'Produk')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dash</a></div>
                    <div class="breadcrumb-item"><a href="#">Dash</a></div>
                    <div class="breadcrumb-item"><a href="#">Dash</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form action="{{ route('simpanProduk') }}" method="POST" enctype="multipart/form-data">
                                <div class="card-body">

                                    @csrf


                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="NAMA_PRODUK"
                                            class="form-control border border-secondary rounded" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Pilih kategori</label>
                                        <select class="form-control border border-secondary rounded" name="KATEGORI"
                                            required>
                                            <option selected disabled value="">Pilih</option>
                                            <option value="INDONESIA FOOD">Indonesia Food</option>
                                            <option value="JAPANESE FOOD">Japanese Food</option>
                                            <option value="KOREAN FOOD">Korean Food</option>
                                            <option value="INDIAN FOOD">Indian Food</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="text" name="JUMLAH"
                                            class="form-control border border-secondary rounded" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Satuan</label>
                                        <input type="text" name="HARGA" class="form-control border border-secondary rounded"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea style="width:40rem; height:30rem" type="text" name="DESKRIPSI"
                                            class="form-control border border-secondary" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Upload gambar</label>
                                        <input type="file" name="GAMBAR" class="form-control-file" required>
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
