<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>
<div class="container">
    <?php if($profile){ ?>
    <div class="row box--profile">
        <div class="col left--profile">
            <div class=" card" style="width: 28rem;">
                <img src="/images/<?= $profile['foto'] ?>" class="card-img-top" alt="..." width="100%">
                <div class="card-body">
                    <h5>Detail Profile</h5>
                    <span>Nama : </span>
                    <span><?= $profile['nama'] ?></span>
                    <br>
                    <span>Alamat :</span>
                    <span><?= $profile['alamat'] ?></span>
                    <button class="btn btn-warning mt-3 btnEdit" type="button" data-toggle="modal"
                        data-target="#editProfile">Edit Profile</button>

                </div>
            </div>
        </div>
        <div class=" col right--profile">
            <?php if(session()->get('role')=='guru'){?>
            <h4>List My Learning Room</h4>
            <?php foreach($roomGuru as $rg){ ?>
            <div class="boxLearning">
                <h4><?= $rg['nama_pembelajaran'] ?></h4>
                <p><?= $rg['kelas'] ?></p>
                <a href="/home/dataroom/<?= $rg['id_room'] ?>">
                    <p class="p-link">Go</p>
                </a>
            </div>

            <?php }?>
            <?php }else{?>

            <?php }?>
        </div>
    </div>
    <div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/editProfile" class="formEdit">
                    <input type="hidden" name="fotoLama" id="fotolama" value="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usernameInput">Nama</label>
                            <input type="username" class="form-control" name="nama" id="namaInput">
                        </div>
                        <p class="d-none" id="nama"></p>
                        <div class="form-group">
                            <label for="usernameInput">Alamat</label>
                            <input type="username" class="form-control" name="alamat" id="alamatInput">
                        </div>
                        <p class="d-none" id="alamat"></p>
                        <center>
                            <img src="/images/default.jpg" class="fotoProfile" width="100px">
                        </center>
                        <div class="form-group ">
                            <label for="usernameInput">Foto</label>
                            <br>
                            <input type="file" name="foto" id="fotoInput" onchange="readGambar()">
                        </div>
                        <p class="d-none" id="foto"></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-editProfile">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?= $this->include("component/footer") ?>
    <?php }else{?>
    <div class="row box--noprofile">
        <div class="col text-center">
            <h5>You Have Not Created a Profile !</h5>
            <!-- Button trigger modal -->
            <button type="button" class="mt-3 buttonModal" data-toggle="modal" data-target="#addProfile">
                Add Profile
            </button>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/addProfile" class="formTambah">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usernameInput">Nama</label>
                            <input type="username" class="form-control" name="nama" id="namaInput">
                        </div>
                        <p class="d-none" id="nama"></p>
                        <div class="form-group">
                            <label for="usernameInput">Alamat</label>
                            <input type="username" class="form-control" name="alamat" id="alamatInput">
                        </div>
                        <p class="d-none" id="alamat"></p>
                        <center>
                            <img src="/images/default.jpg" class="fotoProfile" width="100px">
                        </center>
                        <div class="form-group ">
                            <label for="usernameInput">Foto</label>
                            <br>
                            <input type="file" name="foto" id="fotoInput" onchange="readGambar()">
                        </div>
                        <p class="d-none" id="foto"></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-tambahprofile">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer--noprofile">
        <p>copyright 2022&copy;WildanFajarMaulana</p>
    </div>

    <?php }?>

</div>

</div>
<?= $this->endSection() ?>