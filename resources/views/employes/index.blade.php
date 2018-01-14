@extends('layout.master')

@section('title', 'Personnel UCG')

@section('content')
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
