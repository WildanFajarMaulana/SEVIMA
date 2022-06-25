<?= $this->extend('layout/layout_admin'); ?>
<?= $this->section('content'); ?>
<h1>Data Account</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Password</th>
            <th scope="col">Role</th>
            <th scope="col">Created_at</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1;foreach($account as $as){?>
        <tr>
            <th scope="row"><?= $no++?></th>
            <td><?= $as['username']?></td>
            <td>**********</td>
            <td><?= $as['role']?></td>
            <td><?= $as['created_at']?></td>
        </tr>
        <?php }?>
    </tbody>
</table>
<?= $this->endSection() ?>