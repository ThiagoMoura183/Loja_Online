<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Categorias extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {
        $data = [
            'categorias' => $this->core_model->getAll('categorias'),
            'titulo' => 'Categorias Filha Cadastradas',
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
   
        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/categorias/index');
        $this->load->view('restrita/layout/footer');
    }

    public function validaCategoriaFilhaUnica($categoriaFilhaNome) {
        $categoria_id = $this->input->post('categoria_id');

        if (!$categoria_id) {
            //Cadastrando...
            if ($this->core_model->getById('categorias', ['categoria_nome' => $categoriaFilhaNome])) {
                $this->form_validation->set_message('validaCategoriaFilhaUnica', 'Essa categoria filha já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('categorias', ['categoria_nome' => $categoriaFilhaNome, 'categoria_id <>' => $categoria_id])) {
                $this->form_validation->set_message('validaCategoriaFilhaUnica', 'Essa categoria filha já existe!');
                return false;
            } else {
                return true;
            }
        }
    }

    public function core(int $categoria_filha_id = NULL) {

        if (!$categoria_filha_id) {
            // Adicionando categoria filha

            $this->form_validation->set_rules('categoria_nome', 'Nome da categoria filha', 'trim|required|min_length[4]|max_length[40]|callback_validaCategoriaFilhaUnica');

            if ($this->form_validation->run()) {
                $data = elements(
                    [
                        'categoria_nome',
                        'categoria_ativa',
                        'categoria_pai_id'
                    ], $this->input->post());

                $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);
                $data = html_escape($data);

                $this->core_model->insert('categorias', $data);
                redirect('restrita/categorias');
            }

            $data = [
                'titulo' => 'Cadastrar Categoria Filha',
                'masters' => $this->core_model->getAll('categorias_pai',['categoria_pai_ativa' => 1])
            ];

            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/categorias/core');
            $this->load->view('restrita/layout/footer');
        } else {
            // Editando categoria filha
            if (!$categoria = $this->core_model->getById('categorias', ['categoria_id' => $categoria_filha_id])) {
                $this->session->set_flashdata('erro', 'Essa categoria filha não foi encontrada');
                redirect('restrita/categorias');
            } else {
                $this->form_validation->set_rules('categoria_nome', 'Nome da categoria filha', 'trim|required|min_length[4]|max_length[40]|callback_validaCategoriaFilhaUnica');

                if ($this->form_validation->run()) {
                    $data = elements(
                        [
                            'categoria_nome',
                            'categoria_ativa',
                            'categoria_pai_id'
                        ], $this->input->post());

                    $data['categoria_meta_link'] = url_amigavel($data['categoria_nome']);
                    $data = html_escape($data);

                    $this->core_model->update('categorias', $data);
                    redirect('restrita/categorias');
                }

                
            $data = [
                'titulo' => 'Editar Categoria Filha',
                'categoria' => $categoria,
                'masters' => $this->core_model->getAll('categorias_pai',['categoria_pai_ativa' => 1])
            ];

            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/categorias/core');
            $this->load->view('restrita/layout/footer');
            }
        }
    }
}