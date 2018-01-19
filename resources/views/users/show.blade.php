@extends('layout.master')

@section('title', 'Utilisateurs UCG')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Utilisateurs
      <small>Profil</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="#">Utilisateurs</a></li>
      <li class="active">Profil</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- right column -->

        <div class="col-md-8">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <h3 class="profile-username text-center">{{ $user->name }}</h3>

              <p class="text-muted text-center">{{ $user->email }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Rôle</b> <a class="pull-right">{{ $user->role->libelle }}</a>
                </li>
                @if(session('statut') == 'coordo')
                  <li class="list-group-item">
                    <b>Coordination</b> <a class="pull-right">{{ $user->departement->libelle }}</a>
                  </li>
                @endif
                @if(session('statut') == 'coordoPole')
                  <li class="list-group-item">
                    <b>Coordination</b> <a class="pull-right">{{ $user->departement->pole->libelle }}</a>
                  </li>
                @endif
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
