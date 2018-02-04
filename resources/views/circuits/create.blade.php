@extends('layout.master')

@section('title', 'Circuits')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Circuits
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/circuits">Circuits</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'circuits.store', 'role' => 'form']) !!}
      @if(session()->has('success'))
      <div class="alert alert-success col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif
      <!-- right column -->
      <div class="col-md-6">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information du circuit</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Pole</label>
              <select class="form-control" name="commune_id" id="pole">
                <option>:::: Sélectionne un Pôle :::::</option>
                <?php foreach ($poles as $pole): ?>
                  <option value="{!! $pole->id !!}">{!! $pole->libelle !!}</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Departement</label>
              <select class="form-control" name="commune_id" id="departement">
                <option>:::: Sélectionne un Departement :::::</option>
              </select>
            </div>
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control" name="commune_id" id="commune">
                <option>:::: Sélectionne une commune :::::</option>
              </select>
            </div>
            <div class="form-group">
              <label>Type du Circuit</label>
              <select class="form-control" name="commune_id" id="type">
                <option value="">:::: Sélectionne le type :::::</option>
                <option value="balayage">Balayage</option>
                <option value="collecte">Collecte</option>
                <option value="desensablement">Désensablement</option>
                <option value="precollecte">Pré-Collecte</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Code du circuit</label>
              <input type="text" name="code" class="form-control" id="code" placeholder="Code circuit">
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Nom du circuit</label>
              <input type="text" name="libelle" class="form-control" id="exampleInputlibelle" placeholder="Nom du circuit">
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Valider les données</button>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
      {!! Form::close() !!}
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
    <script type="text/javascript">
        $(function() {
          // Changement de Pôles
          $('#pole').on('change', function(e) {
              var pole_id = e.target.value;
              departementUpdate(pole_id);
          })

          // Changement de departement
          $('#departement').on('change', function(e) {
              var departement_id = e.target.value;
              communeUpdate(departement_id);
              /*if($('#type option:selected').val() != "") {
                 generationCode(departement_id);
              }*/
          })

          // Changement de communes
          $('#commune').on('change', function(e)  {
              var departement_id = $('#departement option:selected').val();
              if($('#type option:selected').val() != "") {
                 generationCode(departement_id);
              }
          })

          // Generation du code du circuit
          $('#type').on('change', function(e) {
              var departement_id = $('#departement option:selected').val();
              /*var codeType = ($('#type option:selected').val()).toUpperCase().substring(0, 3);
              var codeDpt = ($('#departement option:selected').text()).toUpperCase().substring(0, 3);
              var commune = $('#commune option:selected').text();*/
              generationCode(departement_id)
          })


            // Requête Ajax pour les departements
           function departementUpdate(poleId) {
               $.get('{{ url('departementPole') }}/'+ poleId, function(data) {
                   $('#departement').empty();
                   $.each(data, function(index, departements) {
                       $('#departement').append($('<option>', {
                           value: departements.id,
                           text : departements.libelle
                       }));
                   });
                   var departement_id = $('#departement option:selected').val();
                   communeUpdate(departement_id);
                   if($('#type option:selected').val() != "") {
                      generationCode(departement_id);
                   }
               });
           }

           // Requête Ajax pour les communes
     	    function communeUpdate(departementId) {
     	        $.get('{{ url('communesDpt') }}/'+ departementId, function(data) {
     	            $('#commune').empty();
     	            $.each(data, function(index, communes) {
     	                $('#commune').append($('<option>', {
     	                    value: communes.id,
     	                    text : communes.libelle
     	                }));
     	            });
                  if($('#type option:selected').val() != "") {
                     generationCode(departementId);
                  }
     	        });
     	    }

          // Generation du code du circuit
          function generationCode(departementId) {
              var codeType = ($('#type option:selected').text()).toUpperCase().substring(0, 3);
              var codeDpt = ($('#departement option:selected').text()).toUpperCase().substring(0, 3);
              var commune = $('#commune option:selected').text();

              $.get('{{ url('communesDpt') }}/'+ departementId, function(data) {
                data.sort(function(a, b){
                  if(a.libelle > b.libelle)
                    return 1
                  if(a.libelle < b.libelle)
                    return -1
                  return 0;
                });
                var i=0, test=false;
                while (test == false) {
                  if(data[i].libelle == commune)
                    test = true;
                  i++;
                }
                $('#code').val(codeDpt + '-' + i + '-' + codeType);
             })
          }
        })
    </script>
@endsection
