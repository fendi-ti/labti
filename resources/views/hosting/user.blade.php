@extends('layouts.main')

@section('title', 'Admin | hosting')

@section('container')
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row mt-2">
          <div class="col-md-12">
            <nav class="mt-2">
              <ul class="pagination pagination-sm justify-content-end">
                <?php if ($halAktif > 1) { ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halAktif - 1; ?>">Prev</a>
                  </li>
                <?php } else { ?>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Prev</a>
                  </li>
                <?php } ?>

                <?php for ($j = 1; $j <= $jumlahHal; $j++) : ?>
                  <?php if ($j == $halAktif) : ?>
                    <li class="page-item active"><a class="page-link" href="?halaman=<?= $j; ?>"><?= $j; ?></a></li>
                  <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?halaman=<?= $j; ?>"><?= $j; ?></a></li>
                  <?php endif; ?>
                <?php endfor; ?>

                <?php if ($halAktif < $jumlahHal) { ?>
                  <li class="page-item">
                    <a class="page-link" href="?halaman=<?= $halAktif + 1; ?>">Next</a>
                  </li>
                <?php } else { ?>
                  <li class="page-item disabled">
                    <a class="page-link" href="#">Next</a>
                  </li>
                <?php } ?>
              </ul>
            </nav>
            <!-- TABLE: User Registration -->
            <div class="card mb-1">
              <div class="card-header border-transparent">
                <h3 class="card-title text-center">User Hosting</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-sm m-0">

                    <thead style="background-color: #29a1be">
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal dibuat</th>
                        <th scope="col">Package</th>
                        <th scope="col">Status</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php for ($i = $awalData; $i < $kondisi; $i++) { ?>
                        <?php if ($i < count($result["msj"])) { ?>
                     <tr>
                      <td>{{ $nomor++ }}</td>
                      <td><a href="http://ta.poliwangi.ac.id/~<?= $result["msj"]["$i"]["username"]; ?>" class="badge badge-info" target="blank">{{$result["msj"]["$i"]["username"]}}</td>
                      <td>{{$result["msj"]["$i"]["email"]}}</td>
                      <td>{{$result["msj"]["$i"]["setup_date"]}}</td>
                      <td>{{$result["msj"]["$i"]["package_name"]}}</td>
                      <td>{{$result["msj"]["$i"]["status"]}}</td>
                      <td>
                        <?php
                        if ($result["msj"]["$i"]["status"] == "active") { ?>
                          <a href="{{url('/suspend', $result["msj"]["$i"]["username"])}}" onclick="return confirm('Yakin untuk suspend?')">
                            <span style="color: #28a745">
                              <i class="fas fa-toggle-off fa-swap-opacity" data-toggle="tooltip" title="Suspend"></i>
                            </span>
                          </a>
                        <?php
                        } else { ?>
                          <a href="{{url('/unsuspend', $result["msj"]["$i"]["username"])}}" onclick="return confirm('Yakin untuk unsuspend?')">
                            <span style="color: #dc3545">
                              <i class="fas fa-toggle-on" data-toggle="tooltip" title="Unsuspend"></i>
                            </span>
                          </a>
                        <?php } ?>
                      </td>
                      <td>
                        <a href="{{url('/hosting/deluser',$i)}}" onclick="return confirm('Yakin untuk menghapus?')">
                          <span style="color: #dc3545">
                            <i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete"></i>
                          </span>
                        </a>
                      </td>
                      <td>
                        <a class="btn btn-primary btn-xs active" data-toggle="modal" data-target="#modalSaya" id="tombolDetail" data-username="{{$result["msj"]["$i"]["username"]}}" data-email="{{$result["msj"]["$i"]["email"]}}">
                          Detail
                        </a>
                      </td>
                    </tr>
                    <?php } ?>
                        <?php } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <div class="modal fade" id="modalSaya">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Account Detail</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="card-text text-left">Account Details ========================================</p>
            <p class="card-text text-left">IP Address: 103.109.210.29</p>
            <p class="card-text text-left">Web Panel Login:</p>
            <p class="card-text text-left">Username: <span id="userlist"></span></p>
            <p class="card-text text-left">Admin Email: <span id="emaillist"></span></p>
            <p class="card-text text-left">Website : ta.poliwangi.ac.id/~<span id="weblist"></span></p>
            <p class="card-text text-left">Panel URL:</p>
            <p class="card-text text-left">https://ta.poliwangi.ac.id:2083</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection