<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion " id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=dashboard ">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
            <?php
            if ($_SESSION['role'] == 'admin') {
                echo "E-Learning <br> Admin";
            } else if ($_SESSION['role'] == 'guru') {
                echo "E-Learning <br> Guru";
            } else if ($_SESSION['role'] == 'siswa') {
                echo "E-Learning <br> Siswa";
            }
            ?>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    if ($_SESSION['role'] == "admin") {
    ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=kelas">
                <i class="fas fa-fw fa-home"></i>
                <span>Kelas</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=siswa">
                <i class="fas fa-fw fa-user"></i>
                <span>Siswa</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=guru">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Guru</span></a>
        </li>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="index.php?page=mapel">
                <i class="fas fa-fw fa-book"></i>
                <span>Mata Pelajaran</span></a>
        </li>


    <?php
    }
    ?>




    <?php
    if ($_SESSION['role'] == "guru") {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Dashboard</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=rekapnilai">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Rekap Nilai</span></a>
        </li>
        <hr class="sidebar-divider my-0">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Mata Pelajaran</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">List Mata Pelajaran :</h6>
                    <?php
                    $datas = '';
                    $nip = $_SESSION['username'];
                    $ck = mysqli_query($koneksi, "SELECT id_guru FROM guru WHERE nip = $nip ");
                    while ($row = mysqli_fetch_row($ck)) {
                        $datas = $row[0];
                    }
                    $query = mysqli_query($koneksi, "SELECT *,kelas.nama_kelas FROM mata_pelajaran INNER JOIN kelas ON kelas.id_kelas = mata_pelajaran.id_kelas WHERE id_guru = $datas");
                    while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <!-- <a class="collapse-item" onclick="document.getElementById('<?php echo $row['id_mapel']; ?>').submit();"><?php echo $d['nama_mapel']; ?></a> -->
                        <a class="collapse-item" href="index.php?page=mapel&id_mapel=<?php echo $d['id_mapel'];  ?>"><?php echo $d['nama_mapel'] . " - " . $d['nama_kelas']; ?></a>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </li>
    <?php
    }
    ?>

    <!-- Ini sidebar siswa -->
    <?php
    if ($_SESSION['role'] == "siswa") {
    ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=dashboard">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Mata Pelajaran</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                </div>
            </div>
        </li>
    <?php
    }
    ?>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>