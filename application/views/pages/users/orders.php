<div class="container my-4">

    <?php $this->load->view('layouts/_alerts'); ?>

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <?php $this->load->view('layouts/user/_sidebar') ?>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Daftar Orders
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nomor</th>
                                    <th>Tanggal</th>
                                    <th>Total Bayar</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($content as $row) : ?>
                                    <tr>
                                        <td><strong>#<?= $row->invoice ?></strong></td>
                                        <td><?= date('d-m-y', strtotime($row->date)) ?></td>
                                        <td>Rp,<?= number_format($row->total + $row->cost_courier, 0, ',', '.') ?></td>
                                        <td><?php $this->load->view('layouts/_status', ['status' => $row->status]) ?></td>
                                        <td><a href="<?= base_url("myorder/detail/$row->invoice") ?>" class="btn btn-sm btn-dark">Detail Order</a></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <nav arial-label="Page navigation example" class="mt-2">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>