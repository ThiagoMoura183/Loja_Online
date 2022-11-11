<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
          redirect('restrita/login');
        }
      
    }

    public function index() {
        $this->load->view('restrita/layout/header');
        $this->load->view('restrita/Home/index');
        $this->load->view('restrita/layout/footer');
    }
}