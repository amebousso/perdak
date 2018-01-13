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
      {!! Form::open(['route' => 'employes.store', 'role' => 'form', 'file' => 'true', 'enctype' => 'multipart/form-data']) !!}
      <!-- left column -->
        <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Information du personnel</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <div class="box-body">
              <div class="form-group">
                <label for="exampleInputPrenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="exampleInputPrenom" placeholder="Entrer le prénom">
              </div>
              <div class="form-group">
                <label for="exampleInputNom">Nom</label>
                <input type="text" name="nom" class="form-control" id="exampleInputNom" placeholder="Entrer le nom">
              </div>
              <div class="form-group">
                <label for="exampleInputNaissance">Date de naissance</label>
                <input type="date" name="dateNaissance" class="form-control" id="exampleInputNaissance" placeholder="Date de naissance">
              </div>
              <div class="form-group">
                <label for="exampleInputLieu">Lieu de Naissance</label>
                <input type="text" name="lieuNaissance" class="form-control" id="exampleInputLieu" placeholder="Lieu de naissance">
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="sexe"> Masculin
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="sexe"> Féminin
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label>Situation Matrimoniale</label>
                <select class="form-control" name="situationMatrimoniale">
                  <option value="Marié(e)">Marié(e)</option>
                  <option value="Célibataire">Célibataire</option>
                  <option value="Divorcé(e)">Divorcé(e)</option>
                  <option value="Veuf/Veuve">Veuve/Veuf</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEnfant">Nombre d'enfants</label>
                <input type="number" name="nombreEnfant" class="form-control" id="exampleInputEnfant" placeholder="Nombre d'enfant">
              </div>
              <div class="form-group">
                <label for="exampleInputMatricule">Matricule</label>
                <input type="text" name="matricule" class="form-control" id="exampleInputMatricule" placeholder="Entrer le matricule">
              </div>
              <div class="form-group">
                <label>Service</label>
                <select class="form-control" name="service" id="service">
                  <option>:::: Sélectionne un service :::::</option>
                  <?php foreach ($services as $service): ?>
                    <option value="{!! $service->id !!}">{!! $service->libelle !!}</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Cellule</label>
                <select class="form-control" name="cellule_id" id="cellule">
                  <option>::: Cellule :::</option>

                </select>
              </div>
              <div class="form-group">
                <label>Corps de Métier</label>
                <select class="form-control" name="corps" id="corps">
                  <option>:::: Sélectionne de corps de métier ::::</option>
                  <?php foreach ($corps as $corp): ?>
                    <option value="{!! $corp->id !!}">{!! $corp->libelle !!}</option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Fonction</label>
                <select class="form-control" name="fonction_id" id="fonction">
                  <option>:::Fonction:::</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputCNI">Numéro de CNI</label>
                <input type="text" name="cni" class="form-control" id="exampleInputCNI" placeholder="Entrer le numero CNI">
              </div>
              <div class="form-group">
                <label for="exampleInputProfession">Profession</label>
                <input type="text" name="profession" class="form-control" id="exampleInputProfession" placeholder="Entrer la profession">
              </div>
              <div class="form-group">
                <label for="exampleInputIpress">Numéro IPRESS</label>
                <input type="text" name="ipress" class="form-control" id="exampleInputIpress" placeholder="Numéro IPRESS">
              </div>
              <div class="form-group">
                <label for="exampleInputEtude">Niveau d'étude</label>
                <input type="text" name="niveauEtude" class="form-control" id="exampleInputEtude" placeholder="Niveau d'étude">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Photo</label>
                <input type="file" name="photo" id="exampleInputFile">
              </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (left) -->
      <!-- right column -->
        <div class="col-md-6">
        <!-- Form Element sizes -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Circuit d'affectation</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label>Coordination de Pôle</label>
              <select class="form-control" id="pole">
                <option>:::: Sélectionne le pôle ::::</option>
                <?php foreach ($poles as $pole): ?>
                  <option value="{!! $pole->id !!}">{!! $pole->libelle !!}</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Coordination départementale</label>
              <select class="form-control" id="departement">
                <option>::: Sélectionne la Coordination :::</option>
              </select>
            </div>
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control" id="commune">
                <option>::: Commune :::</option>
              </select>
            </div>
            <div class="form-group">
              <label>Circuit d'affectation</label>
              <select class="form-control" name="circuit_id" id="circuit">
                <option>::: Circuit :::</option>
              </select>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Horizontal Form -->
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Adresse du personnel</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="form-group">
              <label>Pays</label>
              <select class="form-control" name="pays">
                <option value="Sénégal">Sénégal</option>
              </select>
            </div>
            <div class="form-group" name="region" id="region">
              <label>Région</label>
              <select class="form-control">
                <option value="Dakar">Dakar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Département</label>
              <select class="form-control" name="departement">
                <option value="Dakar">Dakar</option>
              </select>
            </div>
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control" name="commune">
                <option value="Médina">Médina</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputCode">Code postal</label>
              <input type="text" name="codePostal" class="form-control" id="exampleInputCode" placeholder="Code Postal">
            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Quartier</label>
              <input type="text" name="quartier" class="form-control" id="exampleInputQuartier" placeholder="Quartier">
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone1">Téléphone 1</label>
              <input type="text" name="telephone1" class="form-control" id="exampleInputTéléphone1" placeholder="Téléphone 1">
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone2">Téléphone 2</label>
              <input type="text" name="telephone2" class="form-control" id="exampleInputTéléphone2" placeholder="Téléphone 2">
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone3">Téléphone 3</label>
              <input type="text" name="telephone3" class="form-control" id="exampleInputTéléphone3" placeholder="Téléphone 3">
            </div>

          </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
        <!-- Form Element sizes -->
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Information bancaire</h3>
          </div>
          <div class="box-body">
            <div class="form-group">
              <label>Banque</label>
              <select class="form-control" name="banque">
                <option>::: Sélectionne la banque :::</option>
                <?php foreach ($banques as $banque): ?>
                  <option value="{!! $banque->id !!}">{!! $banque->libelle !!}</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Numéro de compte</label><br>
              <input type="text" name="codeGuichet" placeholder="Guichet" size="20">
              <input type="number" name="numero_compte" placeholder="Compte" size="30">
              <input type="number" name="cleRIB" placeholder="RIB" size="2" maxlength="2">

            </div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!--/.col (right) -->
        <div class="box-footer">
        <button type="submit" class="btn btn-primary col-md-3">Valider les données</button>
      </div>
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
  		// Changement de région
  		$('#service').on('change', function(e) {
  			var service_id = e.target.value;
  			//departement_id = false;
  			celluleUpdate(service_id);
  		});

  		$('#corps').on('change', function(e){
  			var corps_id = e.target.value;

  			fonctionUpdate(corps_id);
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
