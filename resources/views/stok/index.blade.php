@extends('layout/main')

@section('title', 'Stok')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Dashboard Stok Opname</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>+</h3>
                            <p>Tambah Barang</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <a href="{{url('formadd')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>+</h3>
                            <p>Tambah Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus-square"></i>
                        </div>
                        <a href="{{url('/historytrans')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                {{--<div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>30</h3>
                            <p>Barang Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <a href="{{url('inview')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>10</h3>
                            <p>Barang Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-sign-out-alt"></i>
                        </div>
                        <a href="{{url('outview')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>--}}
                <!-- ./col -->
                <div class="col-lg-4">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$stock}}</h3>
                            <p>List Stok Opname</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list"></i>
                        </div>
                        <a href="{{url('stokview')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                    
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection