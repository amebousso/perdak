@extends('layout.master')

@section('title', 'Communes')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Communes
      <small>Modifier</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/communes">Communes</a></li>
      <li class="active">Modifier</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::model($commune, ['route' => ['communes.update', $commune->id], 'method' => 'put', 'role' => 'form']) !!}
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information de la commune</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Coordination départementale</label>
              {{ Form::select('departement_id', $coordinationDepartements, $commune->departement_id, array('class' => 'form-control')) }}

            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Nom de la commune</label>
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
