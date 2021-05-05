<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{
    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
    }
    
    public function index()
    {
        $this->dashboard->table = 'user';
        $data['count_user'] = $this->dashboard->count();

        $this->dashboard->table = 'product';
        $data['count_product'] = $this->dashboard->count();

        $this->dashboard->table = 'orders';
        $data['count_orders'] = $this->dashboard->count();

        $data['order_paid'] = $this->dashboard->where('status', 'paid')->orderBy('date', 'DESC')->get();
        $data['order_process'] = $this->dashboard->where('status', 'process')->orderBy('date', 'DESC')->get();

        $data['title'] = 'Dashboard';
        $data['page'] = 'pages/admin/home/index';
        $this->viewAdmin($data);
    }

}

/* End of file Home.php */
