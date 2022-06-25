<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>

<div class="container">
    <?php if(session()->get('role')=='guru'){ ?>
    <?php if($roomGuru){?>
    <div class="row mt-5">
        <div class="col">
            <h4>My Room <span>Learning</span></h4>
            <button type="button" data-toggle="modal" data-target="#addRoom" class="buttonRoom">Create</button>
        </div>
    </div>


    <div class="row">
        <?php foreach($roomGuru as $rg){ ?>
        <div class="col-md-4">
            <div class="box--room">
                <h5><?= $rg['nama_pembelajaran'] ?></h5>
                <p><?= $rg['kelas'] ?></p>
                <P><?= $rg['nama'] ?></P>
                <a href="/home/dataroom/<?= $rg['id_room']?>"><button>Go</button></a>
            </div>
        </div>
        <?php }?>
    </div>



    <?php }else{?>
    <div class="row">
        <div class="col">
            <div class="box--learning">
                <img src="/images/learning.svg" alt="" width="100%">
                <button>Join</button>
                <button type="button" data-toggle="modal" data-target="#addRoom">Create</button>
            </div>
        </div>
    </div>
    <?php }?>

    <?php }else{?>
    <div class="row">
        <div class="col">
            <div class="box--learning">
                <img src="/images/learning.svg" alt="" width="100%">
                <button style="width:100%">Join</button>

            </div>
        </div>
    </div>
    <?php }?>

    <?=$this->include('component/footer')?>
    <div class="modal fade" id="addRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Room</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/addRoomLearning" class="formLearning">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaPembelajaranInput">Nama Learning</label>
                            <input type="text" class="form-control" name="nama_pembelajaran" id="namaPembelajaranInput">
                        </div>
                        <p class="d-none" id="namaPembelajaran"></p>
                        <div class="form-group">
                            <label for="kelasInput">Class</label>
                            <input type="text" class="form-control" name="kelas" id="kelasInput">
                        </div>
                        <p class="d-none" id="kelas"></p>
                        <div class="form-group">
                            <label for="kodeRoomInput">Kode Room</label>
                            <input type="text" class="form-control" name="kode_room" id="kodeRoomInput">
                        </div>
                        <p class="d-none" id="kodeRoom"></p>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btnLearning">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>