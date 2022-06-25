<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Room Siswa</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id dataroom</th>
            <th scope="col">id siswa</th>
            <th scope="col">id_kirim</th>
            <th scope="col">gambar</th>
            <th scope="col">status</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($dataroomsiswa as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['id_dataroom']?></td>
            <td><?= $as['id_siswa']?></td>
            <td><?= $as['id_kirim']?></td>
            <td><img src="/images/<?= $as['gambar']?>" alt=""> </td>
            <td><?= $as['status']?></td>
            <td><?= $as['created_at']?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>