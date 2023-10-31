<nav class="navbar navbar-expand-md" style="background-color: #115173;">
        <div class="container">
            <a class="navbar-brand" href="#"> <img src="<?= base_url; ?>/dist/image/Unas.png" alt="Logo" width="auto"
                    height="60"></a>
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
                    <?php endforeach; ?>
                    <li class="nav-item">
                        <a href="" class="nav-link fw-bold" style="color: white;" data-bs-toggle="modal" data-bs-target="#ubahPasswordModal" >Ubah Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" style="color: white;" href="<?= base_url; ?>/Auth/Logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container p-5 mt-5" style="background: white;">
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
                <form id="formEdit" method="POST">
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
        <div class="row mb-3">
            <div class="col-12 mb-2">
                <h3><?= $data['namaMK'] ?></h3>
            </div>
            <div class="col-md-7">
                <form class="row g-2" action="<?= base_url; ?>/dosen/carimhsmk" method="POST">
                    <div class="col-9 col-md-auto">
                        <select name="kode_mk" class="form-select" aria-label="Default select example" required>
                            <option value="">Pilih Mata Kuliah</option>
                            <?php foreach ($data['matakuliah'] as $rows) :?>
                            <option value="<?= $rows['kode_mk'];?>|<?= $rows['nama_mk'];?>"><?= $rows['nama_mk'];?></option>
                            <?php endforeach; ?>
                        </select>
                        <input name="nid" type="hidden" value="<?= $row['nid_dosen'];?>">
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="dari" required>
                    </div>
                    <div class="col-auto align-items-center">
                        -
                    </div>
                    <div class="col-auto">
                        <input type="date" class="form-control" name="ke" required>
                    </div>
                    <div class="col-3 col-md-auto">
                        <button type="submit" class="btn btn-outline-light mb-3"
                            style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);">Pilih</button>
                    </div>
                </form>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <form class="row g-2" action="<?= base_url; ?>/dosen/carimhs" method="POST">
                    <div class="input-group mb-3 col-9 col-md-auto">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari Nim / Nama Mahasiswa"
                            aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <div class="input-group-append ms-2 col-3 col-md-auto">
                            <button class="btn btn-outline-light" type="submit"
                                style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-8"></div>
            <div class="col-md-4"><a href="<?= base_url; ?>/dosen/export" class="btn btn-dark float-end btn-block" type="submit" style="background: #115173; border-color: #115173; ">Download Rekap Data</a></div>
        </div>
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr class="fw-bold">
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Jarak</th>
                    <th class="text-center" scope="col">Bukti Foto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Edit</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data['MhsKodeMK'] as $rowss) :?>
                <tr>
                    <td><?= $rowss['nama_mk'];?></td>
                    <td><?= $rowss['kode_kelas'];?></td>
                    <td><?= $rowss['nim_mahasiswa'];?></td>
                    <td><?= $rowss['nama_mahasiswa'];?></td>
                    <td><?= $rowss['tanggal'];?></td>
                    <td><?= $rowss['jam'];?></td>
                    <td><?= $rowss['jarak'];?></td>
                    <td class="text-center"><img data-bs-toggle="modal" data-bs-target="#BuktiModal<?= $rowss['kode_absensi'];?>" height="100" width="auto"
                            src="<?= base_url; ?>/image/bukti_kehadiran/<?= $rowss['bukti_absensi'];?>"></td>
                            <td><?= $rowss['status_absensi'];?></td>
                    <td><button class="btn btn-outline-light" type="button"
                            style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%);" data-bs-toggle="modal" data-bs-target="#ubahStatusModal<?= $rowss['kode_absensi'];?>">Edit</button>
                    </td>
                </tr>
                <div class="modal fade" id="ubahStatusModal<?= $rowss['kode_absensi'];?>" tabindex="-1" aria-labelledby="ubahStatusModal<?= $rowss['kode_absensi'];?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="ubahStatusModal"><?= $rowss['nama_mahasiswa'];?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="edit<?= $rowss['kode_absensi'];?>">
                        <form method="POST" id="formEdit<?= $rowss['kode_absensi'];?>">
                        <input name="kode_absensi" type="hidden" value="<?= $rowss['kode_absensi'];?>">
                        <input name="nim" type="hidden" value="<?= $rowss['nim_mahasiswa'];?>">
                        <input name="kode_mk" type="hidden" value="<?= $rowss['kode_mk'];?>">
                        <select name="status" class="form-select form-select-sm text-center p-3 mb-4 fw-bold"
                        aria-label=".form-select-sm example" required>
                        <option value="<?= $rowss['status_absensi'];?>"><?= $rowss['status_absensi'];?></option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                        </select>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Ubah Kehadiran</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="BuktiModal<?= $rowss['kode_absensi'];?>" tabindex="-1" aria-labelledby="BuktiModal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered"">
                        <div class="modal-content">
                        <img class="w-100" src="<?= base_url; ?>/image/bukti_kehadiran/<?= $rowss['bukti_absensi'];?>">
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                        $("#edit<?= $rowss['kode_absensi'];?>").on("submit", "#formEdit<?= $rowss['kode_absensi'];?>", function() {
                                $.ajax({
                                    url: '<?= base_url; ?>/dosen/ubah_kehadiran',
                                    type: 'post',
                                    data: $(this).serialize(),
                                    success: function(data) {
                                        window.location.reload();
                                    }
                                });
                            });
                </script>
                <?php endforeach; ?>
            </tbody>
        </table>
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