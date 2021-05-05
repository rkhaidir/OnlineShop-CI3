<div class="card shadow my-3">
    <div class="card-header">
        <span class="m-0 font-weight-bold text-primary">Formulir Kategori</span>
    </div>
    <div class="card-body">
        <?= form_open($form_action, ['method' => 'POST']) ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
            <div class="form-group">
                <label for="">Kategori</label>
                <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => 'true', 'autofocus' => 'true']) ?>
                <?= form_error('title') ?>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => 'true']) ?>
                <?= form_error('slug') ?>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <?= form_close() ?>
    </div>
</div>