<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Master extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {
        $data = [
            'master' => $this->core_model->getAll('categorias_pai'),
            'titulo' => 'Categorias Pai Cadastradas',
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
        $this->load->view('restrita/master/index');
        $this->load->view('restrita/layout/footer');
    }

    public function validaCategoriaPaiUnica($categoriaPaiNome) {
        $categoria_pai_id = $this->input->post('categoria_pai_id');

        if (!$categoria_pai_id) {
            //Cadastrando...
            if ($this->core_model->getById('categorias_pai', ['categoria_pai_nome' => $categoriaPaiNome])) {
                $this->form_validation->set_message('validaCategoriaPaiUnica', 'Essa categoria pai já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('categorias_pai', ['categoria_pai_nome' => $categoriaPaiNome, 'categoria_pai_id <>' => $categoria_pai_id])) {
                $this->form_validation->set_message('validaCategoriaPaiUnica', 'Essa categoria pai já existe!');
                return false;
            } else {
                return true;
            }
        }
    }

    public function core($categoriaId = NULL) {

        if (!$categoriaId) {
            // Cadastrando Nova Categoria

            $this->form_validation->set_rules('categoria_pai_nome', 'Nome da Categoria', 'trim|required|min_length[4]|max_length[50]|callback_validaCategoriaPaiUnica');

            if ($this->form_validation->run()) {
                $data = elements(
                    [
                        'categoria_pai_nome',
                        'categoria_pai_ativa'
                    ],
                    $this->input->post()
                );

                $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);

                $data = html_escape($data);
                $this->core_model->insert('categorias_pai', $data);
                redirect('restrita/master');
            }
            $data = [
                'titulo' => 'Cadastrar Categoria Pai',
            ];

            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/master/core');
            $this->load->view('restrita/layout/footer');
        } else {
            if (!$categoria_pai = $this->core_model->getById('categorias_pai', ['categoria_pai_id' => $categoriaId])) {
                $this->session->set_flashdata('erro', 'A categoria pai não foi encontrada.');
                redirect('restrita/master');
            } else {
                // Edição de Categoria
                $this->form_validation->set_rules('categoria_pai_nome', 'Nome da Categoria', 'trim|required|min_length[4]|max_length[50]|callback_validaCategoriaPaiUnica');

                if ($this->form_validation->run()) {

                    // Impedir remoção de categoria pai quando tiver categorias filhas atreladas.
                    if ($this->input->post('categoria_pai_ativa') == 0) {
                        if ($this->core_model->getById('categorias', ['categoria_pai_id' => $categoriaId])) {
                            $this->session->set_flashdata('erro', 'A categoria pai não pode ser desativada, pois está vinculado à uma categoria filha.');
                            redirect('restrita/master');
                        }
                    }

                    $data = elements(
                        [
                            'categoria_pai_nome',
                            'categoria_pai_ativa'
                        ],
                        $this->input->post()
                    );

                    $data['categoria_pai_meta_link'] = url_amigavel($data['categoria_pai_nome']);
                    $data = html_escape($data);

                    $this->core_model->update('categorias_pai', $data, ['categoria_pai_id' => $categoriaId]);
                    redirect('restrita/master');
                }

                $data = [
                    'titulo' => 'Editar Categoria Pai',
                    'categoria_pai' => $categoria_pai
                ];

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/master/core');
                $this->load->view('restrita/layout/footer');
            }
        }
    }

    public function delete(int $categoria_pai_id = NULL)
    {

        if (!$categoria_pai_id || !$this->core_model->getById('categorias_pai', ['categoria_pai_id' => $categoria_pai_id])) {
            $this->session->set_flashdata('erro', 'A categoria pai não foi encontrada.');
            redirect('restrita/master');
        }

        if ($this->core_model->getById('categorias_pai', ['categoria_pai_id' => $categoria_pai_id, 'categoria_pai_ativa' => 1])) {
            $this->session->set_flashdata('erro', 'A categoria pai não pode ser excluída pois está ativa.');
            redirect('restrita/master');
        }

        $this->core_model->delete('categorias_pai', ['categoria_pai_id' => $categoria_pai_id]);
        redirect('restrita/master');
    }
}
