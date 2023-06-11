<!-- Basic Card Example -->
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
        <?php echo form_open('user/add') ?>
        <div class="form-group <?= form_error('fullname') ? 'has-error' : null ?>">
            <label>Name *</label>
            <input type="text" name="fullname" value="<?= set_value('fullname') ?>" class="form-control">
            <?= form_error('fullname') ?>
        </div>
        <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
            <label>Username *</label>
            <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control">
            <?= form_error('username') ?>
        </div>
        <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
            <label>Password *</label>
            <input type="password" name="password" value="<?= set_value('password') ?>" class="form-control">
            <?= form_error('password') ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group <?= form_error('passconf') ? 'has-error' : null ?>">
            <label>Passwod Confirmation *</label>
            <input type="password" name="passconf" value="<?= set_value('passconf') ?>" class="form-control">
            <?= form_error('passconf') ?>
        </div>
        <div class="form-group">
            <label>Bidang</label>
            <textarea name="address" class="form-control"><?= set_value('address') ?></textarea>
            <?= form_error('address') ?>
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
        <div class="form-group">
            <button type="Submit" class="btn btn-success btn-flat">
                <i class="fa fa-folder-open"></i> Save
            </button>
            <button type="Reset" class="btn btn-flat">Reset</button>
        </div>

        <?php echo form_close() ?>

    </div>
</div>