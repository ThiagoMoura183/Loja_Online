<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($categoria_pai_meta_link = NULL) {

        if (!$categoria_pai_meta_link || !$master =$this->core_model->getById('categorias_pai',['categoria_pai_meta_link' => $categoria_pai_meta_link])) {
            redirect('/');
        } else {

            $data = [
                'titulo' => 'Produtos da categoria ' . $master->categoria_pai_nome,
                'produtos' => $this->produtos_model->getAllBy(['categoria_pai_meta_link' => $categoria_pai_meta_link])
            ];

            // echo '<pre>';
            // print_r($data);
            // exit();

            $this->load->view('web/layout/header', $data);
            $this->load->view('web/master');
            $this->load->view('web/layout/footer');
        }
    }
}
