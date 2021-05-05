<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        //Do your magic here
    }
    
    public function index()
    {   
        if ($this->session->userdata('username')) {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pages/admin/login');
        } else {
            $this->_login();
        }
    }

    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row();

        if ($admin) {
            if (password_verify($password, $admin->password)) {
                $data = [
                    'id'        => $admin->id,
                    'username'  => $admin->username,
                    'role'      => $admin->role
                ];

                $this->session->set_userdata($data);
                redirect('admin/dashboard','refresh');
            } else {
                $this->session->set_flashdata('error', 'Wrong password!');
                redirect('admin');
            }
        } else {
            $this->session->set_flashdata('error', 'Username is not registered!');
            redirect('admin');
        }
    }

    public function add() {
        $data = [
            'name'      => 'Admin',
            'username'  => 'admin',
            'password'  => password_hash('admin', PASSWORD_DEFAULT),
            'role'      => 'admin'
        ];
        $this->db->insert('admin', $data);
        
        redirect('admin','refresh');
    }

    public function logout()
    {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('success', 'You have been logged out!');
        redirect('admin');
    }
}

/* End of file Admin.php */
