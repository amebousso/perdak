@extends('layout.master')

@section('title', 'Circuits')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Circuits
      <small>Liste des circuits</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/circuits">Circuits</a></li>
      <li class="active">Liste des circuits</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- right column -->
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title">Les circuits </h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Libellé</th>
                  <th>Code circuit</th>
                  <th>Commune</th>
                  <th></th>
                </tr>
              </thead>
              @foreach($circuits as $circuit)
              <tbody>
                <tr>
                  <td>{{ $circuit->libelle }}</td>
                  <td>{{ $circuit->code }}</td>
                  <td>{{ $circuit->commune->libelle }}</td>
                  <td>{{ link_to_route('circuits.edit', 'Modifier', [$circuit->id], ["class" => "btn btn-info"]) }} </td>
                </tr>
              </tbody>
              @endforeach
              <tfoot>
                <tr>
                  <th>Libellé</th>
                  <th>Code circuit</th>
                  <th>Commune</th>
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
