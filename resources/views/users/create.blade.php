@extends('layout.master')

@section('title', 'Utilisateurs')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestion des Utilisateurs
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/users">Utilisateurs</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'users.store', 'role' => 'form']) !!}
      <!-- left column -->
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
            <h3 class="box-title">Information de l'utilisateur</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
                <label class="col-md-6 control-label">Role</label>

                <select class="form-control" name="role_id" id="role">
                  <option>:::: Sélectionne un role :::::</option>
                  <?php foreach ($roles as $role): ?>
                    <option value="{!! $role->id !!}">{!! $role->libelle !!}</option>
                  <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group" id="form-pole">
                <label class="col-md-6 control-label">Pole</label>

                <select class="form-control" name="zone_id" id="pole">
                  <option>:::: Sélectionne un pole :::::</option>
                  <?php foreach ($poles as $pole): ?>
                    <option value="{!! $pole->id !!}">{!! $pole->libelle !!}</option>
                  <?php endforeach; ?>
                </select>
            </div>
            <!--div class="form-group" id='form-departement'>
                <label class="col-md-6 control-label">Coordination Departementale</label>

                <select class="form-control" name="zone_id" id="departement">

                </select>
            </div-->
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-6 control-label">Name</label>

                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-6 control-label">Adresse Mail</label>

                <input id="name" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-6 control-label">Mot de Passe</label>

                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                <label for="password-confirm" class="col-md-6 control-label">Confirmation Mot de Passe</label>

                <input id="password-confirm" type="password" class="form-control" name="password-confirmation" value="{{ old('password-confirmation') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
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

@section('script')
	<script type="text/javascript">
      $(function() {
        $('#form-pole').hide();
        $('#form-departement').hide();
        //Changement de role
    		$('#role').on('change', function(e) {
    			var role = $('#role option:selected').text();
          console.log(role)
    			if(role == 'Coordonnateur de Pole' || role == 'Coordonnateur de Departement') {
            $('#form-pole').show();
            $('#form-departement').show();
          }else{
            $('#form-pole').hide();
            $('#form-departement').hide();
          }
    		});

        //Changement de pole
        $('#pole').on('change', function(e) {
    			var pole_id = e.target.value;
    			//departement_id = false;
    			departementUpdate(pole_id);
    		});

        // Requête Ajax pour les departements
       function departementUpdate(poleId) {
           $.get('{{ url('departementPole') }}/'+ poleId, function(data) {
               $('#departement').empty();
               $.each(data, function(index, departements) {
                   $('#departement').append($('<option>', {
                       value: departements.id,
                       text : departements.libelle
                   }));
               });
           });
       }

      })
  </script>
@endsection
