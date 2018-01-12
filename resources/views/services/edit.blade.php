@extends('layout.master')

@section('title', 'Services')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Services
      <small>Modifier</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/services">Services</a></li>
      <li class="active">Modifier</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'put', 'role' => 'form']) !!}
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information du Service</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputlibelle">Libellé du service</label>
              {{ Form::text('libelle', null, array('class' => 'form-control')) }}
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Valider les données</button>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
      {!! Form::close() !!}
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
