<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">W-<span>CLASHROOM</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto ">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Learning</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Setting
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Profile</a>
                        <a class="dropdown-item" href="#">Edit Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</nav>

<div class="container">
    <!-- jumbotron -->
    <div class="row jumbotron--row">
        <div class="col left--image">
            <img src="/images/homeJumbotron.svg" alt="" width="100%">
        </div>
        <div class="bulat"></div>
        <div class="bulat"></div>
        <div class="bulat"></div>
        <div class="col right--info">
            <div class="infoPertama">
                <p>Halo....</p>
            </div>
            <div class="infoKedua">
                <p>Selamat Datang</p>
            </div>
            <div class="infoKetiga">
                <p>Jangan Lupa Gabung Pembelajaran Ya!</p>
            </div>

            <div class="boxButton">
                <button>Gabung</button>
                <button>Buat</button>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <!-- content -->
    <div class="row content--box">
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-question"></i>
            </div>
        </div>
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-exclamation"></i>
            </div>
        </div>
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-check"></i>
            </div>
        </div>
    </div>
    <!-- endcontent -->
</div>
<?= $this->endSection() ?>