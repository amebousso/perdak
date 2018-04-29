@extends('layout.master')

@section('title', 'Personnel UCG')

@section('content')
<style type="text/css">
  .example {
    float: left;
    margin: 15px;
  }

  .demo {
    width: 300px;
    height: 500px;
    border-top: solid 1px #BBB;
    border-left: solid 1px #BBB;
    border-bottom: solid 1px #FFF;
    border-right: solid 1px #FFF;
    background: #FFF;
    overflow: scroll;
    padding: 5px;
  }

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/employes">Personnel</a></li>
      <li class="active">Détail du Personnel</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row" id="rowContent">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/images/employes/originales/<?php if($employe->photo){echo $employe->photo->url;}else{ echo "";} ?>" alt="User profile picture">

            <h3 class="profile-username text-center">{{ $employe->prenom .' '. $employe->nom }}</h3>

            <p class="text-muted text-center">{{ $employe->fonction->libelle }}</p>

            <ul class="list-group list-group-unbordered">
              <!--li class="list-group-item">
                <b>Cellule</b> <a class="pull-right">$employe->cellule->libelle </a>
              </li-->
              <li class="list-group-item">
                <b>Matricule</b> <a class="pull-right">{{ $employe->matricule }}</a>
              </li>
              <li class="list-group-item">
                <b>IPRESS</b> <a class="pull-right">{{ $employe->ipress }}</a>
              </li>

            </ul>

            <a href="#" class="btn btn-primary btn-block" onClick="window.print();return false"><b>Imprimer le badge</b></a>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <!-- About Me Box -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">A propos de l'employé</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

            <p class="text-muted">
              Cet employé a un niveau d'étude de {{ $employe->niveauEtude }}
            </p>

            <hr>

            <strong><i class="fa fa-map-marker margin-r-5"></i> Adresse</strong>

            <!--p class="text-muted">
              $employe->adresse->quartier }}, $employe->adresse->commune,
              $employe->adresse->departement , $employe->adresse->region
            </p-->

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
              <span class="label label-danger">UI Design</span>
              <span class="label label-success">Coding</span>
              <span class="label label-info">Javascript</span>
              <span class="label label-warning">PHP</span>
              <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li  class="active"><a href="#dossiers" data-toggle="tab">Dossier du Personnel</a></li>
            <li><a href="#materiel" data-toggle="tab">Dotation en Materiels</a></li>
            @if(session('statut') == 'superAdmin' || session('statut') == 'admin')
            <li><a href="#dossierMedical" data-toggle="tab">Dossier Medical</a></li>
            @endif
            <li><a href="#conge" data-toggle="tab">Calendrier Conge</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="dossiers">
              <form class="form-horizontal"  action="/employe/sousdossier">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Sous dossier</label>
                  <div class="col-sm-10">
                    <input type="text" name="sousdossier" class="form-control" id="inputName" placeholder="Name">
                    <input type="hidden" name="dossier" value=" <?php if($employe->dossierPersonnel){echo $employe->dossierPersonnel->id;}else{ echo "1";} ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-danger">Valider</button>
                  </div>
                </div>
              </form>
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Dossiers: <?php if($employe->dossierPersonnel){echo $employe->dossierPersonnel->libelle;}else{ echo "Personnel";} ?></h3>
                </div>
                <div class="box-body">
                  <div class="example">
                      <div id="fileTreeDemo_1" class="demo"></div>
                   </div>
                </div>
                <!-- /.box-body -->
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="materiel">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                      <span class="username">
                        <a href="#">Tableau Dotation Materiel</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                </div>
                <!-- /.user-block -->
              </div>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="conge">
              <div class="post">
                <div class="user-block">
                      <span class="username">
                        <a href="#">Calendrier Conge</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                </div>
                <!-- /.user-block -->
              </div>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="badgeUser">
      <div class="box box-primary">
        <div class="box-body box-profile">
          <table>
            <tr>
              <td width="40%">
                <p class="text-center">
                  <img src="/images/drapeau.png" alt="" align="center" height="30" />
                </p>
                <h5 class="text-center">Ministère de Gouvernance Territoriale, du Développement et de l'Aménagement du Territoire </h5>
                <h1 class="text-center">UCG</h1>
                <h5 class="text-center">Unité de Coordination de la Gestion des Déchets Solides</h5>
              </td>
              <td width="60%">
                <a href="#" class="pull-right">{!! QrCode::size(150)->generate(url('/employe/'.$employe->id)); !!}</a>
              </td>
            </tr>
            <tr>
              <td width="40%">
                <img class="profile-user-img img-responsive " src="/images/employes/originales/<?php if($employe->photo){echo $employe->photo->url;}else{ echo "";} ?>" alt="User profile picture">
              </td>
              <td width="60%">
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Prénom:</b> <a class="pull-right">{{ $employe->prenom }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Nom:</b> <a class="pull-right">{{ $employe->nom }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Matricule:</b> <a class="pull-right">{{ $employe->matricule }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Fonction:</b> <a class="pull-right">{{ $employe->fonction->libelle }}</a>
                  </li>

                </ul>
              </td>
            </tr>
          </table>


        </div>
        <!-- /.box-body -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('script')
<script src="/js/fileTree/jquery.easing.js" type="text/javascript"></script>
<script src="/js/fileTree/jqueryFileTree.js" type="text/javascript"></script>
<link href="/js/fileTree/jqueryFileTree.css" rel="stylesheet" type="text/css" media="screen" />
<?php
  if($employe->dossierPersonnel){
    $doss = $employe->dossierPersonnel->libelle;
  }else{
    $doss = "Personnel";
  }
  $dossiers = public_path('dossiers/'. $doss.'/');
  //$files = \File::allFiles($dossiers);

 ?>
 <?php echo "
<script type='text/javascript'>
  $(document).ready( function() {

    $('#fileTreeDemo_1').fileTree({ root: '".$dossiers."', script: '/js/fileTree/connectors/jqueryFileTree.php' }, function(file) {
      alert(file);
    });

    $('#fileTreeDemo_2').fileTree({ root: '".$dossiers."', script: '/js/fileTree/connectors/jqueryFileTree.php', folderEvent: 'click', expandSpeed: 750, collapseSpeed: 750, multiFolder: false }, function(file) {
      alert(file);
    });

  });
</script>
"; ?>
@stop
