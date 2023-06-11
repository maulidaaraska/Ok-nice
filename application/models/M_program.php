<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_program extends CI_Model
{

    //menampilkan seluruh data
    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_program');
        return $this->db->get()->result();
    }

    //insert data
    public function insert_data($data = array())
    {
        $this->db->insert('tbl_program', $data);
    }

    //detail data
    public function detail_data($no)
    {
        $this->db->select('*');
        $this->db->from('tbl_program');
        $this->db->where('no', $no);
        return $this->db->get()->row();
    }

    public function update_data($data)
    {
        $this->db->where('no', $data['no']);
        $this->db->update('tbl_program', $data);
    }

    public function edit_data($data)
    {
        $this->db->where('no', $data['no']);
        $this->db->update('tbl_program', $data);
    }

    public function delete_data($data)
    {
        $this->db->where('no', $data['no']);
        $this->db->delete('tbl_program', $data);
    }
}
