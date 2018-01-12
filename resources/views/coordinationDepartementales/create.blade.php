@extends('layout.master')

@section('title', 'Coordination départementale')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Coordination Départementale
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/coordinationDepartementales">Coordination Départementale</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'coordinationDepartementales.store', 'role' => 'form']) !!}
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
              <select class="form-control" name="pole_id">
                <option>:::: Sélectionne un pôle :::::</option>
                <?php foreach ($poles as $pole): ?>
                  <option value="{!! $pole->id !!}">{!! $pole->libelle !!}</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Libellé de la coordination</label>
              <input type="text" name="libelle" class="form-control" id="exampleInputlibelle" placeholder="Titre du corps">
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
