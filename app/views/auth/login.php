<div class="p-5 d-block d-md-none" style="background-color: #115173; height: 950px;">
    <div style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-6">
            <div class="d-flex justify-content-center mb-4 mt-5">
                <a class="navbar-brand">
                    <img src="<?= base_url; ?>/dist/image/Unas.png" alt="Logo" width="200" height="auto"
                        class="d-inline-block align-text-top">
                </a>
            </div>
            <?php
                Flasher::Message();
            ?>
            <form action="<?= base_url; ?>/login/prosesLogin" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold" style="color: white;">Username</label>
                    <input name="username" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold" style="color: white;">Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg fw-bold"
                        style="background: #FCE38A; border-color: transparent; color: #022C43;">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

<div class="container p-5 mt-3 d-none d-md-block" style="background-color: #115173; border-radius: 40px;">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url; ?>/dist/image/Login.png" alt="Logo" class="img-fluid d-inline-block">
        </div>
        <div class="col-md-6">
            <div class="d-flex justify-content-center mb-3 mt-5">
                <a class="navbar-brand">
                    <img src="<?= base_url; ?>/dist/image/Unas.png" alt="Logo" width="200" height="auto"
                        class="d-inline-block align-text-top">
                </a>
            </div>
            <?php
                Flasher::Message();
            ?>
            <form action="<?= base_url; ?>/login/prosesLogin" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-bold" style="color: white;">Username</label>
                    <input name="username" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-bold" style="color: white;">Password</label>
                    <input name="password" type="password" class="form-control">
                </div>
                <div class="d-grid gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg fw-bold"
                        style="background: #FCE38A; border-color: transparent; color: #022C43;">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
</div>