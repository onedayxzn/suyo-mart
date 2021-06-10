@extends('layouts.master')
@section('title', 'Produk')
@section('content')



    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ Auth::user()->name }}</h2>


                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="../assets/img/avatar/avatar-1.png"
                                    class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">0</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Followers</div>
                                        <div class="profile-widget-item-value">6,9K</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Following</div>
                                        <div class="profile-widget-item-value">1</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ Auth::user()->name }} <div
                                        class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> Web Developer
                                    </div>
                                </div>
                                {{ Auth::user()->name }} adalah Mahasiswa dari <b>'sekolah tinggi teknologi bandung'</b>.
                                <br>
                                <dd>
                                    <li>Nama {{ Auth::user()->name }}</li>
                                    <li>Email : {{ Auth::user()->email }}</li>
                                    <li>Alamat : {{ Auth::user()->alamat }}</li>
                                    <li>No Telepon : {{ Auth::user()->no_telepon }}</li>
                                </dd>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>






    @push('page-scripts')

    @endpush

    @push('after-script')



    @endpush
@endsection
