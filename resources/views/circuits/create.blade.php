@extends('layout.master')

@section('title', 'Circuits')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Circuits
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/circuits">Circuits</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'circuits.store', 'role' => 'form']) !!}
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information du circuit</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control" name="commune_id">
                <option>:::: Sélectionne une commune :::::</option>
                <?php foreach ($communes as $commune): ?>
                  <option value="{!! $commune->id !!}">{!! $commune->libelle !!}</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Nom du circuit</label>
              <input type="text" name="libelle" class="form-control" id="exampleInputlibelle" placeholder="Nom du circuit">
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Code du circuit</label>
              <input type="text" name="code" class="form-control" id="exampleInputlibelle" placeholder="Code circuit">
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
