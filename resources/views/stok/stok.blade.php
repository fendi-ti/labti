@extends('layouts.main')

@section('title', 'Admin | Stok')

@section('container')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <!-- Main content -->
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card mt-2 mb-1 card-info disable">
                        <div class="card-header border-transparent">
                            <h3 class="card-title text-center">List Stock Opname</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="4%">No.</th>
                                            <th scope="col">Jenis Barang</th>
                                            <th scope="col" width="30%">Spesifikasi Teknis</th>
                                            <th scope="col">Volume</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Tanggal Perolehan</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($stok as $s)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $s->name }}</td>
                                            <td>{{ $s->spesifikasi }}</td>
                                            <td class="text-center">{{ $s->stok }}</td>
                                            <td>{{ $s->satuan }}</td>
                                            <td>{{ $s->tanggal_masuk }}</td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <i class="fas fa-images" data-toggle="tooltip" title="Gambar"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('/history',[$s->id]) }}">
                                                    <span style="color: #28a745"><i class="fas fa-history" data-toggle="tooltip" title="History"></i></span>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <span style="color: #dc3545"><i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete"></i></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="pagination-block">
                {{ $stok->links() }}
            </div>
        </div>
    </section>
</div>
@endsection