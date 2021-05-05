<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');

        if ($is_login) {
            redirect(base_url(), 'refresh');
            return;
        }
    }
    

    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->login->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->login->validate()) {
            $data['title']  = "Login";
            $data['input']  = $input;
            $data['page']   = 'pages/auth/login';

            $this->view($data);
            return;
        }

        if ($this->login->run($input)) {
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Oops! Email atau Password Salah.');
            redirect(base_url('login'));
        }
    }

}

/* End of file Login.php */
