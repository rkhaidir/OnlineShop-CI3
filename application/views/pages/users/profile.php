<div class="container my-4">

    <?php $this->load->view('layouts/_alerts'); ?>

    <div class="row">
        <div class="col-md-3 col-sm-12">
            <?php $this->load->view('layouts/user/_sidebar') ?>
        </div>
        <div class="col-md-9 col-sm-12">
            <div class="card">
                <div class="card-header">
                    Profil
                </div>
                <div class="card-body">
                    <?php $this->load->view('layouts/_alerts') ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <img src="<?= $content->image ? base_url("/images/profile/$content->image") : base_url("/images/profile/avatar.png") ?>" alt="" width="200" class="img-responsive">
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <h5><?= $content->name ?></h5>
                            <p>Email : <?= $content->email ?></p>
                            <p>Tanggal Bergabung : <?= date('d-m-Y h:i:s', strtotime($content->date_register)) ?></p>
                            <a href="<?= base_url("/profile/update/$content->id") ?>" class="btn btn-sm btn-info">Edit Profile</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>