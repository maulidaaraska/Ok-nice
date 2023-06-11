<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function all_data()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }

    public function detail_data($no)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('user_id', $no);
        return $this->db->get()->row();
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['level'] = $post['level'];
        $this->db->insert('user', $params);
    }

    public function edit($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->update('user', $data);
    }

    public function del($data)
    {
        $this->db->where('user_id', $data['user_id']);
        $this->db->delete('user', $data);
    }
}
