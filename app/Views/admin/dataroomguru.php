<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Room Guru</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id room</th>
            <th scope="col">id guru</th>
            <th scope="col">judul</th>
            <th scope="col">sub judul</th>
            <th scope="col">gambar</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($dataroomguru as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['id_room']?></td>
            <td><?= $as['id_guru']?></td>
            <td><?= $as['judul']?></td>
            <td><?= $as['sub_judul']?></td>
            <td><img src="/images/ <?= $as['gambar']?>" alt=""> </td>
            <td><?= $as['created_at']?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>