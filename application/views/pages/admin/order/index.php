<div class="card shadow my-3">
    <div class="card-header">
        <span class="m-0 font-weight-bold text-primary">Order</span>
    </div>
    <div class="card-body">
        <div class="row my-2">
            <div class="col-md-8 col-sm-12">
                
            </div>
            <div class="col-md-2 col-sm-12">
                <?= form_open('admin/order/search', ['method' => 'POST', 'class' => 'form-inline']) ?>
                    <div class="form-group">
                        <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari Invoice" value="<?= $this->session->userdata('keyword') ?>">
                        <div class="btn-group mx-sm-3" role="group" aria-label="Basic example">
                            <button type="submit" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-search"></i></button>
                            <a href="<?= base_url('admin/order/reset') ?>" class="btn btn-sm btn-secondary"><i class="fa fa-fw fa-eraser"></i></a>
                        </div>
                    </div>
                <?= form_close() ?>
            </div>
        </div>

        <?php $this->load->view('layouts/_alerts') ?>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nomor</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=0; foreach($content as $row) : $no++ ?>
                    <tr>
                        <td><strong>#<?= $row->invoice ?></strong></td>
                        <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
					    <td>Rp<?= number_format($row->total + $row->cost_courier, 0, ',', '.') ?>,-</td>
                        <td>
                            <?php $this->load->view('layouts/_status', ['status' => $row->status ]);  ?>
                        </td>
                        <td>
                            <a href="<?= base_url("admin/order/detail/$row->id") ?>" class="btn btn-sm btn-secondary">Detail</a>
                        </td>
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