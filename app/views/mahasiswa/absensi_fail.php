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
    <?php
            Flasher::Message();
        ?>
        <div class="row mt-2">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <div class="col-md-4 p-4" style="background-color: #115173; border-radius: 20px;">
            <h4 class="text-center fw-bold text-white">Lokasi Anda Terlalu Jauh Dari Gedung Kampus</h4>
            <img src="<?= base_url; ?>/dist/image/HomeFail.png" alt="Home" class="img-fluid d-inline-block mb-2">
                <?php foreach ($data['mahasiswa'] as $row) :?>
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" onclick="getLocation()" class="btn btn-success btn-lg" style="background: #FCE38A; color: #022C43; border-color: transparent;">Cek Lokasi Kembali</button>
                    </div>
            </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <form id="check" action="<?= base_url; ?>/Mahasiswa/cek_lokasi" method="POST">
        <input type="hidden" id="longitude" name="longitude">
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" value="<?= $row['nama_mahasiswa'];?>" name="nama">
        <input type="hidden" value="<?= $row['nim_mahasiswa'];?>" name="nim">
    </form>
    <?php endforeach ?>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
            if (position.coords.latitude !== 'NULL' && position.coords.longitude !== 'NULL') {
                document.getElementById("check").submit();
            }
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
<div class="container p-3 mt-4 mb-4" style="background-color: #115173; border-radius: 40px;">
    <?php
            Flasher::Message();
        ?>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
            <h3 class="text-center fw-bold text-white">Lokasi Anda Terlalu Jauh Dari Gedung Kampus</h3>
            <img src="<?= base_url; ?>/dist/image/HomeFail.png" alt="Home" class="img-fluid d-inline-block mb-2">
                <?php foreach ($data['mahasiswa'] as $row) :?>
                    <div class="d-grid gap-2 mt-2">
                        <button type="submit" onclick="getLocation()" class="btn btn-success btn-lg" style="background: #FCE38A; color: #022C43; border-color: transparent;">Cek Lokasi Kembali</button>
                    </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <form id="check" action="<?= base_url; ?>/Mahasiswa/cek_lokasi" method="POST">
        <input type="hidden" id="longitude" name="longitude">
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" value="<?= $row['nama_mahasiswa'];?>" name="nama">
        <input type="hidden" value="<?= $row['nim_mahasiswa'];?>" name="nim">
    </form>
    <?php endforeach ?>
    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            document.getElementById("latitude").value = position.coords.latitude;
            document.getElementById("longitude").value = position.coords.longitude;
            if (position.coords.latitude !== 'NULL' && position.coords.longitude !== 'NULL') {
                document.getElementById("check").submit();
            }
        }
    </script>
</div>