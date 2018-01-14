@extends('layout.master')

@section('title', 'Personnel UCG')

@section('content')
<style>
  .example-modal .modal {
    position: relative;
    top: auto;
    bottom: auto;
    right: auto;
    left: auto;
    display: block;
    z-index: 1;
  }

  .example-modal .modal {
    background: transparent !important;
  }
</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel
      <small>Liste du personnel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="#">Personnel</a></li>
      <li class="active">Liste du personnel</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- right column -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Le personnel </h3>
            <a href="/employes/create" class="btn btn-success pull-right">Ajouter un personnel</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Prénom</th>
                  <th>Nom</th>
                  <th>Matricule</th>
                  <th>CNI</th>
                  <th>Date Naissance</th>
                  <th>Profession</th>
                  <th></th>
                </tr>
              </thead>
              @foreach($employes as $employe)
              <tbody>
                <tr>
                  <td>{{ link_to('employes/'. $employe->id, $employe->prenom, ['class' => 'primary']) }}</td>
                  <td>{{ link_to('employes/'. $employe->id, $employe->nom, ['class' => 'primary']) }}</td>
                  <td>{{ link_to('employes/'. $employe->id, $employe->matricule, ['class' => 'primary']) }}</td>
                  <td>{{ $employe->cni }}</td>
                  <td>{{ $employe->dateNaissance }}</td>
                  <td>{{ $employe->profession }}</td>
                  <td>
                    {{ link_to_route('employes.edit', 'Modifier', [$employe->id], ["class" => "btn btn-info"]) }}
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$employe->id}}">Badge</button>
                  </td>
                </tr>
              </tbody>

              @endforeach
              <tfoot>
                <tr>
                  <th>Prénom</th>
                  <th>Nom</th>
                  <th>Matricule</th>
                  <th>CNI</th>
                  <th>Date Naissance</th>
                  <th>Profession</th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
            @foreach($employes as $employe)
            <!-- Modal -->
            <div id="myModal{{$employe->id}}" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Badge de {{ $employe->prenom .' '. $employe->nom }}</h4>
                  </div>
                  <div class="modal-body">
                    <div class="badgeUser">
                      <div class="box box-primary">
                        <div class="box-body box-profile">
                          <table>
                            <tbody>
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
                                <img class="profile-user-img img-responsive " src="/images/employes/originales/<?php if($employe->photo){echo $employe->photo->url;}else{ echo "";} ?> " alt="User profile picture">
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
                          </tbody>
                          </table>
                        </div>
                        <!-- /.box-body -->
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onClick="window.print();return false">Imprimer</button>
                  </div>
                </div>

              </div>
            </div>
            @endforeach


          </div>
          <!-- /.box-body -->
        </div>
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
@section('script')
<!-- DataTables -->
<script src="/bower_components/datatables/jquery.dataTables.min.js"></script>
<script src="/bower_components/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop
