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
        <div class="row mt-2">
            <div class="col-md-4"></div>
            <div class="col-md-4 p-4" style="background-color: #115173; border-radius: 20px;">
             <h1 class="text-center fw-bold mb-4 text-white">Pilih Mata Kuliah</h1>
                <img src="<?= base_url; ?>/dist/image/MataKuliah.png" alt="Home" class="img-fluid d-inline-block">
                <?php foreach ($data['mahasiswa'] as $row) :?>
                <form id="check" action="<?= base_url; ?>/mahasiswa/pilih_kelas" method="POST">
                    <select name="kode_mk" class="form-select form-select-sm text-center p-3 mb-4 fw-bold"
                        aria-label=".form-select-sm example" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php foreach ($data['matakuliah'] as $rows) :?>
                        <option value="<?= $rows['kode_mk'];?>|<?= $rows['nama_mk'];?>"><?= $rows['nama_mk'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" value="<?= $row['nama_mahasiswa'];?>" name="nama">
                    <input type="hidden" value="<?= $row['nim_mahasiswa'];?>" name="nim">
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-success btn-lg"
                            style="background: #FCE38A; color: #022C43; border-color: transparent;">Selanjutnya</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php endforeach ?>
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
             <h1 class="text-center fw-bold mb-4 text-white">Pilih Mata Kuliah</h1>
                <img src="<?= base_url; ?>/dist/image/MataKuliah.png" alt="Home" class="img-fluid d-inline-block">
                <?php foreach ($data['mahasiswa'] as $row) :?>
                <form id="check" action="<?= base_url; ?>/mahasiswa/pilih_kelas" method="POST">
                    <select name="kode_mk" class="form-select form-select-sm text-center p-3 mb-4 fw-bold"
                        aria-label=".form-select-sm example" required>
                        <option value="">Pilih Mata Kuliah</option>
                        <?php foreach ($data['matakuliah'] as $rows) :?>
                        <option value="<?= $rows['kode_mk'];?>|<?= $rows['nama_mk'];?>"><?= $rows['nama_mk'];?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" value="<?= $row['nama_mahasiswa'];?>" name="nama">
                    <input type="hidden" value="<?= $row['nim_mahasiswa'];?>" name="nim">
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" class="btn btn-success btn-lg"
                            style="background: #FCE38A; color: #022C43; border-color: transparent;">Selanjutnya</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <?php endforeach ?>
    </div>
