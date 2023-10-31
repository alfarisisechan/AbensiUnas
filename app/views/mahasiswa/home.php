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
    <div class="container p-4" style="background-color: #115173; height: 896px;">
        <?php
            Flasher::Message();
        ?>
        <h3 class="text-white text-center mb-5 mt-3 fw-bold">Selamat Datang di Aplikasi Absensi</h3>
        <div class="row">
            <div class="col-6">
                <div class="card mb-4">
                    <img src="<?= base_url; ?>/dist/image/Absensi.png" class="img-fluid p-4" alt="...">
                    <div class="card-body text-center" style="background: #FCE38A;">
                        <div class="d-grid gap-2">
                            <a href="<?= base_url; ?>/Mahasiswa/Absensi" type="submit" class="btn btn-sm fw-bold" style="color: #022C43; border-color: transparent;">Mulai Absensi</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
            <div class="card">
                <img src="<?= base_url; ?>/dist/image/UbahPassword.png" class="card-img-top p-4" alt="...">
                <div class="card-body text-center" style="background: #FCE38A;">
                    <div class="d-grid gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#ubahPasswordModal" class="btn btn-sm fw-bold" style="color: #022C43; border-color: transparent;">Ubah Password</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-6 mb-4">
            <div class="card">
                <img src="<?= base_url; ?>/dist/image/JadwalPribadi.png" class="card-img-top p-4" alt="...">
                <div class="card-body text-center" style="background: #FCE38A;">
                    <div class="d-grid gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#jadwalPribadiModal" class="btn btn-sm fw-bold" style="color: #022C43; border-color: transparent;">Jadwal Pribadi</button>
                    </div>
                </div>
            </div>
            </div>
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
    <div class="container p-5 mt-4" style="background-color: #115173; border-radius: 40px;">
        <?php
            Flasher::Message();
        ?>
        <h3 class="text-white mb-5 fw-bold">Selamat Datang di Aplikasi Absensi</h3>
        <div class="row">
            <div class="col-md-4">
            <div class="card" style="border-radius: 40px; width: 20rem;">
                <img src="<?= base_url; ?>/dist/image/Absensi.png" class="card-img-top p-5" alt="...">
                <div class="card-body text-center" style="background: #FCE38A; border-radius: 40px;">
                    <div class="d-grid gap-2">
                        <a href="<?= base_url; ?>/Mahasiswa/Absensi" type="submit" class="btn btn-lg" style="color: #022C43; border-color: transparent;">Mulai Absensi</a>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card" style="border-radius: 40px; width: 20rem;">
                <img src="<?= base_url; ?>/dist/image/UbahPassword.png" class="card-img-top p-5" alt="...">
                <div class="card-body text-center" style="background: #FCE38A; border-radius: 40px;">
                    <div class="d-grid gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#ubahPasswordModal" class="btn btn-lg" style="color: #022C43; border-color: transparent;">Ubah Password</button>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="card" style="border-radius: 40px; width: 20rem;">
                <img src="<?= base_url; ?>/dist/image/JadwalPribadi.png" class="card-img-top p-5" alt="...">
                <div class="card-body text-center" style="background-color: #FCE38A; border-radius: 40px;">
                    <div class="d-grid gap-2">
                        <button type="submit" data-bs-toggle="modal" data-bs-target="#jadwalPribadiModal" class="btn btn-lg" style="color: #022C43; border-color: transparent;">Jadwal Pribadi</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="ubahPasswordModal" tabindex="-1" aria-labelledby="ubahPasswordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="ubahPasswordModal">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="<?= base_url; ?>/mahasiswa/ubah_password" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color: black;">Password Baru</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg" style="background-color: #115173; border-color: transparent; color: white;">Ubah Password</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="jadwalPribadiModal" tabindex="-1" aria-labelledby="jadwalPribadiModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="jadwalPribadiModal">Jadwal Pribadi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Kode Kelas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i= 1; foreach($data['jadwal'] as $row) :?>
                    <tr>
                    <th scope="row"><?= $i++;?></th>
                    <td><?= $row['nama_mk'];?></td>
                    <td><?= $row['kode_kelas'];?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>
                </div>
            </div>
        </div>