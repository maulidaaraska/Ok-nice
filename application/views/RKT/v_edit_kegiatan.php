<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
    </div>
    <div class="card-body">

        <?php
        //notif validasi form
        echo validation_errors('<div class="col-lg-12">
        <div class="card bg-danger text-white shadow"><div class="card-body">', ' </div></div></div>');
        ?>
        <?php echo form_open('Kegiatan/edit_kegiatan/' . $ssr->no) ?>
        <div class="from-group">
            <label>Uraian</label>
            <input name="uraian" value="<?= $ssr->uraian ?>" class="form-control" placeholder="Uraian">
        </div>

        <div class="from-group">
            <label>Indikator Kinerja</label>
            <input name="indikator_kinerja" value="<?= $ssr->indikator_kinerja ?>" class="form-control" placeholder="Indikator Kinerja">
        </div>

        <div class="from-group">
            <label>Satuan</label>
            <input name="satuan" value="<?= $ssr->satuan ?>" class="form-control" placeholder="Satuan">
        </div>

        <div class="from-group">
            <label>Target</label>
            <input name="target" value="<?= $ssr->target ?>" class="form-control" placeholder="Target">
        </div>

        <div class="from-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('kegiatan/index') ?>" class="btn btn-success">Kembali</a>
        </div>

        <?php echo form_close() ?>

    </div>
</div>