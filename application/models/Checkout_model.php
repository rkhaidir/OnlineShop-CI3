<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends MY_Model 
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            'name'      => '',
            'address'   => '',
            'city'      => '',
            'province'  => '',
            'phone'     => '',
            'courier'   => '',
            'status'    => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                "field" => 'name',
                "label" => 'nama',
                "rules" => 'trim|required'
            ],
            [
                "field" => 'address',
                "label" => 'Alamat',
                "rules" => 'trim|required'
            ],
            [
                "field" => 'city',
                "label" => 'Kota',
                "rules" => 'required'
            ],
            [
                "field" => 'province',
                "label" => 'Provinsi',
                "rules" => 'required'
            ],
            [
                "field" => 'phone',
                "label" => 'Telepone',
                "rules" => 'trim|required|numeric|min_length[10]'
            ],
            [
                "field" => 'courier',
                "label" => 'Jasa Pengiriman',
                "rules" => 'required'
            ]
        ];

        return $validationRules;
    }
}

/* End of file Checkout_model.php */
