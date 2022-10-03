<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Container extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Container_model"); //load model container
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

        $data["title"] = "List Data Container";
        //ambil fungsi getAll untuk menampilkan semua data container
        $data["data_container"] = $this->Container_model->getAll();
        //load view header.php pada folder views/templates
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        //load view index.php pada folder views/container
        $this->load->view('container/index', $data);
        $this->load->view('templates/footer');
    }

    //method add digunakan untuk menampilkan form tambah data container
    public function add()
    {
        $Container = $this->Container_model; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Container->rules()); //menerapkan rules validasi pada container_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada container_model
        if ($validation->run()) {
            $Container->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Container berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("container");
        }
        $data["title"] = "Tambah Data Container";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('container/add', $data);
        $this->load->view('templates/footer');
    }

    public function pdf($id = null)
    {
        if (!isset($id)) redirect('container');



        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        
        // title dari pdf
        $this->data['title_pdf'] = 'Container Gate In Date';

        $Container = $this->Container_model;
        $this->data["data_container"] = $Container->getById($id);
        
        // filename dari pdf ketika didownload
        $file_pdf = date('y-m-d-H-i-s'). 'container-report';
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";


        
        $html = $this->load->view('container/pdf',$this->data, true);     
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('container');

        $Container = $this->Container_model;
        $validation = $this->form_validation;
        $validation->set_rules($Container->rules());

        if ($validation->run()) {
            $Container->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Container berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("container");
        }
        $data["title"] = "Edit Data Container";
        $data["data_container"] = $Container->getById($id);
        if (!$data["data_container"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('container/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Container_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Container berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}