<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }


    public function index()
    {
        $data = array(
            'judul' => 'Dashboard',
            'subjudul' => '',
            'page' => 'v_dashboard', //file page di folder view
        );
        $this->load->view('v_template', $data, false); //load template
    }
}
