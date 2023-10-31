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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/mahasiswa">Data Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/dosen">Data Dosen</a></li>
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/">Data User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-bold" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Program
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/matakuliah">Mata Kuliah</a></li>
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/kelas">Kelas</a></li>
                            <li><a class="dropdown-item" href="<?= base_url; ?>/admin/detailkelas">Detail Kelas</a></li>
                        </ul>
                    </li>
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
                <div class="modal-body" id="ubahpassword">
                        <form method="POST" id="formubahpassword">
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
            <div class="col-md-12 col-12">
            <h2 class="fw-bold">Data Mahasiswa</h2>
            </div>
            <div class="col-md-3 col-12 mb-2"><button class="btn" type="button"
                    type="button" data-bs-toggle="modal" data-bs-target="#tambahDataModal" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">+ Tambah Data Mahasiswa</button></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 col-12">
                <form action="<?= base_url; ?>/admin/cariMahasiswa" method="POST">
                    <div class="input-group mb-3">
                        <input name="keyword" type="text" class="form-control" placeholder="Cari Data" required>
                        <div class="input-group-append ms-2">
                            <button class="btn" type="submit"
                                style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal<?= $row['username'];?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="tambahDataModal">Tambah Data Mahasiswa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="<?= base_url; ?>/admin/tambah_data_mahasiswa" method="POST">
                        <div class="mb-3">
                            <label class="form-label">NIM</label>
                            <input name="nim" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input name="nama" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" required>
                            <input name="role" value="Mahasiswa" type="hidden" class="form-control" required>
                        </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Simpan</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                <thead>
                    <tr class="fw-bold">
                        <th scope="col">NIM</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Ubah</th>
                        <th scope="col">Hapus</th>
                    </tr>
                </thead>
                <?php 
            $host = "localhost";
            $username = "root";
            $password = "";
            $db = "absensi_db";
            $db_link = mysqli_connect($host,$username,$password,$db);
            $cari = $_POST['keyword'];
            if(isset($_GET['keyword'])) {
                $result = mysqli_query($db_link, "SELECT * FROM mahasiswa_tbl WHERE nim_mahasiswa = '.$cari.' OR nama_mahasiswa = '.$cari.'");
            } else {
                $result = mysqli_query($db_link, "SELECT * FROM mahasiswa_tbl");
            }
            $array = array();
            while ($data = mysqli_fetch_assoc($result))
            {
                $array[] = $data;
            }
                $ketemu = false;
                $datas = explode("  ", $cari);
                for ($i = 0; $i < count($datas); $i++) {
                    for ($j = 0; $j < count($array); $j++) {
                    while($array[$j]['nim_mahasiswa'] == $datas[$i] || $array[$j]['nama_mahasiswa'] == $datas[$i]) { ?>
                <tbody>
                    <tr>
                        <td><?= $array[$j]['nim_mahasiswa'];?></td>
                        <td><?= $array[$j]['nama_mahasiswa'];?></td>
                        <td>
                        <a href="" class="btn" type="button"
                        type="button" data-bs-toggle="modal" data-bs-target="#ubahDataModal<?= $array[$j]['id_mahasiswa'];?>" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Ubah</a>
                        </td>
                        <td>
                        <a href="<?= base_url; ?>/admin/hapusMahasiswa/<?= $array[$j]['nim_mahasiswa'] ?>" class="btn" type="button"
                                style="background: #A10035; color: white;">Hapus</a>
                        </td>
                    </tr>
                    <div class="modal fade" id="ubahDataModal<?= $array[$j]['id_mahasiswa'];?>" tabindex="-1" aria-labelledby="ubahDataModal<?= $row['username'];?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 fw-bold" id="ubahDataModal">Ubah Data Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="edit<?= $array[$j]['id_mahasiswa'];?>">
                            <form id="formEdit<?= $array[$j]['id_mahasiswa'];?>" method="POST">
                            <input name="id" value="<?= $array[$j]['id_mahasiswa'];?>" type="hidden" class="form-control" required>
                            <div class="mb-3">
                                <label class="form-label">NIM</label>
                                <input value="<?= $array[$j]['nim_mahasiswa'];?>" name="username" type="text" class="form-control" readonly required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap</label>
                                <input value="<?=$array[$j]['nama_mahasiswa'];?>" name="nama" type="text" class="form-control" required>
                            </div>
                                <div class="d-grid gap-2 mt-4">
                                    <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Simpan</button>
                                </div>
                            </form>
                            </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                    $("#edit<?= $array[$j]['id_mahasiswa'];?>").on("submit", "#formEdit<?= $array[$j]['id_mahasiswa'];?>", function() {
                            $.ajax({
                                url: '<?= base_url; ?>/admin/ubah_data_mahasiswa',
                                type: 'post',
                                data: $(this).serialize(),
                                success: function(data) {
                                    window.location.reload();
                                }
                            });
                        });
                </script>
            <?php
                        $ketemu = true;
                        break;
                            } 
                        }
                    } ?>
                                    </tbody>
            </table>
            </div>
                    <?php if(!$ketemu) { ?>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                        <h1 class="text-center fw-bold mb-4 text-dark">Data tidak ditemukan!</h1>
                        <img src="<?= base_url; ?>/dist/image/Empty.png" alt="Home" class="img-fluid d-inline-block mb-3">
                        </div>
                        <div class="col-md-2"></div>
                        </div>
                    <?php }
                ?>
    </div>
    <script type="text/javascript">
                                $("#ubahpassword").on("submit", "#formubahpassword", function() {
                                        $.ajax({
                                            url: '<?= base_url; ?>/admin/ubah_password',
                                            type: 'post',
                                            data: $(this).serialize(),
                                            success: function(data) {
                                                window.location.reload();
                                            }
                                        });
                                    });
                                </script>