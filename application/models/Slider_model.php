<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends MY_Model 
{

    protected $perPage = 3;

    public function getDefaultValues()
    {
        return [
            'title'     => '',
            'sequence'  => '',
            'image'     => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'title',
                'label' => 'Judul Slider',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'sequence',
                'label' => 'Urutan Slider',
                'rules' => 'trim|required|numeric|callback_unique_slug'
            ]
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config = [
            'upload_path'       => './images/slider',
            'file_name'         => $fileName,
            'allowed_types'     => 'jpg|png|jpeg|JPG|PNG',
            'max_size'          => 20480,
            'max_width'         => 0,
            'max_height'        => 500,
            'overwrite'         => true,
            'file_ext_tolower'  => true
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }

    public function deleteImage($fileName)
    {
        if (file_exists("./images/slider/$fileName")) {
            unlink("./images/slider/$fileName");
        }
    }
}

/* End of file Slider_model.php */
