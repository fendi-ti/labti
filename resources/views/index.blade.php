@extends('layouts.main')

@section('title', 'Admin | Dashboard')

@section('container')
<div class="content-wrapper">
  <section class="content">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="row">
      <div class="col-md-4">
        <div class="card text-center mx-auto">
          <div class="card-header bg-info" style="font-size: 20px;">Buka Pintu</div>
          <div class="card-body">
            <div class="form-check form-switch fs-2">
              <input class="form-check-input" style="margin-left:-4rem; margin-top:0.6rem;" type="checkbox" id="flexSwitchCheckDefault" onchange="ubahstatus(this.checked)">
              <label class="form-check-label" style="margin-right:-3rem; margin-left:2rem; margin-top:auto;" for="flexSwitchCheckDefault">
                <span id="status">
                  OPEN
                </span>
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>72</h3>
            <p>List Stok Opname</p>
          </div>
          <div class="icon"><i class="fas fa-list"></i></div>
          <a href="{{url('/stok/stokview')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-4">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>35</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon"><i class="ion ion-person-add"></i></div>
          <a href="{{url('hosting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection