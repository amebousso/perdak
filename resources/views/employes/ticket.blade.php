<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administration | @yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/bower_components/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  @yield('style')
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="/css/impression.css" media="print">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <div class="content-wrapper" style="margin-left:0%;">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="/images/employes/originales/{{ $employe->photo->url }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $employe->prenom .' '. $employe->nom }}</h3>

              <p class="text-muted text-center">{{ $employe->fonction->corpsDeMetier->libelle }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Secteur</b> <a class="pull-right">{{ $employe->fonction->libelle }}</a>
                </li>
                <li class="list-group-item">
                  <b>Cellule</b> <a class="pull-right">{{ $employe->cellule->libelle }}</a>
                </li>
                <li class="list-group-item">
                  <b>Matricule</b> <a class="pull-right">{{ $employe->matricule }}</a>
                </li>
                <li class="list-group-item">
                  <b>Sexe</b> <a class="pull-right">{{ $employe->sexe }}</a>
                </li>
                <li class="list-group-item">
                  <b>Circuit</b> <a class="pull-right">{{ $employe->circuit->libelle }}</a>
                </li>
                <li class="list-group-item">
                  <b>Commune</b> <a class="pull-right">{{ $employe->circuit->commune->libelle }}</a>
                </li>
              </ul>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
      </div>
    </section>
  </div>

</div>
<!-- ./wrapper -->
</body>
</html>
