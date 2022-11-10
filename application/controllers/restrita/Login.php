<?php


defined('BASEPATH') or exit('Ação não permitida!');

class Login extends CI_Controller {

    public function index() {
        $data = [
            'titulo' => 'Login <br> Portal Adm.',
        ];

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/login/index');
        $this->load->view('restrita/layout/footer');
    }

    public function auth() {
        echo '<pre>';
        print_r($this->input->post());
        exit();
    }
}