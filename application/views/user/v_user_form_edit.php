<!-- Basic Card Example
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $judul ?></h6>
    </div>
    <div class="card-body">

        <?php
        //notif validasi form
        echo validation_errors('<div class="col-sm-12">
        <div class="card bg-danger text-white shadow"><div class="card-body">', ' </div></div></div>');
        ?>
        <?php echo form_open('user/v_user_form_edit/' . $user->no) ?>
        <div class="from-group">
            <label>nama</label>
            <input name="fullname" value="<?= $user->name ?>" class="form-control" placeholder="fullname">
        </div>

        <div class="from-group">
            <label>username</label>
            <input name="username" value="<?= $user->username ?>" class="form-control" placeholder="username">
        </div>

        <div class="from-group">
            <label>address</label>
            <input name="address" value="<?= $user->address ?>" class="form-control" placeholder="address">
        </div>
        <div class="form-group <?= form_error('level') ? 'has-error' : null ?>">
            <label>level *</label>
            <select name="level" class=" form-control">
                <option value="">-Pilih-</option>
                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>User</option>
            </select>
            <?= form_error('level') ?>
        </div>

        <div class="from-group">
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a href="<?= base_url('sasaran/index') ?>" class="btn btn-success">Kembali</a>
        </div>

        <?php echo form_close() ?>

    </div>
</div> -->