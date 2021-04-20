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
      <div class="col-md-1">
      </div>
      <div class="col-md-5">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>72</h3>
            <p>List Stok Opname</p>
          </div>
          <div class="icon"><i class="fas fa-list"></i></div>
          <a href="{{url('stokview')}}" class="small-box-footer">Lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-5">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>35</h3>
            <p>User Registrations</p>
          </div>
          <div class="icon"><i class="ion ion-person-add"></i></div>
          <a href="{{url('hosting')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-md-1">
      </div>
    </div>
  </section>
</div>
@endsection