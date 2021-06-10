@Extends('template/master')
@section('content')

    <div class="body-content outer-top-vs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div class="breadcrumb-inner">
                            <ul class="list-inline list-unstyled" style="margin-bottom: 20px">
                                <li><a href="{{ route('home') }}">Home</a></li>
                            </ul>
                        </div><!-- /.breadcrumb-inner -->
                        <!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>proses pemesanan hanya dapat dilakukan 1 kali</p>

                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs">
                        <div class="more-info-tab clearfix">

                            <h3 class="new-product-title pull-left">KOREAN FOOD</h3>

                            <!-- /.nav-tabs -->
                        </div>
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                                        @foreach ($allProduk as $ap)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="{{ route('detail', $ap->id) }}">
                                                                    <img src="{{ url('Image/' . $ap->GAMBAR) }}" alt="">
                                                                </a>
                                                            </div>
                                                            <!-- /.image -->

                                                        </div>
                                                        <!-- /.product-image -->

                                                        <div class="product-info text-left">
                                                            <h3 class="name"><a
                                                                    href="{{ route('detail', $ap->id) }}">{{ $ap->NAMA_PRODUK }}</a>
                                                            </h3>

                                                            <div class="description"></div>
                                                            <div class="product-price"> <span
                                                                    class="price">Rp.{{ $ap->HARGA }}</span>
                                                            </div>
                                                            <!-- /.product-price -->

                                                        </div>
                                                        <!-- /.product-info -->

                                                        <!-- /.cart -->
                                                    </div>
                                                    <!-- /.product -->
                                                </div>
                                                <!-- /.products -->
                                            </div>
                                        @endforeach
                                        <!-- item -->
                                    </div>
                                    <!-- /.home-owl-carousel -->
                                </div>
                                <!-- /.product-slider -->
                            </div>
                            <!-- /.tab-pane -->


                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->





                </div>
                <!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#top-banner-and-menu -->
@endsection
