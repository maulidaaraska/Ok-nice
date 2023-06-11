<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kegiatan');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Kegiatan',
            'page' => 'RKT/v_kegiatan', //file page di folder view
            'ssr' => $this->m_kegiatan->all_data(),
        );
        $this->load->view('v_template', $data, false); //load template
    }

    public function input_kegiatan()
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
                'judul' => 'Input Kegiatan',
                'page' => 'RKT/v_input_kegiatan', //file page di folder view
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
            $this->m_kegiatan->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Kegiatan Berhasil Ditambahkan !!!');
            redirect('kegiatan/index');
        }
    }


    public function edit_kegiatan($no)
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
                'judul' => 'Edit Kegiatan',
                'ssr'   => $this->m_kegiatan->detail_data($no),
                'page' => 'RKT/v_edit_kegiatan', //file page di folder view
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
            $this->m_kegiatan->edit_data($data);
            $this->session->set_flashdata('pesan', 'Data Kegiatan Berhasil Diupdate !!!');
            redirect('kegiatan/index');
        }
    }



    public function delete_kegiatan($no)
    {
        $data = array('no' => $no);
        $this->m_kegiatan->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Didelete');
        redirect('kegiatan/index');
        $this->load->view('v_template', $data, false); //load template
    }
}


    //----
