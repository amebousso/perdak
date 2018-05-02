@extends('layout.master')

@section('title', 'Personnel UCG')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Gestion du Personnel
      <small>Ajouter</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="/admin"><i class="fa fa-dashboard"></i> Accueil</a></li>
      <li><a href="/employes">Personnel</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      {!! Form::open(['route' => 'employes.store', 'role' => 'form']) !!}
      @if(session()->has('success'))
      <div class="alert alert-success col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif
      <!-- right column -->
      <div class="col-md-8">
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Information de l'Employé</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Type d'employé</label>
              <select id="type" name="type" class="form-control">
                <option value="terrain">Personnel de Nettoiement</option>
                <option value="support administratif et technique">Personnel Support Administratif et Technique</option>
              </select>
            </div>
            <div class="form-group">
              <label>Contrat de Travail</label>
              <select id="contrat" name="contrat" class="form-control">
                <option value="journalier">Journalier</option>
                <option value="cdd">CDD</option>
                <option value="cdi">CDI</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Prénom</label>
              <input type="text" name="prenom" class="form-control" id="exampleInputlibelle" placeholder="Prénom de l'employé">
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Nom</label>
              <input type="text" name="nom" class="form-control" id="exampleInputlibelle" placeholder="Nom de l'employé">
            </div>
            <div class="form-group">
              <label>Sexe</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="M">
                <label class="form-check-label" for="inlineRadio1">Masculin</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="F">
                <label class="form-check-label" for="inlineRadio2">Féminin</label>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputDate">Date de Naissance</label>
                <input type="date" class="form-control" name="dateNaissance" id="inputDate" placeholder="Date de Naissance de l'employé">
              </div>
              <div class="form-group col-md-6">
                <label for="inputLieu">Lieu de Naissance</label>
                <input type="text" class="form-control" name="lieuNaissance" id="inputLieu" placeholder="Lieu de Naissance de l'employé">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputlibelle">Numéro de la carte d'identité nationale ou du passeport</label>
              <input type="text" name="cni" class="form-control" id="exampleInputlibelle" placeholder="Numéro CNI">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Photo de l'employé</label>
              <input type="file" name="photo" id="exampleInputFile">
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
      $('input[type="file"]').on('change',function(){
              let fileName = $(this).val().replace(/^.*[\\\/]/, '')
              $(this).next('.form-control-file').html(fileName)
      })
      // Chargement du Contrat
      $('#type').on('change', function(e) {
          var type = e.target.value;
          var data = [];
          if(type == "terrain") {
              data = ["journalier", "cdd", "cdi"];
          } else {
              data = ["stagiaire", "cdd", "cdi"];
          }

          $('#contrat').empty();
          $.each(data, function(index, contrat) {
              $('#contrat').append($('<option>', {
                  value: contrat,
                  text : contrat.toUpperCase()
              }));
          });
      })

  		// Changement de région
  		$('#service').on('change', function(e) {
  			var service_id = e.target.value;
  			//departement_id = false;
  			celluleUpdate(service_id);
  		});

  		 // Requête Ajax pour les departements
	    function celluleUpdate(celluleId) {
	        $.get('{{ url('celluleService') }}/'+ celluleId, function(data) {
	            $('#cellule').empty();
	            $.each(data, function(index, cellule) {
	                $('#cellule').append($('<option>', {
	                    value: cellule.id,
	                    text : cellule.libelle
	                }));
	            });
	            //var departement_id = $('#departement option:selected').val();
	            //communeUpdate(departement_id);
	        });
	    }
	    // Requête Ajax pour les communes
	    function fonctionUpdate(fonctionId) {
	        $.get('{{ url('fonctionCorps') }}/'+ fonctionId, function(data) {
	            $('#fonction').empty();
	            $.each(data, function(index, fonction) {
	                $('#fonction').append($('<option>', {
	                    value: fonction.id,
	                    text : fonction.libelle
	                }));
	            });
	        });
	    }

      // Changement de région
  		$('#pole').on('change', function(e) {
  			var pole_id = e.target.value;
  			//departement_id = false;
  			departementUpdate(pole_id);
  		});

  		$('#departement').on('change', function(e){
  			var departement_id = e.target.value;

  			communeUpdate(departement_id);
  		});

      $('#commune').on('change', function(e){
  			var commune_id = e.target.value;

  			circuitUpdate(commune_id);
  		});


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
              var commune_id = $('#commune option:selected').val();
	            circuitUpdate(commune_id);
	        });
	    }

      // Requête Ajax pour les circuits
	    function circuitUpdate(communeId) {
	        $.get('{{ url('circuitCommune') }}/'+ communeId, function(data) {
	            $('#circuit').empty();
	            $.each(data, function(index, circuit) {
	                $('#circuit').append($('<option>', {
	                    value: circuit.id,
	                    text : circuit.libelle
	                }));
	            });
	        });
	    }

  	});
	</script>
@stop
