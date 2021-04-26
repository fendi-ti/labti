@extends('layout/main')

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
                            <h3 class="card-title text-center">History Barang Keluar</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-sm m-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" width="4%">No.</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col" class="text-center">Penerima</th>
                                            <th scope="col" class="text-center">Jumlah</th>
                                            <th scope="col">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $in = $data['in']; $out = $data['out']; $dari =$data['dari'];  ?>
                                        @while (strtotime($dari) <= strtotime($data['sampai']))
                                            
                                        
                                        @foreach( $in as $h)
                                        @if ($h->tgl_masuk==$dari)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $h->tgl_masuk }}</td>
                                            <td class="text-center">{{ $h->penerima }}</td>
                                            <td class="text-center">{{ $h->jumlah_masuk }}</td>
                                            <td>{{ $h->keterangan }}</td>
                                        </tr>  
                                        @endif                                         
                                        @endforeach

                                        @foreach( $out as $o)
                                        @if ($o->tgl_keluar==$dari)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $o->tgl_keluar }}</td>
                                            <td class="text-center">{{ $o->penerima }}</td>
                                            <td class="text-center">{{ $o->jumlah_keluar }}</td>
                                            <td>{{ $o->keterangan }}</td>
                                        </tr>
                                       
                                        @endif
                                        

                                        @endforeach
                                        <?php $dari = date ("Y-m-d", strtotime("+1 day", strtotime($dari)));?>

                                        @endwhile
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a class="btn btn-primary" href="{{url('/stokview')}}" role="button">Back</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </section>
</div>
@endsection