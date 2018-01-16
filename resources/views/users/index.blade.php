@extends('layout.master')

@section('title', 'Utilisateurs UCG')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Personnel
      <small>Liste des Utilisateurs</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="#">Utilisateurs</a></li>
      <li class="active">Liste des utilisateurs</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      @if(session()->has('success'))
      <div class="alert alert-success col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif
      @if(session()->has('warning'))
      <div class="alert alert-warning col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Attention!</strong> {{ session('warning') }}
      </div>
      @endif
      <!-- right column -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Les Utilisateurs </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Prénom&Nom</th>
                  <th>Adresse Mail</th>
                  <th>Role</th>

                </tr>
              </thead>
              @foreach($users as $user)
              <tbody>
                <tr>
                  <td>{{ link_to('users/'. $user->id, $user->name, ['class' => 'primary']) }}</td>
                  <td>{{ link_to('users/'. $user->id, $user->email, ['class' => 'primary']) }}</td>
                  <td>{{ $user->role->libelle }}</td>
                </tr>
              </tbody>
              @endforeach
              <tfoot>
                <tr>
                  <th>Prénom&Nom</th>
                  <th>Adresse Mail</th>
                  <th>Role</th>
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop
