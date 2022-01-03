<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Invoice Print</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <div class="row">
      <div class="col-12 mt-2">
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
          <div class="row">
            <div class="col-2 mt-2">
              <h6>Kode UAKPB<br></h6>
              <h6>Nama Unit UAPKPB<br></h6>
            </div>
            <div class="col-5 mt-2">
              <h6>: 023.18.0500.677592.001.KD<br></h6>
              <h6>: Teknik Informatika<br></h6>
            </div>
            <div class="col-2 mt-2">
              <h6>Nama Barang<br></h6>
              <h6>Satuan<br></h6>
            </div>
            <div class="col-3 mt-2">
              @foreach ($unit as $item)
                  <h6>:{{$item->name}}<br></h6>
                  <h6>:{{$item->satuan}}<br></h6>
                  @endforeach
            </div>
          </div>
          <!-- Table row -->
          <div class="row">
           
              <table class="table table-bordered mt-1 text-center">
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
                  @foreach($trans as $t)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $t->tgl_trans }}</td>
                      <td>{{ $t->name }}</td>
                      @if ($t->type_id==1)
                        <td class="text-center">{{ $t->jumlah_trans }}</td>
                        <td></td>
                        <td></td>
                      @else
                        <td></td>
                        <td></td>
                        <td class="text-center">{{ $t->jumlah_trans }}</td>
                      @endif
                      <td>{{ $t->saldo }}</td>
                      <td></td>
                      <td></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
