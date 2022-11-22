<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($categoria_meta_link = NULL) {

        if (!$categoria_meta_link || !$categoria =$this->core_model->getById('categorias',['categoria_meta_link' => $categoria_meta_link])) {
            redirect('/');
        } else {

            $data = [
                'titulo' => 'Produtos da categoria ' . $categoria->categoria_nome,
                'categoria' => $categoria->categoria_nome,
                'produtos' => $this->produtos_model->getAllBy(['categoria_meta_link' => $categoria_meta_link])
            ];

            foreach($data['produtos'] as $produto) {
                $data['categoria_pai_nome'] = $produto->categoria_pai_nome;
                $data['categoria_pai_meta_link'] = $produto->categoria_pai_meta_link;
            }

            // echo '<pre>';
            // print_r($data);
            // exit();

            $this->load->view('web/layout/header', $data);
            $this->load->view('web/categoria');
            $this->load->view('web/layout/footer');
        }
    }
}
