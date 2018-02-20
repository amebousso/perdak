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
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
              @component('components.card')
                 @slot('title')
                     @lang('Ajouter un nouvel employé')
                 @endslot
                 <form method="POST" action="{{ route('employes.store') }}" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <div class="form-group">
                          <label for="type">Type d'employé</label>
                          <select id="type" name="type" class="form-control">
                              <option value="terrain">Personnel de Nettoiement</option>
                              <option value="support administratif et technique">Personnel Support Administratif et Technique</option>
                          </select>
                      </div>

                      <div class="form-group">
                           <label for="contrat">Contrat de Travail</label>
                           <select id="contrat" name="contrat" class="form-control">
                              <option value="journalier">JOURNALIER</option>
                              <option value="cdd">CDD</option>
                              <option value="cdi">CDI</option>
                           </select>
                       </div>

                      @include('partials.form-group', [
                         'title' => __('Prénom'),
                         'type' => 'text',
                         'name' => 'prenom',
                         'required' => true,
                         ])

                      @include('partials.form-group', [
                          'title' => __('Nom'),
                          'type' => 'text',
                          'name' => 'nom',
                          'required' => true,
                          ])

                       <div class="form-group">
                          <label>Sexe</label>
                          <div class="radio">
                              <label>
                                <input type="radio" name="sexe" value="M"> Masculin
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input type="radio" name="sexe" value="F"> Féminin
                              </label>
                            </div>
                        </div>

                        @include('partials.form-group', [
                            'title' => __('Date de Naissance'),
                            'type' => 'date',
                            'name' => 'dateNaissance',
                            'required' => true,
                            ])

                        @include('partials.form-group', [
                            'title' => __('Lieu de Naissance'),
                            'type' => 'text',
                            'name' => 'lieuNaissance',
                            'required' => true,
                            ])

                        @include('partials.form-group', [
                            'title' => __('Numéro Carte d\'Identité'),
                            'type' => 'text',
                            'name' => 'cni',
                            'required' => true,
                            ])

                        <div class="form-group{{ $errors->has('photo') ? ' is-invalid' : '' }}">
                           <label class="custom-file">
                               <input type="file" id="photo" name="photo" class="form-control{{ $errors->has('photo') ? ' is-invalid ' : '' }}custom-file-input" required>
                               <span class="custom-file-control form-control-file"></span>
                               @if ($errors->has('photo'))
                                   <div class="invalid-feedback">
                                       {{ $errors->first('image') }}
                                   </div>
                               @endif
                           </label>
                       </div>
                       @component('components.button')
                           @lang('Enregister')
                       @endcomponent
                 </form>
             @endcomponent
            </div>
        </div>
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
