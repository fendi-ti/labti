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
