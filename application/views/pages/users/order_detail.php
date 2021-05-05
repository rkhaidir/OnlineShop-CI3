<div class="container my-4">
    <?php $this->load->view('layouts/_alerts'); ?>

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <?php $this->load->view('layouts/user/_sidebar') ?>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card mb-3">
                <div class="card-header">
                    Detail Order #<?= $order->invoice ?>
                    <?php $this->load->view('layouts/_status', ['status' => $order->status]); ?>
                </div>
                <div class="card-body">
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
                <?php if ($order->status == 'waiting') : ?>
				<div class="card-footer">
					<a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
				</div>
				<?php endif ?>
            </div>

            <?php if (isset($order_confirm)) : ?>
            <div class="card mb-3">
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
        </div>
    </div>
</div>