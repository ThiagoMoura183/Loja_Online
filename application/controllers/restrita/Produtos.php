<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Produtos extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {
        $data = [
            'produtos' => $this->produtos_model->getAll(),
            'titulo' => 'Produtos Cadastrados',
            'styles' => [
                'bundles/datatables/datatables.min.css',
                'bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css'
            ],
            'scripts' => [
                'bundles/datatables/datatables.min.js',
                'bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js',
                'bundles/jquery-ui/jquery-ui.min.js',
                'js/page/datatables.js'
            ]
        ];

        // echo '<pre>';
        // print_r($data['produtos']);
        // echo '<pre>';
        // exit();

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/produtos/index');
        $this->load->view('restrita/layout/footer');
    }

    public function core(int $produto_id = NULL) {

        if (!$produto_id) {
            // Cadastrando...
        } else {
            if (!$produto = $this->core_model->getById('produtos', ['produto_id' => $produto_id])) {
                $this->session->set_flashdata('erro', 'Esse produto não foi encontrado');
                redirect('restrita/produtos');
            } else {
                // Editando...


                $data = [
                    'produto' => $produto,
                    'titulo' => 'Editar Produto',
                    'styles' => [
                        'jquery-upload-file/css/uploadfile.css'
                    ],
                    'scripts' => [
                        'mask/jquery.mask.min.js',
                        'mask/custom.js',
                        'jquery-upload-file/js/jquery.uploadfile.min.js',
                        'jquery-upload-file/js/produtos.js'
                    ],
                    'fotos_produto' => $this->core_model->getAll('produtos_fotos', ['foto_produto_id' => $produto_id]),
                    'categorias' => $this->core_model->getAll('categorias', ['categoria_ativa' => 1]),
                    'marcas' => $this->core_model->getAll('marcas', ['marca_ativa' => 1]),
                ];

                // echo '<pre>';
                // print_r($data['produto']);
                // echo '<pre>';
                // exit();

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/produtos/core');
                $this->load->view('restrita/layout/footer');
            }
        }
    }

    // Função própria para o upload de imagens
    public function upload() {

        $config['upload_path']          = './uploads/produtos/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048; //Max 2mb
        $config['max_width']            = 1000;
        $config['max_height']           = 1000;
        $config['max_filename']           = 200;
        $config['encrypt_name']           = TRUE;
        $config['file_ext_tolower']           = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_produto')) {
            $data = [
                'upload_data' => $this->upload->data(),
                'mensaem' => 'Imagem enviada com sucesso',
                'foto_caminho' => $this->upload->data('file_name'),
                'erro' => 0
            ];

            // Redimensionar imagens para exibição maior e carousel
            // https://codeigniter.com/userguide3/libraries/image_lib.html?highlight=image

            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/produtos/' . $this->upload->data('file_name');
            $config['new_image'] = './uploads/produtos/small/'. $this->upload->data('file_name'); //Diretório para imagens menores
            $config['width']         = 300;
            $config['height']       = 300;

            // Chama a biblioteca
            $this->load->library('image_lib', $config);
            // Faz o resize e, se der erro, atribui os erros à chave 'erro'
            if (!$this->image_lib->resize()) {
                $data['erro'] = $this->image_lib->display_errors();
            }
        }
        else {
                $data = [
                    'mensagem' => $this->upload->display_errors(),
                    'erro' => 999,
                ];
        }
        echo json_encode($data);
    }
}
