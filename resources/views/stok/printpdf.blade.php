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
          <!-- Table row -->
          <div class="row">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                <tr>
                  <th width="4%">No.</th>
                  <th>Nama barang</th>
                  <th>Tanggal Keluar</th>
                  <th>Penerima</th>
                  <th class="text-center">Jumlah</th>
                  <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($outstok as $out)
                    <tr>
                      <td class="text-center">{{ $loop->iteration }}</td>
                      <td>{{ $out->name }}</td>
                      <td>{{ $out->tgl_keluar }}</td>
                      <td>{{ $out->penerima }}</td>
                      <td class="text-center">{{ $out->jumlah_keluar }}</td>
                      <td>{{ $out->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-9">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Cetak</a>
            </div>
          </div>
        </div>
        <!-- /.invoice -->
      </div><!-- /.col -->
      <div class="col-1 mt-2">
      </div>
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
