<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    public function index()
    {
        $data = array(
            'judul' => 'user',
            'page' => 'user/v_user_data', //file page di folder view
            'user' => $this->m_user->all_data(),
        );
        $this->load->view('v_template', $data, false); //load template
    }

    public function add()
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules(
            'passconf',
            'Konfirmasi Password',
            'required|matches[password]',
            array('matches' => '%s tidak sesuai dengan password')
        );
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masi kosong, silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silakan ganti');


        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'judul' => 'user add',
                'page' => 'user/v_user_form_add', //file page di folder view
            );
            $this->load->view('v_template', $data, false);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->m_user->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script> alert('Data berhasil disimpan');</script>";
            }
            echo "<script>window.location='" . site_url('user') . "';</script>";
        }
    }

    public function edit($no)
    {
        $this->form_validation->set_rules('fullname', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|callback_username_check');
        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[5]');
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }
        if ($this->input->post('passconf')) {
            $this->form_validation->set_rules(
                'passconf',
                'Konfirmasi Password',
                'matches[password]',
                array('matches' => '%s tidak sesuai dengan password')
            );
        }
        $this->form_validation->set_rules('level', 'Level', 'required');

        $this->form_validation->set_message('required', '%s masi kosong, silakan isi');
        $this->form_validation->set_message('min_length', '{field} minimal 5 karakter');
        $this->form_validation->set_message('is_unique', '{field} ini sudah dipakai, silahkan ganti');


        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            //jika validasi form gagal atau tidak lolos validsi
            $data = array(
                'judul' => 'Edit user',
                'user'   => $this->m_user->detail_data($no),
                'page' => 'user/v_user_form_edit', //file page di folder view
            );
            $this->load->view('v_template', $data, false); //load template
        } else {
            //jika lolos validasi
            $data = array(
                'user_id' => $no,
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
                'address' => $this->input->post('address'),
            );
            $this->m_user->edit($data);
            $this->session->set_flashdata('pesan', 'Data Sasaran Berhasil Diupdate');
            redirect('user/index');
        }
    }

    function username_check()
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username = '$post[username]' AND user_id != '$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('username_check', '{field} ini sudah dipakai, silakan ganti');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function del($no)
    {
        $data = array('user_id' => $no);
        $this->m_user->del($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Didelete');
        redirect('user/index');
        $this->load->view('v_template', $data, false); //load template
    }
}
