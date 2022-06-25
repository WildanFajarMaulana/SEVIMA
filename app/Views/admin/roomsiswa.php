<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Room Siswa</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id room</th>
            <th scope="col">id siswa</th>
            <th scope="col">id guru</th>
            <th scope="col">status</th>
            <th scope="col">created_at</th>

        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($roomsiswa as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['id_room']?></td>
            <td><?= $as['id_siswa']?></td>
            <td><?= $as['id_guru']?></td>
            <td><?= $as['status']?></td>
            <td><?= $as['created_at']?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>