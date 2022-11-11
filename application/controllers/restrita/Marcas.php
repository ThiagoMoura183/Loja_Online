<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Marcas extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {
        $data = [
            'marcas' => $this->core_model->getAll('marcas'),
            'titulo' => 'Marcas Cadastradas',
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
        $this->load->view('restrita/marcas/index');
        $this->load->view('restrita/layout/footer');
    }

    // Função utilizada para callback de form validation   
    public function validaNomeUnico($marcaNome) {
        $marcaId = $this->input->post('marca_id');

        if (!$marcaId) {
            //Cadastrando...
            if ($this->core_model->getById('marcas', ['marca_nome' => $marcaNome])) {
                $this->form_validation->set_message('validaNomeUnico', 'Essa marca já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('marcas', ['marca_nome' => $marcaNome, 'marca_id <>' => $marcaId])) {
                $this->form_validation->set_message('validaNomeUnico', 'Essa marca já existe!');
                return false;
            } else {
                return true;
            }
        }
    }


      // A função core no projeto é utilizada para ADICIONAR e ATUALIZAR registros
      public function core($marcaId = NULL) {

        if (!$marcaId) {
            //Cadastrando uma Marca Nova
        } else {
            if (! $marca = $this->core_model->getById('marcas',['marca_id' => $marcaId])) {
                $this->session->set_flashdata('erro', 'A marca não foi encontrada!');
                redirect('restrita/marcas');
            } else {
                //Editando uma Marca

                $this->form_validation->set_rules('marca_nome',' Nome da Marca', 'trim|required|min_length[2]|callback_validaNomeUnico');
                // $this->form_validation->set_rules('marca_meta_link',' Meta Link', 'trim|required|min_length[2]');
                // $this->form_validation->set_rules('marca_nome',' Nome da Marca', 'trim|required|min_length[2]');
                // $this->form_validation->set_rules('marca_nome',' Nome da Marca', 'trim|required|min_length[2]');

                if ($this->form_validation->run()) {
                    $data = elements(
                        [
                        'marca_nome',
                        'marca_ativa',
                        'marca_meta_link',
                        ], $this->input->post()
                    );

                    // Criando meta link (removendo acentuações, etc.)
                    $data['marca_meta_link'] = url_amigavel($data['marca_nome']);

                    $data = html_escape($data);
                    $this->core_model->update('marcas',$data,['marca_id' => $marcaId]);
                    redirect('restrita/marcas');
                }

                $data = [
                    'titulo' => 'Editar Marca',
                    'marca' => $marca
                ];

                $this->load->view('restrita/layout/header', $data);
                $this->load->view('restrita/marcas/core');
                $this->load->view('restrita/layout/footer');
            }
        }
    }
}