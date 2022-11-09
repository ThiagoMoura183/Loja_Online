<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Usuarios extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        // Existe sessão válida?
    }

    public function index() {
        $data = [
            'usuarios' => $this->ion_auth->users()->result(),
            'titulo' => 'Usuários cadastrados',
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

        // DEBUG \/
        // echo '<pre>';
        // print_r($data['usuarios']);
        // exit;

        $this->load->view('restrita/layout/header', $data);
        $this->load->view('restrita/usuarios/index');
        $this->load->view('restrita/layout/footer');
    }

    public function core($usuarioId = NULL) {

        if (!$usuarioId) {
            // Cadastrar Usuário
        } else {
            // Editar usuário
            if (!$usuario = $this->ion_auth->user($usuarioId)->row()) {
                // exit('Não existe'); (DEBUG)
                // Só consegue capturar a mensagem de flash data quando dá o redirect!
                $this->session->set_flashdata('erro', 'Usuário não foi encontrado!');
                redirect('restrita/usuarios');
            } else {
                // exit('Usuário encontrado'); (DEBUG)
                // Abaixo, os parâmetros são na seguinte ordem: Campo do form, O que significa (aparecerá no erro), REGRAS APLICADAS
                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required');

                if ($this->form_validation->run()) {
                    echo '<pre>';
                    print_r($this->input->post());
                    exit();
                } else {
                    $data = [
                        'titulo' => 'Editar Usuário',
                        'usuario' => $usuario,
                        'perfil' => $this->ion_auth->get_users_groups($usuarioId)->row(),
                        'grupos' => $this->ion_auth->groups($usuarioId)->result(),
                    ];

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/usuarios/core');
                    $this->load->view('restrita/layout/footer');
                }
            }
        }
    }
}
