<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Produto extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($produto_meta_link = NULL) {

        if (!$produto_meta_link || !$produto = $this->produtos_model->getById($produto_meta_link)) {
            redirect('/');
        } else {

            $data = [
                'titulo' => "{$produto->produto_nome}",
                'scripts' => [
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ],
                'produto' => $produto
            ];

            $data['fotos_produtos'] = $this->core_model->getAll('produtos_fotos', ['foto_produto_id' => $produto->produto_id]);

            // echo '<pre>';
            // print_r($data);
            // exit();


            $this->load->view('web/layout/header', $data);
            $this->load->view('web/produto');
            $this->load->view('web/layout/footer');
        }
    }
}
