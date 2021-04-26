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
              <div class="row border-bottom border-dark">
                <div class="col-2">
                  <img src="{{ asset('assets/dist/img/logo-poliwangi.png') }}" class="img-fluid">
                  
                </div>
                <div class="col-9 text-center">
                  <h4>
                    KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN<br>
                    POLITEKNIK NEGERI BANYUWANGI<br>
                 </h4>
                 <h6>Jl. Raya Jember kilometer 13 Labanasem, Kabat, Banyuwangi, 68461<br></h6>
                 <h6>Telepon / Faks : (0333) 636780<br></h6>
                 <h6>E-mail : poliwangi@poliwangi.ac.id ; Website : http//www.poliwangi.ac.id</h6>
                </div>
                <!-- /.col -->
              </div>
              <div class="row">
                <div class="col-2 mt-2">
                  <h6>UAPB<br></h6>
                  <h6>UAPB-E1<br></h6>
                  <h6>UAPPB-W<br></h6>
                </div>
                <div class="col-5 mt-2">
                  <h6>: KEMDIKBUD<br></h6>
                  <h6>: DIREKTORAL JENDERAL PENDIDIKAN VOKASI<br></h6>
                  <h6>: Jawa Timur<br></h6>
                </div>
                <div class="col-2 mt-2">
                  <h6>No. Kartu<br></h6>
                  <h6>Halaman<br></h6>
                </div>
                <div class="col-3 mt-2">
                  <h6>:<br></h6>
                  <h6>:<br></h6>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-1 text-center">
                  <p><strong>BUKU BARANG PERSEDIAAN</strong></p>
                </div>
              </div>
              <!-- Table row -->
              <div class="row">
                <div class="table-responsive table-bordered mt-1">
                  <table class="table text-center">
                    <thead>
                    <tr>
                      <th rowspan="2" class="align-middle">No.</th>
                      <th rowspan="2" class="align-middle">Tanggal</th>
                      <th rowspan="2" class="align-middle">Uraian</th>
                      <th rowspan="2" class="align-middle">Masuk</th>
                      <th rowspan="2" class="align-middle">Harga Beli</th>
                      <th rowspan="2" class="align-middle">Keluar</th>
                      <th colspan="2">Saldo</th>
                      <th rowspan="2" class="align-middle">Paraf</th>
                    </tr>
                    <tr>
                      <th scope="col">Jumlah</th>
                      <th scope="col">Nilai</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($transaksi as $t)
                        <tr>
                          <td class="text-center">{{ $loop->iteration }}</td>
                          <td>{{ $t->tgl_trans }}</td>
                          <td>{{ $t->name }}</td>
                          @if ($t->id_jenis==1)
                            <td class="text-center">{{ $t->jumlah_trans }}</td>
                            <td></td>
                            <td></td>
                          @else
                            <td></td>
                            <td></td>
                            <td class="text-center">{{ $t->jumlah_trans }}</td>
                          @endif
                          <td>{{ $t->stok }}</td>
                          <td></td>
                          <td></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
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