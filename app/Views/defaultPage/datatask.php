<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>

<div class="container">

    <div class="row">
        <div class="col">
            <a href="/home/dataroom/<?= $id_room ?>" style="color:black"><i class="fa-solid fa-arrow-left-long"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="taskdetail">
                <img src="/images/<?= $getDataTask['gambar'] ?>" alt="">
                <h5><?= $getDataTask['judul']?></h5>
                <p><?= $getDataTask['sub_judul'] ?></p>
            </div>
            <div class="row">
                <div class="col">
                    <div class="commenttask">
                        <h5>Comment task</h5>
                        <form action="/home/addKomentar" class="formKomentar">
                            <div class="formtask">
                                <input type="hidden" name="id_task" class="id_task" value="<?= $id_task ?>">
                                <input type="text" name="komentar" class="form-control">
                                <button type="submit">Comment</button>
                            </div>
                        </form>
                        <form action="/home/addComment">
                            <div class="c-siswa">

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="tasksubmit">
                <?php if(session()->get('role')=='guru'){ ?>
                <?php if($kirimJawaban){?>
                <?php foreach($kirimJawaban as $sj){?>
                <div class="submit--box text-center">
                    <img src="/images/<?= $sj['gambar'] ?>" alt="" width="20%">
                    <p>Send : <?= $sj['nama'] ?></p>
                    <button class="detailKirim" data-id="<?= $sj['id'] ?>" data-toggle="modal"
                        data-target="#detailKirim">Detail</button>
                </div>
                <?php }?>
                <?php }else{?>
                <p>No Submit </p>
                <?php }?>
                <?php }else{?>

                <?php if($submitJawaban){?>
                <?php if($kirimJawaban){?>
                <button type="button" class="cancelTask">Cancel</button>
                <?php foreach($submitJawaban as $sj){ ?>
                <div class="submit--box">
                    <img src="/images/<?= $sj['gambar'] ?>" alt="" width="20%">
                    <button class="detailSubmit" data-id="<?= $sj['id'] ?>" data-toggle="modal"
                        data-target="#detailTask">Detail</button>
                </div>
                <?php }?>
                <input type="hidden" name="id_task" class="id_task" value="<?= $id_task ?>">

                <input type="hidden" name="id_room" class="id_room" value="<?= $id_room ?>">
                <p>nilai: <?= $kirimJawaban['nilai']==0?'Wait': $kirimJawaban['nilai']?></p>
                <p></p>
                <?php }else{?>
                <button type="button" data-toggle="modal" data-target="#submitTask">Submit Task</button>
                <?php foreach($submitJawaban as $sj){ ?>
                <div class="submit--box">
                    <img src="/images/<?= $sj['gambar'] ?>" alt="" width="20%">
                    <button class="detailSubmit" data-id="<?= $sj['id'] ?>" data-toggle="modal"
                        data-target="#detailTask">Detail</button>
                    <i class="fa-solid fa-trash-can deleteDetailTask" data-id="<?= $sj['id'] ?>"></i>
                </div>
                <?php }?>
                <input type="hidden" name="id_task" class="id_task" value="<?= $id_task ?>">

                <input type="hidden" name="id_room" class="id_room" value="<?= $id_room ?>">
                <button class="mt-3 kirimSubmit" style="width:100%">Kirim</button>
                <p></p>
                <?php }?>

                <?php }else{ ?>
                <button type="button" data-toggle="modal" data-target="#submitTask">Submit Task</button>
                <?php }?>

                <?php } ?>

            </div>
        </div>
    </div>

    <div class="modal fade" id="detailKirim" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/acceptTask" class="formAcceptTask">
                    <input type="hidden" name="id_task" class="id_task" value="<?= $id_task ?>">
                    <input type="hidden" name="id_room" class="id_room" value="<?= $id_room ?>">
                    <div class="modal-body body-detail-task-kirim">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-submittask">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="submitTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Submit Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/home/submitTask" class="formSubmitTask">
                    <input type="hidden" name="id_task" class="id_task" value="<?= $id_task ?>">

                    <input type="hidden" name="id_room" class="id_room" value="<?= $id_room ?>">
                    <div class="modal-body">
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
                        <button type="submit" class="btn btn-danger btn-submittask">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="detailTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Task</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="" class="imageDetailTask" width="100%">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <?=$this->include('component/footer')?>

</div>
<?= $this->endSection() ?>