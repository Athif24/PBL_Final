
<aside class="main-sidebar sidebar-dark-primary elevation-4" >
      <!-- Brand Logo -->
      <a class="brand-link">
        <img src="dist/img/polinema.png" alt="PolinemaLogo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Survey Polinema</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
          <div class="info">
          <a class="d-block" style="font-size:20px"><?php echo $_SESSION['username']?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link <?php echo ($menu == 'index')? 'active':'' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="survey.php" class="nav-link <?php echo ($menu == 'survey')? 'active':'' ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Survey
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bank_soal.php" class="nav-link <?php echo ($menu == 'bank_soal')? 'active':'' ?>">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Bank Soal
                </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="data_user.php" class="nav-link <?php echo ($menu == 'data_user')? 'active' : '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link <?php echo ($menu == 'kategori')? 'active' : '' ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Kategori Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Responden
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="t_responden_dosen.php" class="nav-link <?php echo ($menu == 't_responden_dosen')? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Dosen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="jawaban_mahasiswa.php" class="nav-link <?php echo ($menu == 't_responden_mahasiswa')? 'active' : '' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TenagaPendidik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Orang Tua</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-sidebar-custom.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Alumni</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="../layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>industri</p>
                  </a>
                </li>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>