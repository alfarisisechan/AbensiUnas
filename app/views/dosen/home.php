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
                    <?php foreach ($data['dosen'] as $row) :?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;"><?= $row['nama_dosen'];?></a>
                    </li>
                    <?php endforeach ?>
                    <li class="nav-item">
                        <a href="" class="nav-link fw-bold" style="color: white;" data-bs-toggle="modal" data-bs-target="#ubahPasswordModal">Ubah Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;" href="<?= base_url; ?>/Auth/Logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-4 mt-5" style="background: white;">
        <?php
            Flasher::Message();
        ?>
        <div class="modal fade" id="ubahPasswordModal" tabindex="-1" aria-labelledby="ubahPasswordModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="ubahPasswordModal">Ubah Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit">
                        <form method="POST" id="formEdit">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label" style="color: black;">Password Baru</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" class="btn btn-success btn-lg" style="border-color: transparent; background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);">Ubah Password</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
        <div class="row mb-2 mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-5">
                <img class="mt-3 img-fluid me-5" src="<?= base_url; ?>/dist/image/Dosen.png">
            </div>
            <div class="col-md-5">
            <div class="container">
                <h2 class="text-center mb-4 mt-3">Absensi Mahasiswa</h2>
                <form class="row g-2 align-items-center" action="<?= base_url; ?>/dosen/carimhsmk" method="POST">
                    <div class="col-12">
                        <select name="kode_mk" class="form-select" required>
                            <option value="">Pilih Mata Kuliah</option>
                            <?php foreach ($data['matakuliah'] as $rows) :?>
                            <option value="<?= $rows['kode_mk'];?>|<?= $rows['nama_mk'];?>"><?= $rows['nama_mk'];?></option>
                            <?php endforeach; ?>
                        </select>
                        <input name="nid" type="hidden" value="<?= $row['nid_dosen'];?>">
                    </div>
                    <div class="col-auto">
                        <label class="col-form-label">Tanggal</label>
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required pattern="\d{2}-\d{2}-\d{4}">
                    </div>
                    <div class="col-auto align-items-center">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required pattern="\d{2}-\d{2}-\d{4}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-outline-light"
                            style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);">Pilih</button>
                    </div>
                </form>
                <!-- <form class="row g-2" action="<?= base_url; ?>/dosen/cariMhs" method="POST">
                    <div class="col-md-10 col-10">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari Nim / Nama Mahasiswa" required>
                    </div>
                    <div class="col-md-2 col-2">
                        <button class="btn btn-outline-light" type="submit"
                                style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);">Cari</button>
                    </div>
                </form> -->
                </div>
            </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $("#edit").on("submit", "#formEdit", function() {
                $.ajax({
                    url: '<?= base_url; ?>/dosen/ubah_password',
                    type: 'post',
                    data: $(this).serialize(),
                    success: function(data) {
                        window.location.reload();
                    }
                });
            });
    </script>

