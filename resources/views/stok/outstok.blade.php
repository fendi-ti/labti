@extends('layouts.main')

@section('title', 'Stok')

@section('container')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Main row -->
            <div class="row mt-2">
                <div class="col-md-1 mt-2">
                </div>
                <div class="col-md-10 mt-2">
                    <a class="btn btn-success" href="{{url('/formtransaksi')}}" role="button"> + Tambah Transaksi</a>
                    <a class="btn btn-primary" href="{{ url('/print') }}" role="button">Cetak</a>
                    <!-- TABLE: LATEST ORDERS -->
                    <div class="card mt-0 mb-1 mt-2 card-info disable">
                        <div class="card-header border-transparent">
                            <h3 class="card-title text-center">History Transaksi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="4%">No.</th>
                                            <th scope="col">Nama Barang</th>
                                            <th scope="col">Tanggal Transaksi</th>
                                            <th scope="col">Jenis Transaksi</th>
                                            <th scope="col" class="text-center">Jumlah</th>
                                            <th scope="col">Penerima</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($outstok as $o)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $o->name }}</td>
                                            <td>{{ $o->tgl_trans }}</td>
                                            <td>{{ $o->nama_trans }}</td>
                                            <td class="text-center">{{ $o->jumlah_trans }}</td>
                                            <td>{{ $o->penerima }}</td>
                                            <td>{{ $o->keterangan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-1 mt-2">
                </div>
            </div><!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection