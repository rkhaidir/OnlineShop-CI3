<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    

    public function index($page = null)
    {
        $data['title'] = "Beranda";
        $this->home->table = 'slider';
        $data['slider'] = $this->home->orderBy('sequence', 'asc')->get();

        $this->home->table = 'product';
        $data['productL'] = $this->home->where('type', 'L')->where('delete', 1)
                                ->orderBy('id', 'DESC')->paginate($page)->get();
        $data['productW'] = $this->home->where('type', 'W')->where('delete', 1)
                                ->orderBy('id', 'DESC')->paginate($page)->get();
        $data['page'] = 'pages/users/home';
        $this->view($data);
    }

}

/* End of file Home.php */
