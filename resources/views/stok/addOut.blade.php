@extends('layout/main')

@section('title', 'Stok')

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
                            <h3 class="card-title">Barang Keluar</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="bootstrap-timepicker">
                            <form method="post" action="{{ route('addOut') }}">
                                @csrf
                                <div class="card-body">
                                    <label for="jenis">Jenis Barang</label>
                                    <select name="barang" class="form-control">
                                        @foreach ($nama as $n)
                                        {{$namabarang = $n->name}}
                                        {{$idbarang= $n->id_barang}}
                                        <option value="{{$idbarang}}">{{$namabarang}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-group">
                                        <label for="jum">Jumlah</label>
                                        <input type="text" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" id="jum" value="{{ old('jumlah') }}">
                                        @error('jumlah')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="penerima">Penerima</label>
                                        <input type="text" name="terima" class="form-control @error('terima') is-invalid @enderror" id="penerima" value="{{ old('terima') }}">
                                        @error('terima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" name="terang" class="form-control @error('terang') is-invalid @enderror" id="keterangan" value="{{ old('terang') }}">
                                        @error('terang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                    <a class="btn btn-secondary" href="{{url('/outview')}}" role="button">Kembali</a>
                                </div>
                            </form>
                        </div>
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