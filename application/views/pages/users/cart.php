<div class="container">
    
    <div class="my-2">
        <?php $this->load->view('layouts/_alerts') ?>
    </div>

    <div class="table-responsive my-3">
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Harga</th>
                    <th width="10%">Kuantitas</th>
                    <th width="30%">Pesan</th>
                    <th>Sub Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $no=0; foreach($content as $row): $no++ ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td>
                            <p>
                                <img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="100" class="img-responsive"> <br>
                                <?= $row->title ?>
                            </p>
                        </td>
                        <td>Rp,<?= number_format($row->price, 0, ',', '.') ?></td>
                        <td>
                            <form action="<?= base_url("cart/update/$row->id") ?>" method="POST">
                                <div class="input-group">
                                    <input type="hidden" name="id" value="<?= $row->id ?>">
                                    <input type="number" class="form-control" name="quantity" value="<?= $row->quantity ?>">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="submit" id="button-addon2"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form action="<?= base_url("cart/updateMessage/$row->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                <textarea name="message" cols="10" rows="3" class="form-control"><?= $row->message ?></textarea>
                                <button class="btn btn-dark mt-2" type="submit" id="button-addon2"><i class="fa fa-check"></i></button>
                            </form>
                        </td>
                        <td>Rp,<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                        <td>
                            <form action="<?= base_url("cart/delete/$row->id") ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah yakin ingin menghapus?')"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                <tr class="bg-dark text-white">
                    <td colspan="5"><strong>Total : </strong></td>
                    <td colspan="2">Rp,<?= number_format(array_sum(array_column($content, 'sub_total')), 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            <a href="<?= base_url() ?>" class="btn btn-md btn-dark">Lanjut Belanja</a>
        </div>
        <div class="col-md-6 col-sm-12 text-right">
            <a href="<?= base_url('checkout') ?>" class="btn btn-md btn-success">Pembayaran</a>
        </div>
    </div>
</div>