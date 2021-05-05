<div class="card shadow my-3">
    <div class="card-header">
        <span class="m-0 font-weight-bold text-primary">Formulir Produk</span>
    </div>
    <div class="card-body">
        <?= form_open_multipart($form_action, ['method' => 'POST']) ?>
            <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
            <div class="form-group">
                <label for="">Produk</label>
                <?= form_input('title', $input->title, ['class' => 'form-control', 'id' => 'title', 'onkeyup' => 'createSlug()', 'required' => true, 'autofocus' => true]) ?>
                <?= form_error('title') ?>
            </div>
            <div class="form-group">
                <label for="">Deskripsi</label>
                <?= form_textarea(['name' => 'description', 'value' => $input->description, 'class' => 'form-control', 'row' => 2]) ?>
                <?= form_error('description') ?>
            </div>
            <div class="form-group">
                <label for="">Harga</label>
                <?= form_input(['type' => 'number', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control', 'required' => true]) ?>
                <?= form_error('price') ?>
            </div>
            <div class="form-group">
                <label for="">Kategori</label>
                <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control']) ?>
                <?= form_error('id_category') ?>
            </div>
            <div class="form-group">
                <label for="">Ukuran</label>
                <?= form_input('size', $input->size, ['class' => 'form-control', 'placeholder' => 'Contoh: S, M, L, XL, ...', 'required' => true]) ?>
                <?= form_error('size') ?>
            </div>
            <div class="form-group">
                <label for="">Warna</label>
                <?= form_input('color', $input->color, ['class' => 'form-control', 'placeholder' => 'Contoh: Merah, Biru, Merah Mudah, ...', 'required' => true]) ?>
            </div>
            <div class="form-group">
                <label for="">Tipe</label>
                <br>
                <div class="form-check form-check-inline">
                    <?= form_radio(['name' => 'type', 'value' => 'L', 'checked' => $input->type == 'L' ? true : false, 'class' => 'form-check-input']) ?>
                    <label for="" class="form-check-label">Laki-Laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <?= form_radio(['name' => 'type', 'value' => 'W', 'checked' => $input->type == 'W' ? true : false, 'class' => 'form-check-input']) ?>
                    <label for="" class="form-check-label">Wanita</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Stock</label>
                <br>
                <div class="form-check form-check-inline">
                    <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'form-check-input']) ?>
                    <label for="" class="form-check-label">Tersedia</label>
                </div>
                <div class="form-check form-check-inline">
                <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'form-check-input']) ?>
                    <label for="" class="form-check-label">Kosong</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Gambar</label>
                <br>
                <?= form_upload('image') ?>
                <?php if ($this->session->flashdata('image_error')) : ?>
                    <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                <?php endif ?>
                <?php if ($input->image): ?>
                    <br><br>
                    <img src="<?= base_url("/images/product/$input->image") ?>" alt="" height="150" class="img-responsive">
                <?php endif ?>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug', 'required' => true]) ?>
                <?= form_error('slug') ?>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        <?= form_close() ?>
    </div>
</div>