@extends('layouts.main')

@section('title', 'Admin | hosting')

@section('container')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row mt-2">
          <div class="col-md-12">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card mt-0 mb-1">
              <div class="card-header border-transparent">
                <h3 class="card-title text-center">List Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-sm m-0">
                    <thead>
                      <tr>
                        <th scope="col" width="4%">No.</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Daftar</th>
                        <th scope="col">Kebutuhan</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1;?>
                      <?php foreach ($pendaftar as $p) : ?>
                        <tr>
                          <td class="text-center"><?= $nomor++ ?></td>
                          <td><?= $p["nim"]; ?></td>
                          <td><?= $p["nama"]; ?></td>
                          <td><?= $p["email"]; ?></td>
                          <td><?= $p["tanggal"]; ?></td>
                          <td><?= $p["paket"]; ?></td>
                          <td class="text-center">
                            <a href="/storage/{{ $p["formulir"]}}">
                              <i class="fas fa-file-invoice" data-toggle="tooltip" title="File"></i>
                            </a>
                          </td>
                          <td class="text-center">
                            <a href="{{ url('/hosting',[$p->id]) }}" onclick="return confirm('Tambahkan Data <?= $p['nama']; ?>?')"><span style="color: #28a745"><i class="fas fa-user-check" data-toggle="tooltip" title="Accept"></i></span></a>
                          </td>
                          <td class="text-center">
                            <a href="{{ url('/hosting/delpendaftar', [$p->id]) }}" onclick="return confirm('Hapus Data <?= $p['nama']; ?>?')"><span style="color: #dc3545"><i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete"></i></span></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>

                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection