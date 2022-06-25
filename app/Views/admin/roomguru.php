<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Room Guru</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id guru</th>
            <th scope="col">Nama Pembelajaran</th>
            <th scope="col">Kelas</th>
            <th scope="col">Kode Room</th>
            <th scope="col">Jumlah Siswa</th>
            <th scope="col">Status</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($roomguru as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['id_guru']?></td>
            <td><?= $as['nama_pembelajaran']?></td>
            <td><?= $as['kelas']?></td>
            <td><?= $as['kode_room']?></td>
            <td><?= $as['jumlah_siswa']?></td>
            <td><?= $as['status']?></td>
            <td><?= $as['created_at']?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>