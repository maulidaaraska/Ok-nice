<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sasaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_sasaran');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Sasaran',
            'page' => 'RKT/v_sasaran', //file page di folder view
            'ssr' => $this->m_sasaran->all_data(),
        );
        $this->load->view('v_template', $data, false); //load template
    }

    public function input_sasaran()
    {
        //membaca validasi form input
        $this->form_validation->set_rules('uraian', 'Uraian', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('indikator_kinerja', 'Indikator Kinerja', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('target', 'Target', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi form gagal atau tidak lolos validsi
            $data = array(
                'judul' => 'Input Sasaran',
                'page' => 'RKT/v_input_sasaran', //file page di folder view
            );
            $this->load->view('v_template', $data, false); //load template
        } else {
            //jika lolos validasi
            $data = array(
                'uraian' => $this->input->post('uraian'),
                'indikator_kinerja' => $this->input->post('indikator_kinerja'),
                'target' => $this->input->post('target'),
            );
            $this->m_sasaran->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Sasaran Berhasil Ditambahkan');
            redirect('sasaran/index');
        }
    }

    public function edit_sasaran($no)
    {
        //membaca validasi form input
        $this->form_validation->set_rules('uraian', 'Uraian', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('indikator_kinerja', 'Indikator Kinerja', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('target', 'Target', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            //jika validasi form gagal atau tidak lolos validsi
            $data = array(
                'judul' => 'Edit Sasaran',
                'ssr'   => $this->m_sasaran->detail_data($no),
                'page' => 'RKT/v_edit_sasaran', //file page di folder view
            );
            $this->load->view('v_template', $data, false); //load template
        } else {
            //jika lolos validasi
            $data = array(
                'no' => $no,
                'uraian' => $this->input->post('uraian'),
                'indikator_kinerja' => $this->input->post('indikator_kinerja'),
                'target' => $this->input->post('target'),
            );
            $this->m_sasaran->edit_data($data);
            $this->session->set_flashdata('pesan', 'Data Sasaran Berhasil Diupdate');
            redirect('sasaran/index');
        }
    }

    public function delete_sasaran($no)
    {
        $data = array('no' => $no);
        $this->m_sasaran->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Didelete');
        redirect('sasaran/index');
        $this->load->view('v_template', $data, false); //load template
    }
}
