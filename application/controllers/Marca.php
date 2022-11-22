<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Marca extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($marca_meta_link = NULL) {

        if (!$marca_meta_link || !$marca =$this->core_model->getById('marcas',['marca_meta_link' => $marca_meta_link])) {
            redirect('/');
        } else {

            $data = [
                'titulo' => 'Produtos da marca ' . $marca->marca_nome,
                'marca' => $marca->marca_nome,
                'produtos' => $this->produtos_model->getAllBy(['marca_meta_link' => $marca_meta_link])
            ];

            // echo '<pre>';
            // print_r($data);
            // exit();

            $this->load->view('web/layout/header', $data);
            $this->load->view('web/marca');
            $this->load->view('web/layout/footer');
        }
    }
}
