@extends('layout.master')

@section('title', 'Services')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Services
      <small>Liste des services</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/services">Services</a></li>
      <li class="active">Liste des services</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- right column -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Les services </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th></th>
                </tr>
              </thead>
              @foreach($services as $service)
              <tbody>
                <tr>
                  <td>{{ $service->libelle }}</td>
                  <td> {{ link_to_route('services.edit', 'Modifier', [$service->id], ["class" => "btn btn-info"]) }} </td>
                </tr>
              </tbody>
              @endforeach
              <tfoot>
                <tr>
                  <th>Libellé</th>
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
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@stop
