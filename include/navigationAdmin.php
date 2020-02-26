<!-- TOP Navbar -->
<nav class="main-header navbar navbar-expand navbar-purple navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="<?=ROOTPATH?>/include/sessionUnset.php" class="nav-link"><p class="whiteFont">Log out</p></a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?=ROOTPATH?>/administration/index.php" class="brand-link" style="text-align: center">
    <span class="brand-text font-weight-light" >Apartmani Babe Admin</span>
  </a>

  <!-- LEFT Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/apartment1.php" id="ap1" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Apartment 1 - 1/3
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/apartment2.php" id="ap2" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Apartment 2 - 1/4
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/apartment3.php" id="ap3" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Apartment 1 - 1/5
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/apartment4.php" id="ap4" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Studio - 1/3
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/apartment5.php" id="ap5" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Apartment 5 - 1/3
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?=ROOTPATH?>/administration/index.php" id="ap0" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              All apartments
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
        <li class="nav-item d-sm-none">
          <a href="<?=ROOTPATH?>/include/sessionUnset.php" class="nav-link">
            <i class="nav-icon far fa-user"></i>
            <p>
              Log out
              <span class="badge badge-info right"></span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
