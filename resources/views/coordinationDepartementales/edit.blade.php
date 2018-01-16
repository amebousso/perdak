@extends('layout.master')

@section('title', 'Coordination départementale')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Coordination Départementale
      <small>Modifier</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/coordinationDepartementales">Coordination Départementale</a></li>
      <li class="active">Modifier</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::model($coordinationDepartement, ['route' => ['coordinationDepartementales.update', $coordinationDepartement->id], 'method' => 'put', 'role' => 'form']) !!}
      @if(session()->has('success'))
      <div class="alert alert-success col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information de la coordination de Pôle</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Coordination de Pôle</label>
              {{ Form::select('pole_id', $poles, $coordinationDepartement->pole_id, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Libellé de la coordination</label>
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
