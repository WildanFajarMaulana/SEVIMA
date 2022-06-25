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
                <?php if($getDataSubmit){?>
                <p>s</p>
                <?php }else{ ?>
                <p>Tidak Ada Submit</p>
                <?php }?>
                <?php }else{?>
                <button>Submit Task</button>
                <?php } ?>

            </div>
        </div>
    </div>


    <?=$this->include('component/footer')?>

</div>
<?= $this->endSection() ?>