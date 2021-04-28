@extends('layouts.main')

@section('title', 'History')

@section('container')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card mt-2 mb-1 card-info disable">
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
                                            <th scope="col" class="text-center">Jumlah Transaksi</th>
                                            <th scope="col" class="text-center">Saldo</th>
                                            <th scope="col">Penerima</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($trans as $t)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $t->name }}</td>
                                            <td>{{ $t->tgl_trans }}</td>
                                            @if ($t->type_id == 1)
                                                <td>Masuk</td>
                                            @else
                                                <td>Keluar</td>
                                            @endif
                                            <td class="text-center">{{ $t->jumlah_trans }}</td>
                                            <td class="text-center">{{ $t->saldo }}</td>
                                            <td>{{ $t->penerima }}</td>
                                            <td>{{ $t->keterangan }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{url('/stokview')}}" role="button">Back</a>
                            <a class="btn btn-info" href="{{url('/print')}}" role="button">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection