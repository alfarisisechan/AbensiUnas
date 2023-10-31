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
 <div class="container p-5" style=" height: 896px;">
        <div class="row">
            <div class="col-md-6 p-4" style="background-color: #115173; border-radius: 20px;">
                <h1 class="text-center fw-bold text-white">Foto Absensi</h1>
                    <div class="my_camera text-center" id="my_camera"></div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" onClick="take_snapshot()" class="btn btn-success btn-lg"
                            style="background: #FCE38A; color: #022C43; border-color: transparent;">Ambil Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url; ?>/dist/js/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 260,
            height: 300,
            align:'center',
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function (data_uri) {
                Webcam.upload(data_uri, '<?= base_url; ?>/mahasiswa/simpan_bukti', function (code, text, Name) {
                    window.location.href = '<?= base_url; ?>/Mahasiswa/cek_status_absensi';  
                });
            });
        }
    </script>
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
        <div class="row">
        <div class="col-md-6">
                <img src="<?= base_url; ?>/dist/image/Webcam.png" alt="Selfie" class="img-fluid d-inline-block">
        </div>
            <div class="col-md-6">
                <h1 class="text-center fw-bold mb-2 text-white">Foto Absensi</h1>
                    <div class="my_camera mt-3" id="my_camera2"></div>
                    <div class="d-grid gap-2 mt-4">
                        <button type="submit" onClick="take_snapshot2()" class="btn btn-success btn-lg"
                            style="background: #FCE38A; color: #022C43; border-color: transparent;">Ambil Foto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url; ?>/dist/js/webcam.min.js"></script>
    <script language="JavaScript">
        Webcam.set({
            width: 600,
            height: 360,
            align:'center',
            image_format: 'jpeg',
            jpeg_quality: 100
        });
        Webcam.attach('#my_camera2');

        function take_snapshot2() {
            Webcam.snap(function (data_uri) {
                Webcam.upload(data_uri, '<?= base_url; ?>/mahasiswa/simpan_bukti', function (code, text, Name) {
                    window.location.href = '<?= base_url; ?>/Mahasiswa/cek_status_absensi';  
                });
            });
        }
    </script>
</div>