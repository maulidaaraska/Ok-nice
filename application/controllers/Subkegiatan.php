<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubKegiatan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_subkegiatan');
    }

    public function index()
    {
        $data = array(
            'judul' => 'Sub Kegiatan',
            'page' => 'RKT/v_subkegiatan', //file page di folder view
            'ssr' => $this->m_subkegiatan->all_data(),
        );
        $this->load->view('v_template', $data, false); //load template
    }

    public function input_subkegiatan()
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
                'judul' => 'Input Sub Kegiatan',
                'page' => 'RKT/v_input_subkegiatan', //file page di folder view
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
            $this->m_subkegiatan->insert_data($data);
            $this->session->set_flashdata('pesan', 'Data Sub Kegiatan Berhasil Ditambahkan');
            redirect('subkegiatan/index');
        }
    }


    public function edit_subkegiatan($no)
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
                'judul' => 'Edit Sub Kegiatan',
                'ssr'   => $this->m_subkegiatan->detail_data($no),
                'page' => 'RKT/v_edit_subkegiatan', //file page di folder view
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
            $this->m_subkegiatan->edit_data($data);
            $this->session->set_flashdata('pesan', 'Data Sub Kegiatan Berhasil Diupdate');
            redirect('subkegiatan/index');
        }
    }



    public function delete_subkegiatan($no)
    {
        $data = array('no' => $no);
        $this->m_subkegiatan->delete_data($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Didelete');
        redirect('subkegiatan/index');
        $this->load->view('v_template', $data, false); //load template
    }
}


    //----
