@extends('layouts.master')
@section('title', 'Produk')
@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Pesanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Daftar Pesanan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="col-12 col-md-12 col-lg-12">
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Konsumen</th>
                                <th scope="col" hidden>Id produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Beli</th>
                                <th scope="col">Jumlah Bayar</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($pesanan as $no => $ps)
                                <tr>
                                    <th scope="row">{{ $pesanan->firstItem() + $no }}</th>
                                    <td>{{ $ps->NAMA_KONSUMEN }}</td>
                                    <td hidden>{{ $ps->ID_PRODUK }}</td>
                                    <td>{{ $ps->NAMA_PRODUK }}</td>
                                    <td>{{ $ps->HARGA }}</td>
                                    <td>{{ $ps->JUMLAH_BELI }}</td>
                                    <td>{{ $ps->JUMLAH_BAYAR }}</td>
                                    <td>{{ $ps->TANGGAL_PESAN }}</td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="$(this).find('form').submit()"
                                            class="btn btn-danger">
                                            <span class="fa fa-trash"> Hapus</span>
                                            <form action="{{ route('hapusPesanan', $ps->ID_PESANAN) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pesanan->links() }}

            </div>




            @push('page-scripts')

            @endpush

            @push('after-script')



            @endpush
        @endsection
