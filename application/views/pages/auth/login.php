<div class="container">
<div class="row justify-content-center">
        <div class="col-md-5 col-sm-12">
        
            <div class="card my-5">
                <div class="card-header">
                    Form Login
                </div>
                <div class="card-body">
                    <?php $this->load->view("layouts/_alerts") ?>
                    
                    <?= form_open('login', ['method' => 'POST']) ?>
                        <div class="form-group">
							<label for="">E-Mail</label>
							<?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan alamat email aktif', 'required' => true]) ?>
							<?= form_error('email') ?>
						</div>
                        <div class="form-group">
							<label for="">Password</label>
							<?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 6 karakter', 'required' => true]) ?>
							<?= form_error('password') ?>
						</div>
						<button type="submit" class="btn btn-dark">Register</button>
                    <?= form_close() ?>
                </div>
            </div>

        </div>
    </div>
</div>