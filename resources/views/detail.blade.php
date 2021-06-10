@Extends('template/master')
@section('content')

    <div class="breadcrumb">

    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>

                <div class='col-xs-12 col-sm-12 col-md-9 rht-col'>
                    <div class="detail-block">
                        <div class="row">
                            <div class="breadcrumb-inner">
                                <ul class="list-inline list-unstyled" style="margin-bottom: 20px">
                                    <li><a href="{{ route('home') }}">Home</a></li>
                                    <li><a href="#">Detail</a></li>
                                    <li class='active'>{{ $produk->NAMA_PRODUK }}</li>
                                </ul>
                            </div><!-- /.breadcrumb-inner -->


                            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 gallery-holder mt-2">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery" href="">
                                                <img class="img-responsive" alt=""
                                                    src="{{ url('Image/' . $produk->GAMBAR) }}" />
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-12 col-md-8 col-lg-8 product-info-block'>
                                <div class=" product-info">
                                    <h1 class="name">{{ $produk->NAMA_PRODUK }}</h1>
                                    <h6>{{ $produk->KATEGORI }}</h6>
                                    <h6>stok :{{ $produk->JUMLAH }}</h6>




                                    <div class="description-container m-t-20">
                                        <p>{{ $produk->DESKRIPSI }}. </p>

                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-10">
                                        <div class="row">


                                            <div class="col-sm-6 col-xs-6">
                                                <div class="price-box">
                                                    <input type="hidden" name="harga" id="harga"
                                                        value="{{ $produk->HARGA }}">
                                                    <span class="price">{{ $produk->HARGA }} </span>
                                                </div>
                                            </div>



                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <form action="{{ route('pesanProduk') }} " method="POST" name="pesan">
                                        @csrf
                                        <div class="quantity-container info-container">
                                            <div class="row">
                                                <input type="hidden" value="{{ $produk->JUMLAH }}" name="stok">
                                                <input type="hidden" name="harga" value="{{ $produk->HARGA }}">
                                                <input type="hidden" name="id" value="{{ $produk->id }}">
                                                <input type="hidden" name="nama_produk"
                                                    value="{{ $produk->NAMA_PRODUK }}">
                                                <input type="hidden" name="tanggal"
                                                    value="<?php echo date('Y-m-d'); ?>">
                                                <div class="qty">
                                                    <span class="label">Jumlah :</span>
                                                </div>

                                                <div class="qty-count">
                                                    <div class="cart-quantity">
                                                        <div class="quant-input">
                                                            <input type="number" min="0" max="{{ $produk->JUMLAH }}"
                                                                name="jumlah" id="jumlah" onkeyup="myFunction()"
                                                                onchange="myFunction()">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div><!-- /.row -->
                                        </div><!-- /.quantity-container -->


                                        <div class="quantity-container info-container ">
                                            <div class="row">

                                                <div class="qty">
                                                    <span class="label">Nama :</span>
                                                </div>

                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input style="width:200px" type="text" name="nama_konsumen"
                                                            placeholder="masukan nama anda" required>
                                                    </div>
                                                </div>

                                                <div class="qty">
                                                    <span class="label">Jumlah Bayar:</span>
                                                </div>

                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <input style="width:200px" name="jumlah_bayar" type="number"
                                                            value=" ">
                                                    </div>
                                                </div>

                                                <div class="add-btn">
                                                    <button class="btn btn-primary mr-1"><i
                                                            class="fa fa-shopping-cart inner-right-vs"></i>Pesan</button>
                                                </div>
                                    </form>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->












                        </div><!-- /.product-info -->
                    </div><!-- /.col-sm-7 -->
                </div><!-- /.row -->
            </div>


        </div><!-- /.col -->
        <div class="clearfix"></div>
    </div><!-- /.row -->
    </div><!-- /.container -->
    </div><!-- /.body-content -->
@endsection
