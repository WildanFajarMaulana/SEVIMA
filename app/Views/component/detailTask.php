<?php foreach($detailTask as $sj){ ?>
<div class="submit--box2">
    <img src="/images/<?= $sj['gambar'] ?>" alt="" width="100%">


</div>
<?php }?>
<div class="form-group ">
    <label for="textInput">Nilai</label>
    <input type="hidden" name="id_kirim" id="id_kirim">
    <input type="text" name="nilai" id="nilai" class="form-control">
</div>
<p class=" d-none" id="nilai"></p>