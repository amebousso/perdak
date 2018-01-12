@extends('layout.master')

@section('title', 'Banques')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestion des Banques
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/banques">Banques</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'banques.store', 'role' => 'form']) !!}
      <!-- left column -->

      <!-- right column -->
      <div class="col-md-6">

        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information de la Banque</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputlibelle">Libelle</label>
              <input type="text" name="libelle" class="form-control" id="exampleInputlibelle" placeholder="Nom de la Banque">
            </div>
            <div class="form-group">
              <label for="exampleInputCode">Code Banque</label>
              <input type="text" name="code" class="form-control" id="exampleInputCode" placeholder="Code de la Banque">
            </div>
            <div class="form-group">
              <label for="exampleInputIban">IBAN</label>
              <input type="text" name="iban" class="form-control" id="exampleInputIban" placeholder="IBAN de la Banque">
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
