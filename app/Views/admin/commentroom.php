<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Comment Room</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id user</th>
            <th scope="col">id dataroom</th>
            <th scope="col">role</th>
            <th scope="col">comment</th>
            <th scope="col">foto</th>
            <th scope="col">created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($comment as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['id_user']?></td>
            <td><?= $as['id_dataroom']?></td>
            <td><?= $as['role']?></td>
            <td><?= $as['comment']?></td>
            <td> <img src="/images/<?= $as['foto']?>" alt=""> </td>
            <td><?= $as['created_at']?></td>

        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>