<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model 
{

    protected $table = 'admin';    

    public function getDefaultValues()
	{
		return [
			'name' 		=> '',
			'username'	=> ''
		];
	}

	public function getValidationRules()
	{
		$validationRules = [
			[
				'field'	=> 'name',
				'label'	=> 'Nama',
				'rules'	=> 'trim|required'
			],
			[
				'field'	=> 'username',
				'label'	=> 'Username',
				'rules'	=> 'trim|required|callback_unique_username'
			]
		];

		return $validationRules;
	}
}

/* End of file Setting_model.php */
