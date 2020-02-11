<!DOCTYPE html>
<html>
<head>
  <?php include('../include/header.php') ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include('../include/navigation.php'); ?>
  <?php include('../include/events.php'); ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Apartment 2</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3" hidden>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="external-event bg-danger">New ev</div>
                    <div class="checkbox" hidden>
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove" checked>
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button> -->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="customColor1" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor2" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor3" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor4" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor5" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor6" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor7" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor8" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor9" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor10" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor11" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor12" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor13" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor14" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor15" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor16" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor17" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor18" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor19" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor20" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor21" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor22" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor23" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor24" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  <!-- /.content-wrapper -->
  <?php include('../include/footer.php'); ?>
  <!-- ./wrapper -->
  <?php include('../include/scriptsUser.php'); ?>
</body>
</html>
