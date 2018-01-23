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
        <div class="col-md-12">
          <!-- Profile Image -->
          <p>
            <a href="#" class="btn btn-primary print" onClick="window.print();"><b>Imprimer les badges</b></a>
          </p>
          <?php foreach ($resultats as $employe): ?>
            <div class="col-md-6">
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <table width="100%">
                    <tbody>
                    <tr>
                      <td width="20%">
                        <img class="profile-user-img img-responsive" src="/images/employes/originales/<?php if($employe->photo){echo $employe->photo->url;}else{ echo "";} ?> " alt="User profile picture">
                      </td>
                      <td width="80%">
                        <p class="text-center">
                          <img src="/images/drapeau.png" alt="" align="center" height="15" />
                        </p>
                        <h5 class="text-center">Ministère de Gouvernance Territoriale, du Développement et de l'Aménagement du Territoire </h5>
                        <h1 class="text-center">UCG</h1>
                        <h5 class="text-center">Unité de Coordination de la Gestion des Déchets Solides</h5>
                      </td>
                    </tr>
                    <tr>
                      <td width="20%">
                        <a href="#" class="">{!! QrCode::size(80)->generate(url('/employe/'.$employe->id)); !!}</a>
                      </td>
                      <td width="80%">
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
                            <b>Fonction:</b> <a class="pull-right">{{ $employe->fonction_id }}</a>
                          </li>
                        </ul>
                      </td>
                    </tr>
                    <tr><td>
                      <br/>
                    </td></tr>
                  </tbody>
                  </table>
                </div>
            <!-- /.box-body -->
              </div>
            </div>
          <!-- /.box -->
          <?php endforeach; ?>
        </div>
      </div>
    </section>
  </div>

</div>
<!-- ./wrapper -->
</body>
</html>
