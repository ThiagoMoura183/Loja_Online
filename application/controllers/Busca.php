<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Busca extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $busca = html_escape($this->input->post('busca'));

        $data = [
            'titulo' => 'Busca pelo produto' . (!empty($busca) ? $busca : 'Nenhum termo foi digitado'),
            'termo_digitado' => (!empty($busca) ? $busca : 'Nenhum termo foi digitado'),
        ];

        if ($busca) {
            if ($produtosEncontrados = $this->produtos_model->getAllBySearch($busca)) {

                $data['produtos'] = $produtosEncontrados;
            }
        }

        // echo '<pre>';
        // print_r($data);
        // exit();

        $this->load->view('web/layout/header', $data);
        $this->load->view('web/busca');
        $this->load->view('web/layout/footer');
    }
}
