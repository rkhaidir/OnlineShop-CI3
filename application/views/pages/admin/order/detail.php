<div class="card shadow my-3">
    <div class="card-header">
        Detail Order #<?= $order->invoice ?>
         <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
    </div>
    <div class="card-body">
        <?php $this->load->view('layouts/_alerts') ?>

        <p>Tanggal : <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
        <p>Nama : <?= $order->name ?></p>
        <p>Telepon : <?= $order->phone ?></p>
        <p>Alamat : <?= $order->address ?>, <?= $order->city ?>, <?= $order->province ?></p>
        <p>Jasa Pengiriman : <?= $order->courier ?></p>
        <?php if ($order->waybill != "") : ?>
        <p>No. Resi : <?= $order->waybill ?></p>
        <?php endif ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Harga</th>
                        <th width="10%">Kuantitas</th>
                        <th width="30%">Pesan</th>
                        <th>Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($order_detail as $row) : ?>
                    <tr>
                        <td>
                            <p>
                                <img src="<?=$row->image ? base_url("images/product/$row->image") : base_url("images/product/default.jpg") ?>" alt="" height="100" class="img-responsive"> <br>
                                <?= $row->title ?>
                            </p>
                        </td>
                        <td>Rp,<?= number_format($row->price, 0, ',', '.') ?></td>
                        <td><?= $row->quantity ?></td>
                        <td><?= $row->message ?></td>
                        <td>Rp,<?= number_format($row->sub_total, 0, ',', '.') ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot class="table-secondary">
                    <tr>
                        <td colspan="4">Total</td>
                        <td>Rp,<?= number_format(array_sum(array_column($order_detail, 'sub_total')), 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Ongkos Kirim</td>
                        <td>Rp,<?= number_format($order->cost_courier, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">Total Bayar</td>
                        <td>Rp,<?= number_format($order->total + $order->cost_courier, 0, ',', '.') ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="card-footer">
        <?= form_open("admin/order/update/$order->id", ['method' => 'POST']) ?>
            <?php if ($order->status == 'process') : ?>
            <div class="form-group">
                <label for="">No. Resi Pengiriman</label>
                <input type="text" name="waybill" class="form-control">
            </div>
            <?php endif ?>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="waiting" <?= $order->status == 'waiting' ? 'selected' : '' ?> >Menunggu Pembayaran</option>
                    <option value="paid" <?= $order->status == 'paid' ? 'selected' : '' ?>>Dibayar</option>
                    <option value="process" <?= $order->status == 'process' ? 'selected' : '' ?>>Diproses</option>
                    <option value="delivered" <?= $order->status == 'delivered' ? 'selected' : '' ?>>Dikirim</option>
                    <option value="cancel" <?= $order->status == 'cancel' ? 'selected' : '' ?>>Batal</option>
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
        <?= form_close() ?>
    </div>
</div>

<?php if (isset($order_confirm)) : ?>
<div class="card mb-3 shadow">
    <div class="card-header">
        Bukti Transfer
    </div>
    <div class="card-body">
        <p>No Rekening : <?= $order_confirm->account_number ?></p>
        <p>Atas Nama : <?= $order_confirm->account_name ?></p>
        <p>Nominal : <?= $order_confirm->nominal ?></p>
        <p>Note : <?= $order_confirm->note ?></p>

        <div class="mt-3">
            <img src="<?= base_url("/images/confirm/$order_confirm->image") ?>" alt="" height="200" class="img-responsive">
        </div>
    </div>
</div>
<?php endif ?>