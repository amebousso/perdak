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
      <li><a href="#">Personnel</a></li>
      <li class="active">Ajouter</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Information du personnel</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="exampleInputPrenom">Prénom</label>
                <input type="text" class="form-control" id="exampleInputPrenom" placeholder="Entrer le prénom">
              </div>
              <div class="form-group">
                <label for="exampleInputNom">Nom</label>
                <input type="text" class="form-control" id="exampleInputNom" placeholder="Entrer le nom">
              </div>
              <div class="form-group">
                <label for="exampleInputNaissance">Date de naissance</label>
                <input type="date" class="form-control" id="exampleInputNaissance" placeholder="Date de naissance">
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
                <select class="form-control">
                  <option>Marié(e)</option>
                  <option>Célibataire</option>
                  <option>Divorcé(e)</option>
                  <option>Veuve/Veuf</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEnfant">Nombre d'enfants</label>
                <input type="number" class="form-control" id="exampleInputEnfant" placeholder="Nombre d'enfant">
              </div>
              <div class="form-group">
                <label for="exampleInputMatricule">Matricule</label>
                <input type="text" class="form-control" id="exampleInputMatricule" placeholder="Entrer le matricule">
              </div>
              <div class="form-group">
                <label>Service</label>
                <select class="form-control">
                  <option>Marié(e)</option>
                  <option>Célibataire</option>
                  <option>Divorcé(e)</option>
                  <option>Veuve/Veuf</option>
                </select>
              </div>
              <div class="form-group">
                <label>Cellule</label>
                <select class="form-control">
                  <option>Marié(e)</option>
                  <option>Célibataire</option>
                  <option>Divorcé(e)</option>
                  <option>Veuve/Veuf</option>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputCNI">Numéro de CNI</label>
                <input type="text" class="form-control" id="exampleInputCNI" placeholder="Entrer le numero CNI">
              </div>
              <div class="form-group">
                <label for="exampleInputProfession">Profession</label>
                <input type="text" class="form-control" id="exampleInputProfession" placeholder="Entrer la profession">
              </div>
              <div class="form-group">
                <label for="exampleInputIpress">Numéro IPRESS</label>
                <input type="text" class="form-control" id="exampleInputIpress" placeholder="Numéro IPRESS">
              </div>
              <div class="form-group">
                <label for="exampleInputEtude">Niveau d'étude</label>
                <input type="text" class="form-control" id="exampleInputEtude" placeholder="Niveau d'étude">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Photo</label>
                <input type="file" id="exampleInputFile">
              </div>
            </div>
            <!-- /.box-body -->
          </form>
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
              <label>Coordination</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label>Circuit d'affectation</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
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
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label>Région</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label>Département</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label>Commune</label>
              <select class="form-control">
                <option>Marié(e)</option>
                <option>Célibataire</option>
                <option>Divorcé(e)</option>
                <option>Veuve/Veuf</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputCode">Code postal</label>
              <input type="text" class="form-control" id="exampleInputCode" placeholder="Code Postal">
            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Quartier</label>
              <input type="text" class="form-control" id="exampleInputQuartier" placeholder="Quartier">
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone1">Téléphone 1</label>
              <input type="text" class="form-control" id="exampleInputTéléphone1" placeholder="Téléphone 1">
            </div>
            <div class="form-group">
              <label for="exampleInputTéléphone2">Téléphone 2</label>
              <input type="text" class="form-control" id="exampleInputTéléphone2" placeholder="Téléphone 2">
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
              <select class="form-control">
                <option>BICIS</option>
                <option>CBAO</option>
                <option>BSIC</option>
                <option>BHS</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputCompte">Numéro de compte</label>
              <input type="text" class="form-control" id="exampleInputCompte" placeholder="Numéro de compte bancaire">
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
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
