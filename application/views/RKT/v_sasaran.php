<div class="pull-right">
    <a href="<?= base_url('sasaran/input_sasaran') ?>" class="btn btn-primary">Tambah Data</a>
</div>
<?php
//notifikasi CRUD
if ($this->session->flashdata('pesan')) {
    echo '<div class="alert alert-success">';
    echo $this->session->flashdata('pesan');
    echo '</div>';
}
?>

<div>
    <button onclick="window.print()" class="btn btn-danger shadow float-right">Print <i class="fa fa-print"></i></button>
</div>

<table class="table table-bordered" id="dataTable">
    <thead>
        <tr class="text-center">
            <th>No</th>
            <th>Uraian</th>
            <th>Indikator Kinerja</th>
            <th>Target</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($ssr as $key => $value) { ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value->uraian ?></td>
                <td><?= $value->indikator_kinerja ?></td>
                <td><?= $value->target ?></td>
                <td class="text-center" width="160px">
                    <a href="<?= base_url('sasaran/edit_sasaran/' . $value->no) ?>" class="btn btn-warning btn-sm mt-2 ">Edit</a>
                    <a href="<?= base_url('sasaran/delete_sasaran/' . $value->no) ?>" onclick="return confirm('Yakin Hapus Data?')" class="btn btn-danger btn-sm mt-2">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>