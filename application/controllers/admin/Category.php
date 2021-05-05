<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller 
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('admin');
        }
    }
    
    public function index($page = null)
    {
        $data['title']      = 'Admin: Kategori';
        $data['content']    = $this->category->paginate($page)->get();
        $data['total_rows'] = $this->category->count();
        $data['pagination'] = $this->category->makePagination(base_url('admin/category'), 3, $data['total_rows']);
        $data['page']       = 'pages/admin/category/index';
        
        $this->viewAdmin($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('admin/category'));
        }

        $keyword = $this->input->post('keyword');
        $data['title']      = 'Admin Kategori';
        $data['content']    = $this->category->like('title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->category->like('title', $keyword)->count();
        $data['pagination'] = $this->category->makePagination(base_url('admin/category/search'), 4, $data['total_rows']);
        $data['page']       = 'pages/admin/category/index';
        
        $this->viewAdmin($data);
    }

    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('admin/category'));
    }

    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->category->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['title']          = 'Tambah Kategori';
            $data['input']          = $input;
            $data['form_action']    = base_url('admin/category/create');
            $data['page']           = 'pages/admin/category/form';

            $this->viewAdmin($data);
            return;
        }

        if ($this->category->create($input)) {
            $this->session->set_flashdata("success", "Data berhasil disimpan!");
        } else {
            $this->session->set_flashdata("error", "Opps! terjadi kesalahan.");
        }
     
        redirect(base_url('admin/category'));   
    }

    public function edit($id)
    {
        $data['content'] = $this->category->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', "Maaf data tidak ditemukan!");
            redirect(base_url('admin/category'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['title']          = 'Ubah Kategori';
            $data['form_action']    = base_url("admin/category/edit/$id");
            $data['page']           = 'pages/admin/category/form';

            $this->viewAdmin($data);
            return;
        }

        if ($this->category->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Oops! terjadi kesalahan.');
        }

        redirect(base_url('admin/category'));
    }

    public function delete($id)
    {
        if (!$_POST) {
            redirect(base_url('admin/category')); 
        }

        if (!$this->category->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', "Maaf data tidak ditemukan!");
            redirect(base_url('admin/category'));
        }

        if ($this->category->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Oops! terjadi kesalahan.');
        }

        redirect(base_url('admin/category'));
    }

    public function unique_slug()
    {
        $slug = $this->input->post('slug');
        $id = $this->input->post('id');
        $category = $this->category->where('slug', $slug)->first();

        if ($category) {
            if ($id == $category->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan!');
            return false;
        }

        return true;
    }
}

/* End of file Category.php */
