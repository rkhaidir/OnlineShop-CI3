<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model 
{

    protected $perPage = 5;

    public function getDefaultValues()
    {
        return [
            'id'    => '',
            'title' => '',
            'slug'  => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'title',
                'label' => 'Kategori',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'slug',
                'label' => 'Slug',
                'rules' => 'trim|required|callback_unique_slug'
            ]
        ];

        return $validationRules;
    }

}

/* End of file Category_model.php */
