<?= $this->extend('layout/layout_auth'); ?>
<?= $this->section('content'); ?>
<div class="register--box">
    <div class="container">
        <div class="row register--row">
            <div class="col">
                <div class="form--box">
                    <form action="/auth/register" class="formRegister">
                        <h5 class="text-center"><span>R</span>EGISTER</h5>
                        <div class="form-group">
                            <label for="usernameInput">Username</label>
                            <input type="username" name="username" class="form-control" id="usernameInput">
                        </div>
                        <p class="d-none" id="username"></p>
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" name="password" class="form-control" id="passwordInput">
                        </div>
                        <p class="d-none" id="password"></p>
                        <div class="form-group">
                            <label for="passwordInput">Konfirmasi Password</label>
                            <input type="password" name="konfirmasiPassword" class="form-control"
                                id="konfirmasiPasswordInput">
                        </div>
                        <p class="d-none" id="konfirmasiPassword"></p>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="role" id="roleInput">
                                <option disabled selected>Pilih</option>
                                <option value="guru">Guru</option>
                                <option value="siswa">Siswa</option>
                            </select>
                        </div>
                        <p class="d-none" id="role"></p>
                        <div class="nohave--account ml-auto">
                            <a href="/">Back?</a>
                        </div>

                        <div class="button--login">
                            <button type="submit" class="btn btn-warning btnregister">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>