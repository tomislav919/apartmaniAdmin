<?php require "../bootstrap.php"; ?>
<?php include(PATH . '/include/sessionCheck.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <?php include(PATH . '/include/header.php') ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include(PATH . '/include/navigationAdmin.php'); ?>

  <?php
  $apartmentId = 4;
  $events = Event::getForApartment($apartmentId);
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reservation administrator</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Reservations</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
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
                  <h3 class="card-title">Create a Reservation</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
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
                      <li><a class="customColor25" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor26" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor27" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor28" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor29" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor30" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor31" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor32" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor33" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor34" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor35" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor36" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor37" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="customColor38" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Reservation Title">

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
          <div class="col-md-9">
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
  <?php include(PATH . '/include/footer.php'); ?>
  <!-- ./wrapper -->
  <?php include(PATH . '/include/scripts.php'); ?>
</body>
</html>
