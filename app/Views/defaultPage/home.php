<?= $this->extend('layout/layout_default'); ?>
<?= $this->section('content'); ?>

<?=$this->include('component/topbar')?>

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
                <p>Welcome :)</p>
            </div>
            <div class="infoKetiga">
                <p>Don't Forget to Join Learning Yes!</p>
            </div>

            <div class="boxButton">
                <?php if(session()->get('role')=="siswa"){?>
                <?php if($profilByIdLogin){?>
                <button style="width:80%" class="joinlink">Join</button>
                <?php }else{?>
                <button style="width:80%" class="joinlinknoprofile">Join</button>
                <?php }?>
                <?php }else{?>
                <?php if($profilByIdLogin){?>
                <button style="width:80%" class="createlink">Create</button>
                <?php }else{?>
                <button style="width:80%" class="createlinknoprofile">Create</button>
                <?php }?>

                <?php }?>


            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    <!-- content -->
    <div class="row content--box">
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-question"></i>
                <h5>Why Should You Try It?</h5>
                <p>Many challenging lessons that you can follow</p>
            </div>
        </div>
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-exclamation"></i>
                <h5>immediately follow a lot of learning</h5>
                <p>Later there will be tasks <br>that you can do</p>
            </div>
        </div>
        <div class="col box--info">
            <div class="contentInfo">
                <i class="fa-solid fa-check"></i>
                <h5>Made With The Best Possible
                </h5>
                <p>can be used in activities between teachers and studentsts</p>
            </div>
        </div>
    </div>



    <div class="row content--info">
        <div class="col box--about">
            <h3>W-CLASSROOM-<span>INFO</span></h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere a quisquam, magnam pariatur mollitia
                accusamus obcaecati necessitatibus quia, veritatis eius dolorem. Saepe dolorum aliquam perspiciatis
                suscipit! Nemo tempore porro recusandae.</p>

            <div class="rate">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="col ">
            <img src="/images/education.svg" alt="" width="100%">
        </div>
    </div>
    <!-- endcontent -->

    <?=$this->include('component/footer')?>

</div>
<?= $this->endSection() ?>