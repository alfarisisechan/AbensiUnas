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
        <div class="row mb-3">
            <div class="col-md-12 col-12">
            <h2 class="fw-bold">Data User</h2>
            </div>
            <div class="col-md-3 col-12 mb-2"><button class="btn" type="button"
                    type="button" data-bs-toggle="modal" data-bs-target="#tambahDataModal" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">+ Tambah Data User</button></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 col-12">
                <form action="<?= base_url; ?>/admin/cariUser" method="POST">
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
    <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal<?= $row['username'];?>"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="tambahDataModal">Tambah Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url; ?>/admin/tambah_data_user" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input name="password" type="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih Role</label>
                            <select name="role" class="form-select form-select-sm p-3 fw-bold"
                                aria-label=".form-select-sm example" required>
                                <option value="">Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success btn-lg"
                                style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
         <?php
            $awal = microtime(true);
            $host = "localhost";
            $username = "root";
            $password = "";
            $db = "absensi_db";
            $db_link = mysqli_connect($host,$username,$password,$db);
            $cari = $_POST['keyword'];
            if(isset($_GET['keyword'])) {
                $result = mysqli_query($db_link, "SELECT * FROM user_tbl WHERE username = '.$cari.'");
            } else {
                $result = mysqli_query($db_link, "SELECT * FROM user_tbl");
            }
            $array = array();
            while ($data = mysqli_fetch_assoc($result))
            {
                $array[] = $data;
            }
                $ketemu = false;
                $datas = explode("  ", $cari);
                for ($i = 0; $i < count($datas); $i+=1) {
                    for ($j = 0; $j < count($array); $j+=1) {
                    if($array[$j]['username'] == $datas[$i]) { ?>
                                    <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="fw-bold">
                                <th scope="col">Username</th>
                                <th scope="col">Role</th>
                                <th scope="col">Ubah</th>
                                <th scope="col">Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?php echo $array[$j]['username']; ?></td>
                            <td><?php echo $array[$j]['role']; ?></td>
                            <td>
                                <a href="" class="btn" type="button" type="button" data-bs-toggle="modal"
                                    data-bs-target="#ubahDataModal<?= $array[$j]['username'];?>"
                                    style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Ubah</a>
                            </td>
                            <td>
                                <a href="<?= base_url; ?>/admin/hapus/<?= $array[$j]['username'] ?>" class="btn" type="button"
                                    style="background: #A10035; color: white;">Hapus</a>
                            </td>
                        </tr>
    <div class="modal fade" id="ubahDataModal<?= $array[$j]['username'];?>" tabindex="-1"
        aria-labelledby="ubahDataModal<?= $array[$j]['username'];?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold" id="ubahDataModal">Ubah Data User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="edit<?= $array[$j]['id_user'];?>">
                    <form id="formEdit<?= $array[$j]['id_user'];?>" method="POST">
                        <input name="id" value="<?= $array[$j]['id_user'];?>" type="hidden" class="form-control" required>
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input value="<?= $array[$j]['username'];?>" name="username" type="text" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input value="<?= $array[$j]['password'];?>" name="password" type="password" class="form-control"
                                required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih Role</label>
                            <select name="role" class="form-select form-select-sm p-3 fw-bold"
                                aria-label=".form-select-sm example" required>
                                <option value="">Pilih Role</option>
                                <option value="Admin">Admin</option>
                                <option value="Dosen">Dosen</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                            </select>
                        </div>
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" class="btn btn-success btn-lg"
                                style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </tbody>
    </table>
    </div>
    <script type="text/javascript">
                    $("#edit<?= $array[$j]['id_user'];?>").on("submit", "#formEdit<?= $array[$j]['id_user'];?>", function() {
                            $.ajax({
                                url: '<?= base_url; ?>/admin/ubah_data_user',
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
                    }
                    $akhir = microtime(true);
                    $lama = $akhir - $awal;
                    $hasil = number_format($lama * 1000,4);
                    echo "<h3>Lama eksekusi adalah: <b>".$hasil." </b>Detik</h3>";
                    if(!$ketemu) { ?>
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