<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>
<div class="container">
    <div class="row box--profile">
        <div class="col left--profile">
            <div class=" card" style="width: 18rem;">
                <img src="/images/defaultprofile.jpg" class="card-img-top" alt="..." width="100%">
                <div class="card-body">
                    <h5>Detail Profile</h5>
                    <span>Nama : </span>
                    <span>Wildan Fajar Maulana</span>
                    <br>
                    <span>Alamat :</span>
                    <span>JL.Simpang Sulfat Selatan</span>
                </div>
            </div>
        </div>
        <div class="col right--profile">
            <h4>List Learning</h4>
            <div class="boxLearning">
                <h4>Nama Room</h4>
                <p>Pembelajaran Matematika</p>
                <a href="">
                    <p class="p-link">Go</p>
                </a>
            </div>
        </div>
    </div>
    <?= $this->include("component/footer") ?>
</div>

</div>
<?= $this->endSection() ?>