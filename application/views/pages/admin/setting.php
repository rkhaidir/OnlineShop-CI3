<div class="card shadow">
    <div class="card-header">
        Update Profil
    </div>
    <div class="card-body">
    <?php $this->load->view('layouts/_alerts'); ?>

    <?= form_open($form_action, ['method' => 'POST']) ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
            <div class="form-group">
                <label for="">Nama</label>
                <?= form_input('name', $input->name, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                <?= form_error('name') ?>
            </div>
            <div class="form-group">
                <label for="">E-Mail</label>
                <?= form_input('username',  $input->username, ['class' => 'form-control', 'placeholder' => 'Masukkan username baru', 'required' => true]) ?>
                <?= form_error('username') ?>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 5 karakter']) ?>
                <?= form_error('password') ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        <?= form_close() ?>
    </div>
</div>