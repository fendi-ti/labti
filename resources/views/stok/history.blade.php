@extends('layouts.main')

@section('title', 'History')

@section('container')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="row mt-2">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card mt-2 mb-1 card-info disable">
                        <div class="card-header border-transparent">
                            <h3 class="card-title text-center">History Barang Keluar : @foreach($namabarang as $nam) {{ $nam->name }}@endforeach</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="4%">No.</th>
                                            <th scope="col">Tanggal Keluar</th>
                                            <th scope="col" class="text-center">Penerima</th>
                                            <th scope="col" class="text-center">Jumlah</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($history as $h)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $h->tgl_keluar }}</td>
                                            <td class="text-center">{{ $h->penerima }}</td>
                                            <td class="text-center">{{ $h->jumlah_keluar }}</td>
                                            <td>{{ $h->keterangan }}</td>
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
                            @foreach ($namabarang as $item)
                            <a class="btn btn-primary" href="{{ url('/print',$item->id_barang) }}" role="button">Cetak</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
</div>
@endsection