@extends('layouts.main')

@section('title', 'Print')

@section('container')
<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-1 mt-2">
          </div>
          <div class="col-10 mt-2">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-1">
                  <img src="{{ asset('assets/dist/img/logo-poliwangi.png') }}" width="60px">
                </div>
                <div class="col-9 mt-1">
                  <h5>
                    KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
                    POLITEKNIK NEGERI BANYUWANGI<br>
                 </h5>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-12 mt-3">
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-3 mb-3 text-center">
                  <p class="baris text-decoration-underline"><strong>BUKTI PENGELUARAN BARANG</strong></p>
                  <p class="fs-5">Nomor: ……… /BHP/PL36/2021</p>
                </div>
              </div>
              <!-- Table row -->
              <div class="row">
                  <table class="table table-bordered border-primary text-center">
                    <thead>
                    <tr>
                      <th>No.</th>
                      <th>NAMA BARANG</th>
                      <th>JUMLAH</th>
                      <th>SATUAN</th>
                      <th>KETERANGAN</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($transout as $t)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $t->name }}</td>
                            <td class="text-center">{{ $t->jumlah_trans }}</td>
                            <td>{{ $t->satuan }}</td>
                            <td>{{ $t->keterangan }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                <!-- /.col -->
              </div>
              <!-- this row will not appear when printing -->
              <div class="row">
                <div class="col-9">
                  <a href="{{url('/printpdf')}}" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Cetak</a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
          <div class="col-1 mt-2">
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection