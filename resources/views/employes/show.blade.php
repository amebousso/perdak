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
  .badgeUser{
    display:block;
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
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="/images/employes/originales/{{ $employe->photo->url }}" alt="User profile picture">

            <h3 class="profile-username text-center">{{ $employe->prenom .' '. $employe->nom }}</h3>

            <p class="text-muted text-center">{{ $employe->fonction->libelle }}</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Cellule</b> <a class="pull-right">{{ $employe->cellule->libelle }}</a>
              </li>
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

            <p class="text-muted">
              {{ $employe->adresse->quartier }}, {{ $employe->adresse->commune }},
              {{ $employe->adresse->departement }}, {{ $employe->adresse->region }}
            </p>

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
            <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
            <li><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li><a href="#dossiers" data-toggle="tab">Dossier du Personnel</a></li>
          </ul>
          <div class="tab-content">
            <div class="active tab-pane" id="activity">
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="/images/employes/profiles/{{ $employe->photo->url }}" alt="user image">
                      <span class="username">
                        <a href="#">Jonathan Burke Jr.</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                  <span class="description">Shared publicly - 7:30 PM today</span>
                </div>
                <!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>
                <ul class="list-inline">
                  <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                  <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                  </li>
                  <li class="pull-right">
                    <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                      (5)</a></li>
                </ul>

                <input class="form-control input-sm" type="text" placeholder="Type a comment">
              </div>
              <!-- /.post -->

              <!-- Post -->
              <div class="post clearfix">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                      <span class="username">
                        <a href="#">Sarah Ross</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                  <span class="description">Sent you a message - 3 days ago</span>
                </div>
                <!-- /.user-block -->
                <p>
                  Lorem ipsum represents a long-held tradition for designers,
                  typographers and the like. Some people hate it and argue for
                  its demise, but others ignore the hate as they create awesome
                  tools to help create filler text for everyone from bacon lovers
                  to Charlie Sheen fans.
                </p>

                <form class="form-horizontal">
                  <div class="form-group margin-bottom-none">
                    <div class="col-sm-9">
                      <input class="form-control input-sm" placeholder="Response">
                    </div>
                    <div class="col-sm-3">
                      <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.post -->
              <!-- Post -->
              <div class="post">
                <div class="user-block">
                  <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                      <span class="username">
                        <a href="#">Adam Jones</a>
                        <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                      </span>
                  <span class="description">Posted 5 photos - 5 days ago</span>
                </div>
                <!-- /.user-block -->

              </div>
              <!-- /.post -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="timeline">
              <!-- The timeline -->
              <ul class="timeline timeline-inverse">
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-red">
                        10 Feb. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-envelope bg-blue"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                    <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                    <div class="timeline-body">
                      Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                      weebly ning heekya handango imeem plugg dopplr jibjab, movity
                      jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                      quora plaxo ideeli hulu weebly balihoo...
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-primary btn-xs">Read more</a>
                      <a class="btn btn-danger btn-xs">Delete</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                    <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                    </h3>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-comments bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                    <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                    <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <!-- timeline time label -->
                <li class="time-label">
                      <span class="bg-green">
                        3 Jan. 2014
                      </span>
                </li>
                <!-- /.timeline-label -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-camera bg-purple"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                    <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                    <div class="timeline-body">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                      <img src="http://placehold.it/150x100" alt="..." class="margin">
                    </div>
                  </div>
                </li>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="dossiers">
              <form class="form-horizontal"  action="/employe/sousdossier">
                <div class="form-group">
                  <label for="inputName" class="col-sm-2 control-label">Sous dossier</label>
                  <div class="col-sm-10">
                    <input type="text" name="sousdossier" class="form-control" id="inputName" placeholder="Name">
                    <input type="hidden" name="dossier" value="{{ $employe->dossierPersonnel->id }}" >
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
                  <h3 class="box-title">Dossiers: {{ $employe->dossierPersonnel->libelle }}</h3>
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
                <img class="profile-user-img img-responsive img-circle" src="/images/employes/originales/{{ $employe->photo->url }}" alt="User profile picture">
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
                    <b>Fonction:</b> <a class="pull-right">{{ $employe->fonction->corpsDeMetier->libelle }}</a>
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
  $dossiers = public_path('dossiers/'.$employe->dossierPersonnel->libelle.'/');
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
