<?php
            Flasher::Message();
        ?>
<div class="d-block d-md-none">
<nav class="navbar navbar-expand-md" style="background-color: #115173;">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="<?= base_url; ?>/dist/image/Unas.png" alt="Logo"
                    width="auto" height="60"></a>
            <button class="navbar-toggler ms-auto bg-white" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseNavbar" style="border: none;">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav ms-auto">
                    <?php foreach ($data['mahasiswa'] as $row) :?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;"><?= $row['nama_mahasiswa'];?></a>
                    </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;" href="<?= base_url; ?>/Auth/Logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-5" style="height: 896px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-4"  style="background-color: #115173; border-radius: 20px;">
            <h1 class="text-center fw-bold mb-5 text-white">Absensi berhasil</h1>
            <img src="<?= base_url; ?>/dist/image/Success.png" alt="Home" class="img-fluid d-inline-block">
                    <div class="d-grid gap-2 mt-2">
                        <a href="<?= base_url; ?>/Auth/Logout" class="btn btn-success btn-lg" style="background: #FCE38A; color: #022C43; border-color: transparent;">Logout</a>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>

<div class="d-none d-md-block">
<nav class="navbar navbar-expand-md" style="background-color: #115173;">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="<?= base_url; ?>/dist/image/Unas.png" alt="Logo"
                    width="auto" height="60"></a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="collapseNavbar">
                <ul class="navbar-nav ms-auto">
                    <?php foreach ($data['mahasiswa'] as $row) :?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;"><?= $row['nama_mahasiswa'];?></a>
                    </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;" href="<?= base_url; ?>/Auth/Logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-5 mt-5" style="background-color: #115173; border-radius: 40px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <h1 class="text-center fw-bold mb-5 text-white">Absensi berhasil</h1>
            <img src="<?= base_url; ?>/dist/image/Success.png" alt="Home" class="img-fluid d-inline-block">
                    <div class="d-grid gap-2 mt-2">
                        <a href="<?= base_url; ?>/Auth/Logout" class="btn btn-success btn-lg" style="background: #FCE38A; color: #022C43; border-color: transparent;">Logout</a>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
</div>