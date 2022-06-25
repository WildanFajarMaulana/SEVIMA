<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>

<div class="container">
    <div class="row">
        <div class="col">
            <a href="/home/learning" style="color:black"><i class="fa-solid fa-arrow-left-long"></i></a>
        </div>
    </div>
    <div class="row">
        <?php if(session()->get('role')=='guru'){ ?>
        <div class="col-md ">
            <?php if($dataRoomGuru){ ?>
            <div class="button--addtaskdata mt-5">
                <p>Add Your Task Now</p>
                <button type="button" data-toggle="modal" data-target="#addTask">Add Task</button>
            </div>
            <?php  foreach($dataRoomGuru as $dr){?>

            <div class="box--task">
                <i class="fa-solid fa-trash-can btn-deletetask" data-id="<?= $dr['id'] ?>"></i>
                <h5><?= $dr['judul'] ?></h5>
                <p><?= $dr['sub_judul'] ?></p>
                <button> <a href="/home/datatask/<?= $dr['id']?>/<?= $id_room?>"
                        style="color:black;text-decoration:none">Action</a></button>
            </div>
            <?php }?>

            <?php }else{?>
            <div class="button--addtask">
                <p>Add Your Task Now</p>
                <button type="button" data-toggle="modal" data-target="#addTask">Add Task</button>
            </div>
            <?php }?>
        </div>
        <?php if($dataRoomGuru){ ?>
        <div class="col-md-4">
            <div class="box--inforoom">
                <h5>List Siswa</h5>
                <?php if($daftarSiswa){ ?>
                <?php foreach($daftarSiswa as $ds){?>
                <div class="profilSiswa">
                    <img src="/images/defaultprofile.jpg" alt="">
                    <p>Wildan Fajar Maulana</p>
                    <p>Siswa</p>
                </div>
                <?php }?>
                <?php }else{?>
                <p style="color:grey">No users registered yet</p>
                <?php }?>

            </div>

        </div>
        <?php }?>
        <?php }else{?>
        <div class="col-md ">
            <?php if($dataRoomGuru){ ?>

            <?php  foreach($dataRoomGuru as $dr){?>

            <div class="box--task">

                <i></i>
                <h5><?= $dr['judul'] ?></h5>
                <p><?= $dr['sub_judul'] ?></p>
                <button> <a href="/home/datatask/<?= $dr['id']?>/<?= $id_room?>"
                        style="color:black;text-decoration:none">Action</a></button>
            </div>
            <?php }?>

            <?php }else{?>
            <div class="button--addtask">
                <p>No Task For Now</p>
            </div>
            <?php }?>
        </div>
        <?php if($dataRoomGuru){ ?>
        <div class="col-md-4">
            <div class="box--inforoomsiswa">
                <h5>List Siswa <span>(<?=$totalSiswaPerRoom['jumlah_siswa']?>)</span></h5>
                <?php if($daftarSiswa){ ?>
                <?php foreach($daftarSiswa as $ds){?>
                <div class="profilSiswa">
                    <img src="/images/<?= $ds['foto']?>" alt="">
                    <p>Wildan Fajar Maulana</p>
                    <p>Siswa</p>
                </div>
                <?php }?>
                <?php }else{?>
                <p style="color:grey">No users registered yet</p>
                <?php }?>

            </div>

        </div>
        <?php }?>
        <?php }?>
    </div>
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/addTask" class="formAddTask">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="usernameInput">Judul</label>
                            <input type="hidden" id="id_room" name="id_room" value="<?= $id_room?>">
                            <input type="text" class="form-control" name="judul" id="judulInput">
                        </div>
                        <p class="d-none" id="judul"></p>
                        <div class="form-group">
                            <label for="textInput">Sub Judul</label>
                            <input type="text" class="form-control" name="sub_judul" id="subjudulInput">
                        </div>
                        <p class="d-none" id="sub_judul"></p>
                        <center>
                            <img src="/images/" class="gambarTask" width="100px">
                        </center>
                        <div class="form-group ">
                            <label for="textInput">Gambar</label>
                            <br>
                            <input type="file" name="gambar" id="gambarInput" onchange="readGambar()">
                        </div>
                        <p class="d-none" id="gambar"></p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-tambahtask">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?=$this->include('component/footer')?>

</div>
<?= $this->endSection() ?>