<div class="container my-4">
    <?php $this->load->view("layouts/_alerts") ?>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Formulir Alamat Pengiriman
                </div>
                <div class="card-body">
                    <?= form_open('checkout/create', ['method' => 'POST']) ?>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama penerima" value="<?= $input->name ?>">
							<?= form_error('name') ?>
                        </div>
                        <div class="form-group">
							<label for="">Alamat</label>
							<textarea name="address" id="" cols="30" rows="5" class="form-control"><?= $input->address ?></textarea>
							<?= form_error('address') ?>
						</div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="province" id="" class="form-control">
                                <?php for($i=0; $i<count($provinces['rajaongkir']['results']); $i++) { ?>
                                    <option value="<?= $provinces['rajaongkir']['results'][$i]['province_id'] ?>"><?= $provinces['rajaongkir']['results'][$i]['province'] ?></option>
                                <?php } ?>
                            </select>
							<?= form_error('province') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kota</label>
                            <select name="city" id="" class="form-control">
                                <?php for($i=0; $i<count($cities['rajaongkir']['results']); $i++) { ?>
                                    <option value="<?= $cities['rajaongkir']['results'][$i]['city_id'] ?>"><?= $cities['rajaongkir']['results'][$i]['city_name'] ?></option>
                                <?php } ?>
                            </select>
							<?= form_error('city') ?>
                        </div>
						<div class="form-group">
							<label for="">Telepon</label>
							<input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon penerima" value="<?= $input->phone ?>">
							<?= form_error('phone') ?>
						</div>
                        <div class="form-group">
                            <label for="">Jasa Pengiriman</label>
                            <select name="courier" id="" class="form-control">
                                <option value="">--Pilih Jasa Pengiriman--</option>
                                <option value="jne">JNE</option>
                                <option value="tiki">Tiki</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
							<?= form_error('province') ?>
                        </div>

						<button class="btn btn-dark" type="submit">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Keranjang
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($cart as $row): ?>
                                    <tr>
                                        <td><?= $row->title ?></td>
                                        <td><?= $row->quantity ?></td>
                                        <td>Rp,<?= number_format($row->price, 0, ',', '.') ?></td>
                                        <td>Rp,<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total : </td>
                                    <td>Rp,<?= number_format(array_sum(array_column($cart, 'sub_total')), 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>