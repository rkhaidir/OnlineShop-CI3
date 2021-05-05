<div class="container my-3">
    <?php $this->load->view('layouts/_alerts') ?>

    <div class="row justify-content-center">
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Checkout Berhasil
                </div>
                <div class="card-body">
                    <h5>No Order : <?= $content->invoice ?></h5>
                    <div class="row">
                        <div class="col-sm-5">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Total Belanja</td>
                                        <td>Rp,<?= number_format($content->total, 0, ',', '.') ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ongkos Kirim</td>
                                        <td>Rp,<?= number_format($content->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tbody>
                                <tfoot class="table-dark">
                                    <tr>
                                        <td>Total Bayar</td>
                                        <td>Rp,<?= number_format($content->total + $content->cost_courier, 0, ',', '.') ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                    <p>Terima kasih sudah berbelanja.</p>
                    <p>Silahkan lakukan pembayaran sesuai total bayar di atas dan transfer pada salah satu rekening di bawah ini :</p>
                    <ul>
                        <li><strong>BCA 3209123123</strong> a/n Online Shop</li>
                        <li><strong>BRI 10103209123123</strong> a/n Online Shop</li>
                        <li><strong>BNI 45103209123123</strong> a/n Online Shop</li>
                        <li><strong>Mandiri 45156209123123</strong> a/n Online Shop</li>
                    </ul>

                    <p>Jika sudah, silahkan lakukan konfirmasi pembayaran <a href="<?= base_url("/myorder/detail/$content->invoice") ?>">klik disini</a>!</p>

                    <a href="<?= base_url('/') ?>" class="btn btn-dark"><i class="fas fa-angle-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>