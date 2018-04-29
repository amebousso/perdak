@extends('layout.master')

@section('title', 'Tableau de bord')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de bord
        <small>Panneau de Contrôle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Accueil</a></li>
        <li class="active">Tableau de bord</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="pull-left header">Repartion du Personnel par Type et par Genre</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane  active" id="personnel-genrestatut" style="position: relative; height: 350px;"></div>
              <div class="chart tab-pane" id="personnel-sexe" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

          <!-- solid sales graph -->
          <div class="nav-tabs-custom">
            <div class="box-header">
              <h3 class="box-title">Répartition du Personnel dans le Pole de Dakar</h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="personnelDakar" style="height: 443px;"></div>
            </div>
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid">
            <div class="box-header">
              <!-- tools box -->
              <!-- /. tools -->
              <h3 class="box-title">
                Répartition du personnel par Type
              </h3>
            </div>
            <div class="box-body">
              <div id="personnelType" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            <div class="box-footer no-border">
              <div class="row" style="font-weight: bold">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="pat" style=" color: #3c8dbc"></div>
                  <div class="knob-label" style=" color: #3c8dbc">Personnel Administratif, Technique</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                  <div id="ptp" style=" color: #f56954"></div>
                  <div class="knob-label" style=" color: #f56954">Personnel de Terrain permanent</div>
                </div>
                <!-- ./col -->
                <div class="col-xs-4 text-center">
                  <div id="ptj" style=" color: #00a65a"></div>
                  <div class="knob-label" style=" color: #00a65a">Personnel de Terrain Journalier</div>
                </div>
                <!-- ./col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

          <!-- Calendar -->
          <div class="box box-solid">
            <div class="box-header">
              <h3 class="box-title">Repartiton du personnel de terrain département</h3>
              <!-- tools box -->
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="circuit" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
              <div class="row">
                <div class="col-sm-6">
                  <!-- Progress bars -->
                  <div class="clearfix">
                    <span class="pull-left">Task #1</span>
                    <small class="pull-right">90%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 90%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #2</span>
                    <small class="pull-right">70%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 70%;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                  <div class="clearfix">
                    <span class="pull-left">Task #3</span>
                    <small class="pull-right">60%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 60%;"></div>
                  </div>

                  <div class="clearfix">
                    <span class="pull-left">Task #4</span>
                    <small class="pull-right">40%</small>
                  </div>
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 40%;"></div>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
@endsection
