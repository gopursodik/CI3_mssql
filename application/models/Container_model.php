<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Container_model extends CI_Model
{
    private $table = 'Gate_In';

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'container_no',  //samakan dengan atribute name pada tags input
                'label' => 'Container Number',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'size',
                'label' => 'Size',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'type',
                'label' => 'Type',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'gate_in',
                'label' => 'Gate In Date',
                'rules' => 'trim|required'
            ]
        ];
    }

    //menampilkan data container berdasarkan id container
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from container where IdMhsw='$id'
    }

    //menampilkan semua data container
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from container order by IdMhsw desc
    }

    //menyimpan data container
    public function save()
    {
        $data = array(
            'Container_no' => $this->input->post('container_no'),
            'Size'  => $this->input->post('size'),
            'Type' => $this->input->post('type'),
            'Gate_In'  => $this->input->post('gate_in'),
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data container
    public function update()
    {
        $data = array(
            'Container_no' => $this->input->post('container_no'),
            'Size'  => $this->input->post('size'),
            'Type' => $this->input->post('type'),
            'Gate_In'  => $this->input->post('gate_in'),
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    //hapus data container
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}