<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_program');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Program',
            'page' => 'RKT/v_program', //file page di folder view
            'ssr' => $this->m_program->all_data(),
        );
        $this->load->view('v_template', $data, false); //load template
    }

    public function input_program()
    {
        //membaca validasi form input
        $this->form_validation->set_rules('uraian', 'Uraian', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('indikator_kinerja', 'Indikator Kinerja', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('target', 'Target', 'required', [
            'required' => '%s Harus Diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            //jika validasi form gagal atau tidak lolos validsi
            $data = array(
                'judul' => 'Input Program',
                'page' => 'RKT/v_input_program', //file page di folder view
            );
            $this->load->view('v_template', $data, false); //load template
        } else {
            //jika lolos validasi
            $data = array(
                'uraian' => $this->input->post('uraian'),
                'indikator_kinerja' => $this->input->post('indikator_kinerja'),
                'satuan' => $this->input->post('satuan'),
                'target' => $this->input->post('target'),
            );
            $this->m_program->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Sasaran Berhasil Ditambahkan');
            redirect('program/index');
        }
    }

    public function edit_program($no)
    {
        //membaca validasi form input
        $this->form_validation->set_rules('uraian', 'Uraian', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('indikator_kinerja', 'Indikator Kinerja', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
            'required' => '%s Harus Diisi'
        ]);
        $this->form_validation->set_rules('target', 'Target', 'required', [
            'required' => '%s Harus Diisi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            //jika validasi form gagal atau tidak lolos validsi
            $data = array(
                'judul' => 'Edit Program',
                'ssr'   => $this->m_program->detail_data($no),
                'page' => 'RKT/v_edit_program', //file page di folder view
            );
            $this->load->view('v_template', $data, false); //load template
        } else {
            //jika lolos validasi
            $data = array(
                'no' => $no,
                'uraian' => $this->input->post('uraian'),
                'indikator_kinerja' => $this->input->post('indikator_kinerja'),
                'satuan' => $this->input->post('satuan'),
                'target' => $this->input->post('target'),
            );
            $this->m_program->edit_data($data);
            $this->session->set_flashdata('pesan', 'Data Sasaran Berhasil Diupdate');
            redirect('program/index');
        }
    }

    public function delete_program($no)
    {
        $data = array('no' => $no);
        $this->m_program->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Didelete');
        redirect('program/index');
        $this->load->view('v_template', $data, false); //load template
    }
}
