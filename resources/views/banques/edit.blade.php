@extends('layout.master')

@section('title', 'Banques')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestion des Banques
      <small>Modifier</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/banques">Banques</a></li>
      <li class="active">Modifier</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::model($banque, ['route' => ['banques.update', $banque->id], 'method' => 'put', 'role' => 'form']) !!}
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
            <h3 class="box-title">Information de la Banque</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            @if(session()->has('success'))
            <div class="callout callout-success">
              <h4>Succès</h4>
              {!! $success !!}
            </div>
            @endif
            <div class="form-group">
              <label for="exampleInputlibelle">Libelle</label>
              {!! Form::text('libelle', null, array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <label for="exampleInputCode">Code Banque</label>
              {!! Form::text('code', null, array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
              <label for="exampleInputIban">IBAN</label>
              {!! Form::text('iban', null, array('class' => 'form-control')) !!}
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
