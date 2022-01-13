<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Hosting | Registrasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="{{ asset('assets/dist/img/logo.png') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <div class="container">
      <nav class="navbar navbar-expand navbar-white navbar-light">
        <!-- Brand Logo -->
        <a href="index.php" class="navbar-brand">
          <i class="fas fa-hospital-symbol"></i>
          <span class="brand-text font-weight-light">HOSTING</span>
        </a>
        <!-- Left navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('/home') }}" class="nav-link">Admin</a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="container">
      <!-- Main content -->
      <section class="content">
        @if(session()->has('success'))
        <div class="row">
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
          </div>
        </div>  
          @endif
        <div class="container-fluid">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-lg-7 connectedSortable">
              <!-- Card Petunjuk-->
              <div class="card" style="width: 100%;">
                <div class="card-header bg-success">
                  <h3 class="card-title text-center">
                    Petunjuk Pendaftaran
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <ul class="text-left">
                    <li>NIM isikan dengan NIM masing-masing,</li>
                    <li>Nama isikan nama lengkap,</li>
                    <li>Email isikan dengan email yang valid,</li>
                    <li>Password isikan dengan password yang diinginkan,</li>
                    <li>Password-Confirm isikan dengan mengulangi password,</li>
                    <li>Kebutuhan isikan dengan memilih tujuan penggunaan hosting(Tugas akhir/Penelitian/Praktikum),</li>
                    <li>Upload formulir pendaftaran yang sudah di download, diisi dan ditandatangi dalam format pdf/jpg,</li>
                    <li>Penamaan file NIM-Nama.pdf/jpg, dengan maksimal ukuran file 1 Mb,</li>
                    <li>Informasi tentang akun akan dikirimkan ke alamat Email maksimal 2 hari kerja.</li>
                  </ul>
                </div><!-- /.card-body -->
                <div class="card-footer">
                  <a href="https://drive.google.com/file/d/10YRDP48WMMaNJhYtoA0TBpGTz-pdN5eF/view?usp=sharing" class="badge badge-success">Formulir</a>
                  <a href="https://drive.google.com/file/d/18DOjZdAIHqlBQBwZf8ADGbSSTEi-KOox/view?usp=sharing" class="badge badge-success">Panduan</a>
                </div>
              </div><!-- /.card Petunjuk-->
            </div>
            <div class="col-lg-5 connectedSortable">
              <!-- Card Form-->
              <div class="card">
                <div class="card-header bg-success">
                  <h3 class="card-title text-center">
                    Form Pendaftaran
                  </h3>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <form class="col-md" action="{{ route('daftar') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="inputnim" class="sr-only">NIM</label>
                      <input type="text" name="nim" id="inputnim" class="form-control @error('nim') is-invalid @enderror" placeholder="NIM" required autofocus value="{{ old('nim') }}">
                      @error('nim')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="inputnama" class="sr-only">Nama</label>
                      <input type="text" name="nama" id="inputnama" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" required autofocus value="{{ old('nama') }}">
                      @error('nama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="inputemail" class="sr-only">Email</label>
                      <input type="text" name="email" id="inputemail" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autofocus value="{{ old('email') }}">
                      @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md">
                        <label for="inputpass" class="sr-only">Password</label>
                        <input type="password" name="password" id="inputpass" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autofocus value="{{ old('password') }}">
                        @error('password')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group col-md">
                        <label for="inputpasscon" class="sr-only">Password-Confirm</label>
                        <input type="password" name="password_confirmation" id="inputpasscon" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Password-Confirm" required autofocus value="{{ old('password_confirmation') }}">
                        @error('password_confirmation')
                        <div class="invalid-feedback">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlSelect1">Kebutuhan</label>
                      <select class="form-control" name="paket" id="exampleFormControlSelect1">
                        <option>Proyek Akhir</option>
                        <option>Penelitian</option>
                        <option>Praktikum</option>
                        <option>Kerja Praktek</option>
                      </select>
                    </div>
                    <div class="custom-file mb-3">
                      <input type="file" name="formulir" class="custom-file-input @error('formulir') is-invalid @enderror" id="chooseFile">
                      <label class="custom-file-label" for="chooseFile">Upload Formulir Pendaftaran</label>
                      @error('formulir')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <!--<div class="form-group">
                      <div> {!! htmlFormSnippet() !!} </div>
                    </div>-->
                    <button class="btn btn-lg btn-success" type="submit">DAFTAR</button>

                  </form>
                </div><!-- /.card-body -->
              </div><!-- /.card Form-->
            </div>
          </div>
          <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="page-footer font-small blue pt-4">
      <div class="footer-copyright text-center py-3">
        &copy; 2020 Teknik Informatika Poliwangi
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->

  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>