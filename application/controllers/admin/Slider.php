<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends MY_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
    }
    
    public function index($page = null)
    {
        $data['title']      = "Admin: Slider";
        $data['content']    = $this->slider->paginate($page)->orderBy('sequence')->get();
        $data['total_rows'] = $this->slider->count();
        $data['pagination'] = $this->slider->makePagination(base_url('admin/slider'), 3, $data['total_rows']);
        $data['page']       = 'pages/admin/slider/index';

        $this->viewAdmin($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('admin/slider'));
        }

        $keyword = $this->input->post('keyword');
        $data['title']      = 'Admin: Slider';
        $data['content']    = $this->slider->like('title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->slider->like('title', $keyword)->count();
        $data['pagination'] = $this->slider->makePagination(base_url('admin/slider'), 3, $data['total_rows']);
        $data['page']       = 'pages/admin/slider/index';
        
        $this->viewAdmin($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('admin/slider'));
    }

    public function create()
    {
        if(!$_POST) {
            $input = (object) $this->slider->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] != '') {
            $imageName  = url_title($input->title, '-', true) . '-' . date('YmdHis');
            $upload     = $this->slider->uploadImage('image', $imageName);

            if ($upload) {
                $input->image = $upload['file_name'];
            } else {
                redirect(base_url('admin/slider/create'));
            }
        }

        if (!$this->slider->validate()) {
            $data['title']      = "Tambah Slider";
            $data['input']      = $input;
            $data['form_action'] = base_url('admin/slider/create');
            $data['page'] = 'pages/admin/slider/form';

            $this->viewAdmin($data);
            return;
        }

        if ($this->slider->create($input)) {
            $this->session->set_flashdata("success", "Data berhasil disimpan!");
        } else {
            $this->session->set_flashdata("error", "Opps! terjadi kesalahan.");
        }

        redirect(base_url('admin/slider'));
    }

    public function edit($id)
    {
        $data['content'] = $this->slider->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('admin/slider'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName  = url_title($data['input']->title, '-', true) . '-' . date('YmdHis');
            $upload     = $this->slider->uploadImage('image', $imageName);
    
            if ($upload) {
                if ($data['content']->image !== '') {
                    $this->slider->deleteImage($data['content']->image);
                }
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url('admin/slider/create'));
            }
        }

        if (!$this->slider->validate()) {
            $data['title']      = "Ubah Slider";
            $data['form_action'] = base_url("admin/slider/edit/$id");
            $data['page'] = 'pages/admin/slider/form';

            $this->viewAdmin($data);
            return;
        }

        if ($this->slider->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata("success", "Data berhasil disimpan!");
        } else {
            $this->session->set_flashdata("error", "Opps! terjadi kesalahan.");
        }

        redirect(base_url('admin/slider'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('admin/slider'));
        }

        $slider = $this->slider->where('id', $id)->first();

        if (!$slider) {
            $this->session->set_flashdata('warning', 'Maaf, data tidak ditemukan!');
            redirect(base_url('admin/product'));
        }

        if ($this->slider->where('id', $id)->delete()) {
            $this->slider->deleteImage($slider->image);
            $this->session->set_flashdata("success", "Data berhasil dihapus!");
        } else {
            $this->session->set_flashdata("error", "Opps! terjadi kesalahan.");
        }

        redirect(base_url('admin/slider'));
    }

    public function unique_slug()
    {
        $sequence = $this->input->post('sequence');
        $id = $this->input->post('id');
        $slider = $this->slider->where('sequence', $sequence)->first();

        if ($slider) {
            if ($id == $slider->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }

        return true;
    }
}

/* End of file Slider.php */
