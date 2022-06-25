<?php if($getKomentar){?>
<?php foreach($getKomentar as $gs){?>
<div class="profilSiswa">
    <img src="/images/<?= $gs['foto']?>" alt="">
    <p><?= $gs['nama'] ?><span class="role_span">(<?= $gs['role'] ?>)</span></p>
    <p><?= $gs['comment'] ?></p>
</div>
<?php }?>
<?php }else{?>
<p class="text-center mt-3">Tidak Ada Komentar</p>
<?php }?>