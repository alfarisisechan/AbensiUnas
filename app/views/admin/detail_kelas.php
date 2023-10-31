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
            <h2 class="fw-bold">Detail Kelas</h2>
            </div>
            <div class="col-md-3 col-12 mb-2"><button class="btn" type="button"
                    type="button" data-bs-toggle="modal" data-bs-target="#tambahDataModal" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">+ Tambah Data Detail Kelas</button></div>
            <div class="col-md-6"></div>
            <div class="col-md-3 col-12">
                <form action="<?= base_url; ?>/admin/cariDetailKelas" method="POST">
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
                <div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="tambahDataModal">Tambah Detail Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="<?= base_url; ?>/admin/tambah_detail_kelas" method="POST">
                        <div class="mb-3">
                                <label class="form-label">Nama Mata Kuliah</label>
                                <select name="kode_mk" id="kode_mk" class="form-select form-select-sm p-3"
                                aria-label=".form-select-sm example" required>
                                </select>
                        </div>
                        <div class="mb-3">
                                <label class="form-label">Kode Kelas</label>
                                <select name="kode_kelas" id="kode_kelas" class="form-select form-select-sm p-3"
                                aria-label=".form-select-sm example" required>
                                <option value="">Pilih Kode Kelas</option>
                                </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Dosen</label>
                            <select name="nid_dosen" id="nid_dosen" class="form-select form-select-sm p-3"
                            aria-label=".form-select-sm example" required>
                            <option value="">Pilih Nama Dosen</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Mahasiswa</label>
                            <select name="nim_mahasiswa" class="form-select form-select-sm p-3"
                            aria-label=".form-select-sm example" required>
                            <option value="">Pilih Nama Mahasiswa</option>
                            <?php foreach ($data['mahasiswa'] as $mahasiswa) :?>
                            <option value="<?= $mahasiswa['nim_mahasiswa'];?>|<?= $mahasiswa['nama_mahasiswa'];?>"><?= $mahasiswa['nim_mahasiswa'];?> - <?= $mahasiswa['nama_mahasiswa'];?></option>
                            <?php endforeach; ?>
                            </select>
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
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Nama Mata Kuliah</th>
                    <th scope="col">Nama Dosen</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <!-- <th scope="col">Ubah</th> -->
                    <th scope="col">Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['detail'] as $row) :?>
                <tr>
                    <td><?= $row['kode_kelas'];?></td>
                    <td><?= $row['nama_mk'];?></td>
                    <td><?= $row['nama_dosen'];?></td>
                    <td><?= $row['nama_mahasiswa'];?></td>
                    <!-- <td>
                    <a href="" class="btn" type="button"
                    type="button" data-bs-toggle="modal" data-bs-target="#ubahDataModal<?= $row['id_detail_kelas'];?>" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Ubah</a>
                    </td> -->
                    <td>
                    <a href="<?= base_url; ?>/admin/hapusDetailKelas/<?= $row['id_detail_kelas'] ?>" class="btn" type="button"
                            style="background: #A10035; color: white;">Hapus</a>
                    </td>
                </tr>
                <div class="modal fade" id="ubahDataModal<?= $row['id_detail_kelas'];?>" tabindex="-1" aria-labelledby="ubahDataModal<?= $row['id_detail_kelas'];?>" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 fw-bold" id="ubahDataModal">Ubah Kelas</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="edit<?= $row['id_detail_kelas'];?>">
                        <form id="formEdit<?= $row['id_detail_kelas'];?>" method="POST">
                        <input value="<?= $row['id_detail_kelas'];?>" name="id_detail_kelas" type="hidden" class="form-control" required>
                        <div class="mb-3">
                            <label class="form-label">Kode Kelas</label>
                            <input value="<?= $row['kode_kelas'];?>" name="kode_kelas" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <select name="kode_mk" class="form-select form-select-sm p-3"
                        aria-label=".form-select-sm example" required>
                        <option value="<?= $row['kode_mk'];?>|<?= $row['nama_mk'];?>"><?= $row['nama_mk'];?></option>
                        <?php foreach ($data['matakuliah'] as $matakuliah) :?>
                        <option value="<?= $matakuliah['kode_mk'];?>|<?= $matakuliah['nama_mk'];?>"><?= $matakuliah['nama_mk'];?></option>
                        <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama Dosen</label>
                        <select name="nid_dosen" class="form-select form-select-sm p-3"
                        aria-label=".form-select-sm example" required>
                        <option value="<?= $row['nid_dosen'];?>|<?= $row['nama_dosen'];?>"><?= $row['nama_dosen'];?></option>
                        <?php foreach ($data['dosen'] as $dosen) :?>
                        <option value="<?= $dosen['nid_dosen'];?>|<?= $dosen['nama_dosen'];?>"><?= $dosen['nama_dosen'];?></option>
                        <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label">Nama Mahasiswa</label>
                        <select name="nim_mahasiswa" class="form-select form-select-sm p-3"
                        aria-label=".form-select-sm example" required>
                        <option value="<?= $row['nim_mahasiswa'];?>|<?= $row['nama_mahasiswa'];?>"><?= $row['nim_mahasiswa'];?> - <?= $row['nama_mahasiswa'];?></option>
                        <?php foreach ($data['mahasiswa'] as $mahasiswa) :?>
                        <option value="<?= $mahasiswa['nim_mahasiswa'];?>|<?= $mahasiswa['nama_mahasiswa'];?>"><?= $mahasiswa['nim_mahasiswa'];?> - <?= $mahasiswa['nama_mahasiswa'];?></option>
                        <?php endforeach; ?>
                        </select>
                        </div>
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-success btn-lg" style="background: linear-gradient(90deg, rgba(6,190,182,1) 50%, rgba(72,177,191,1) 100%); border-color: transparent; color: white;">Simpan</button>
                            </div>
                        </form>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- <script type="text/javascript">
                                $("#edit<?= $row['id_detail_kelas'];?>").on("submit", "#formEdit<?= $row['id_detail_kelas'];?>", function() {
                                        $.ajax({
                                            url: '<?= base_url; ?>/admin/ubah_detail_kelas',
                                            type: 'post',
                                            data: $(this).serialize(),
                                            success: function(data) {
                                                window.location.reload();
                                            }
                                        });
                                    });
                                </script> -->
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
    <script type="text/javascript">
	$(document).ready(function(){
		var app = {
			show: function(){
				$.ajax({
					url: "<?= base_url; ?>/admin/showdata",
					method: "GET",
					success: function(data){
						$("#kode_mk").html(data)
					}
				})
			},
			tampil: function(){
				var kodeMK = $(this).val();
				$.ajax({
					url: "<?= base_url; ?>/admin/data",
					method: "POST",
					data: {kodeMK: kodeMK},
					success: function(data){
						$("#kode_kelas").html(data)
					}
				})
			},
            tampilDosen: function(){
                var kodeMK = $("#kode_mk").val();
                var kodeKelas = $("#kode_kelas").val();
				$.ajax({
					url: "<?= base_url; ?>/admin/dataDosen",
					method: "POST",
					data: {kodeMK: kodeMK, kodeKelas: kodeKelas},
					success: function(data){
						$("#nid_dosen").html(data)
					}
				})
			}
		}
		app.show();
		$(document).on("change", "#kode_mk", app.tampil)
        $(document).on("change", "#kode_kelas", app.tampilDosen)
	})
</script>
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