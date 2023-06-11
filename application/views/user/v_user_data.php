<div class="pull-right" class="text-center" width="160px">
    <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm ">Tambah Data</a>
</div>
<?php
//notifikasi CRUD
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<table class="table table-bordered" id="dataTable">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>nama</th>
            <th>username</th>
            <th>bidang</th>
            <th>level</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($user as $key => $data) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data->name ?></td>
                <td><?= $data->username ?></td>
                <td><?= $data->address ?></td>
                <td><?= $data->level == 1 ? "Admin" : "User" ?></td>
                <td class="text-center" width="160px">
                    <a href="<?= base_url('user/del/' . $data->user_id) ?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm mt-2">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>