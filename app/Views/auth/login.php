<?= $this->extend('layout/layout_auth'); ?>
<?= $this->section('content'); ?>
<div class="login--box">
    <div class="container">
        <div class="row login--row">
            <div class="col">
                <h5>W-<span>CLASHROOM</span></h5>
                <div class="image--display">
                    <img src="/images/login.svg" alt="" width="80%">
                </div>
            </div>
            <div class="col">
                <form action="/auth/login" class="formLogin">
                    <div class="form--box">

                        <h5 class="text-center"><span>L</span>OGIN</h5>
                        <div class="form-group">
                            <label for="usernameInput">Username</label>
                            <input type="username" class="form-control" name="username" id="usernameInput">
                        </div>
                        <p class="d-none" id="username"></p>
                        <div class="form-group">
                            <label for="passwordInput">Password</label>
                            <input type="password" class="form-control" name="password" id="passwordInput">
                        </div>
                        <p class="d-none" id="password"></p>

                        <div class="nohave--account ml-auto">
                            <a href="/register">register?</a>
                        </div>
                        <div class="button--login">
                            <button type="submit" class="btn btn-warning btnLogin">LOGIN</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>