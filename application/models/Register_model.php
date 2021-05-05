<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model 
{

    protected $table = 'user';
    
    
    public function getDefaultValues()
    {
        return [
            'name'          => '',
            'email'         => '',
            'password'      => '',
            'is_active'     => '',
            'date_register' => ''
        ];
    }

    public function getValidationRules()
    {
        $validateRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'E-mail',
                'rules' => 'trim|required|valid_email|is_unique[user.email]',
                'error' => [
                    'is_unique' => 'This %s already exists.'
                ]
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ],
            [
                'field' => 'password_confirmation',
                'label' => 'Konfirmasi Password',
                'rules' => 'required|matches[password]'
            ]
        ];

        return $validateRules;
    }

    public function run($input)
    {
        $data = [
            'name'          => $input->name,
            'email'         => strtolower($input->email),
            'password'      => hashEncrypt($input->password),
            'date_register' => time()
        ];

        $user = $this->create($data);
        return true;
    }

}

/* End of file Register_model.php */
