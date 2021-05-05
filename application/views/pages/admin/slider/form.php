<div class="card shadow my-3">
    <div class="card-header">
        <span class="m-0 font-weight-bold text-primary">Formulir Slider</span>
    </div>
    <div class="card-body">
        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

            <div class="form-group">
                <label for="">Judul Slider</label>
                <?= form_input('title', $input->title, ['class' => 'form-control', 'required' => true, 'autofocus' => true]) ?>
                <?= form_error('title') ?>
            </div>

            <div class="form-group">
                <label for="">Urutan Slider</label>
                <?= form_input(['type' => 'number', 'name' => 'sequence', 'value' => $input->sequence, 'class' => 'form-control', 'required' => true]) ?>
                <?= form_error('sequence') ?>
            </div>

            <div class="form-group">
            <label for="">Gambar (max-size: 20mb, max-height: 350 pixel)</label>
                <br>
                <?= form_upload('image') ?>
                <?php if ($this->session->flashdata('image_error')) : ?>
                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                <?php endif ?>
                <?php if ($input->image): ?>
                    <br><br>
                    <img src="<?= base_url("/images/slider/$input->image") ?>" alt="" height="150" class="img-responsive">
                <?php endif ?>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <?= form_close() ?>
    </div>
</div>