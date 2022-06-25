<?= $this->extend('layout/layout_auth'); ?>
<?= $this->section('content'); ?>
<div class="register--box">
    <div class="container">
        <div class="row register--row">
            <div class="col">
                <div class="form--box">
                    <h5 class="text-center"><span>R</span>EGISTER</h5>
                    <div class="form-group">
                        <label for="usernameInput">Username</label>
                        <input type="username" name="username" class="form-control" id="usernameInput">
                    </div>
                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordInput">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Role</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                            <option>Guru</option>
                            <option>Siswa</option>
                        </select>
                    </div>
                    <div class="nohave--account ml-auto">
                        <a href="/">Back?</a>
                    </div>

                    <div class="button--login">
                        <button class="btn btn-warning">REGISTER</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>