
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
              <i class="nav-icon fas fa-poll-h"></i>
                <p>
                  Survey
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="bank_soal.php" class="nav-link <?php echo ($menu == 'bank_soal')? 'active':'' ?>">
              <i class="nav-icon fas fa-question-circle"></i>
                <p>
                  Survey Soal
                </p>
              </a>
            </li>
            <li class="nav-item">
            <a href="data_user.php" class="nav-link <?php echo ($menu == 'data_user')? 'active' : '' ?>">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="kategori.php" class="nav-link <?php echo ($menu == 'kategori')? 'active' : '' ?>">
              <i class="nav-icon fas fa-filter"></i>
              <p>
                Kategori Soal
              </p>
            </a>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="nav-icon fas fa-reply-all"></i>
                <p>
                  Responden
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right">6</span>
                </p>
              </a>
              <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="responden_dosen.php" class="nav-link <?php echo ($menu == 't_responden_dosen')? 'active' : '' ?>">
              <i class="nav-icon fas fa-chalkboard-teacher"></i>
                    <p>Dosen</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="responden_mahasiswa.php" class="nav-link <?php echo ($menu == 't_responden_mahasiswa')? 'active' : '' ?>">
                  <i class="nav-icon fas fa-user-graduate"></i>
                    <p>Mahasiswa</p>
                    </a>
                </li>
                <li class="nav-item">
                  <a href="responden_tendik.php" class="nav-link <?php echo ($menu == 't_responden_tendik')? 'active' : '' ?>">
                  <i class="nav-icon fas fa-university"></i>
                    <p>Tenaga Pendidik</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="responden_ortu.php" class="nav-link <?php echo ($menu == 't_responden_ortu')? 'active' : '' ?>">
                  <i class="nav-icon fas fa-male"></i>
                    <p>Orang Tua</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="responden_alumni.php" class="nav-link  <?php echo ($menu == 't_responden_alumni')? 'active' : '' ?>">
                  <i class="nav-icon fas fa-medal"></i>
                    <p>Alumni</small></p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="responden_industri.php" class="nav-link  <?php echo ($menu == 't_responden_industri')? 'active' : '' ?>">
                  <i class="nav-icon fas fa-industry"></i>
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