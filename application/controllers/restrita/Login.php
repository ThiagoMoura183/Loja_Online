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
        // DEBUG \/
        // echo '<pre>';
        // print_r($this->input->post());
        // exit();

        $identity = $this->input->post('email');
        $password = $this->input->post('password');
        $remember = ($this->input->post('remember') ? TRUE : FALSE);
        
        if($this->ion_auth->login($identity, $password, $remember)) {
            $this->session->set_flashdata('sucesso', 'Seja bem-vindo(a)!');
            redirect('restrita'); //Isso usa a rota que foi criada no arquivo ROUTES (HOME/INDEX)
        } else {
            $this->session->set_flashdata('erro', 'Por favor, verifique suas credenciais de acesso!');
            redirect('restrita/login');
        }
    }
    
    public function logout() {
        $this->ion_auth->logout();
        redirect('restrita/login');
    }
}