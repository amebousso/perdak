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
      {!! Form::model($employe, ['route' => ['employes.update', $employe->id], 'method' => 'put', 'role' => 'form', 'file' => 'true', 'enctype' => 'multipart/form-data']) !!}
      @if(session()->has('success'))
      <div class="alert alert-success col-md-8">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> {{ session('success') }}
      </div>
      @endif
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
                {{ Form::text('prenom', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputNom">Nom</label>
                {{ Form::text('nom', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputNaissance">Date de naissance</label>
                {{ Form::text('dateNaissance', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputLieu">Lieu de Naissance</label>
                {{ Form::text('lieuNaissance', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Sexe</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="sexe" value="Masculin" <?php if ($employe->sexe === "Masculin"): ?>
                      checked="checked"
                    <?php endif; ?>> Masculin
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="sexe" value="Féminin" <?php if ($employe->sexe === "Feminin"): ?>
                      checked="checked"
                    <?php endif; ?>> Féminin
                  </label>
                </div>
              </div>
              <div class="form-group">
                <label>Situation Matrimoniale</label>
                <select class="form-control" name="situationMatrimoniale">
                  <option value="Marié(e)" <?php if ($employe->situationMatrimoniale === 'Marié(e)'): ?>
                    selected
                  <?php endif; ?>>Marié(e)</option>
                  <option value="Célibataire" <?php if ($employe->situationMatrimoniale === 'Célibataire'): ?>
                     selected
                  <?php endif; ?>>Célibataire</option>
                  <option value="Divorcé(e)" <?php if ($employe->situationMatrimoniale === 'Divorcé(e)'): ?>
                     selected
                  <?php endif; ?>>Divorcé(e)</option>
                  <option value="Veuf/Veuve" <?php if ($employe->situationMatrimoniale === 'Veuf/Veuve'): ?>
                    selected
                  <?php endif; ?>>Veuve/Veuf</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEnfant">Nombre d'enfants</label>
                {{ Form::number('nombreEnfants', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputMatricule">Matricule</label>
                {{ Form::text('matricule', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label>Service</label>
                {{ Form::select('service', $services, $employe->cellule->service->id, ['class' => 'form-control', 'id' => 'service']) }}

              </div>
              <div class="form-group">
                <label>Cellule</label>
                {{ Form::select('cellule_id', $cellules, $employe->cellule->id, ['class' => 'form-control', 'id' => 'cellule']) }}

              </div>
              <div class="form-group">
                <label>Fonction</label>
                {{ Form::select('fonction_id', $fonctions, $employe->fonction->id, ['class' => 'form-control', 'id' => 'fonction']) }}

              </div>
              <div class="form-group">
                <label for="exampleInputCNI">Numéro de CNI</label>
                {{ Form::text('cni', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputProfession">Profession</label>
                {{ Form::text('profession', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputIpress">Numéro IPRESS</label>
                {{ Form::text('ipress', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputEtude">Niveau d'étude</label>
                {{ Form::text('niveauEtude', null, ['class' => 'form-control']) }}
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Photo de l'employé</label>
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
              {{ Form::select('pole', $poles, $employe->circuit->commune->coordinationDepartement->coordinationPole->id, ['class' => 'form-control', 'id' => 'pole']) }}

            </div>
            <div class="form-group">
              <label>Coordination départementale</label>
              {{ Form::select('departement', $departements, $employe->circuit->commune->coordinationDepartement->id, ['class' => 'form-control', 'id' => 'departement']) }}

            </div>
            <div class="form-group">
              <label>Commune</label>
              {{ Form::select('commune', $communes, $employe->circuit->commune->id, ['class' => 'form-control', 'id' => 'commune']) }}

            </div>
            <div class="form-group">
              <label>Circuit d'affectation</label>
              {{ Form::select('circuit_id', $circuits, $employe->circuit->id, ['class' => 'form-control', 'id' => 'circuit']) }}

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
            <div class="form-group">
              <label>Région</label>
              <select class="form-control" name="region" id="region">
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
              {{ Form::text('codePostal', $employe->adresse->codePostal, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Quartier</label>
              {{ Form::text('quartier', $employe->adresse->quartier, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone1">Téléphone 1</label>
              {{ Form::text('telephone1', $employe->adresse->telephone1, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone2">Téléphone 2</label>
              {{ Form::text('telephone2', $employe->adresse->telephone2, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone3">Téléphone 3</label>
              {{ Form::text('telephone3', $employe->adresse->telephone3, ['class' => 'form-control']) }}
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
              {{ Form::select('banque', $banques, $employe->infosBancaire->banque->id, ['class' => 'form-control', 'id' => 'corps']) }}

            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Numéro de compte</label><br>
              {{ Form::text('codeGuichet', $employe->infosBancaire->codeGuichet, []) }}
              {{ Form::number('numero_compte', $employe->infosBancaire->numero_compte, []) }}
              {{ Form::number('cleRIB', $employe->infosBancaire->cleRIB, []) }}

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
