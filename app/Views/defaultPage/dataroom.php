<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>

<div class="container">
    <div class="row">
        <div class="col">
            <i class="fa-solid fa-arrow-left-long"></i>
        </div>
    </div>
    <div class="row">
        <div class="col ">
            <?php if($dataRoomGuru){ ?>
            <div class="button--addtaskdata mt-5">
                <p>Add Your Task Now</p>
                <button type="button" data-toggle="modal" data-target="#addTask">Add Task</button>
            </div>
            <div class="box--task">

            </div>
            <?php }else{?>
            <div class="button--addtask">
                <p>Add Your Task Now</p>
                <button type="button" data-toggle="modal" data-target="#addTask">Add Task</button>
            </div>
            <?php }?>
        </div>
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