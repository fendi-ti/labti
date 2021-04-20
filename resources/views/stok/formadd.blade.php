@extends('layouts.main')

@section('title', 'Admin | Stok')

@section('container')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main Row -->
            <div class="row">
                <div class="col-md-3">

                </div>
                <!-- ./col -->
                <div class="col-md-6">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                        </div>
                     @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Input Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                            <form method="post" action="{{ route('addbarang') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="jenis">Nama Barang</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="jenis" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="spesifik">Spesifikasi Barang</label>
                                        <input type="text" name="spesifikasi" class="form-control @error('spesifikasi') is-invalid @enderror" id="spesifik" value="{{ old('spesifikasi') }}">
                                        @error('spesifikasi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="sat">Satuan</label>
                                        <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" id="sat" value="{{ old('satuan') }}">
                                        @error('satuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <label for="tgl">Tanggal Masuk</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="tgl" name="tanggal_masuk" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask placeholder="dd/mm/yyyy">
                                      </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- ./col -->
                <div class="col-md-3">
                    <!-- Main Row -->

                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection