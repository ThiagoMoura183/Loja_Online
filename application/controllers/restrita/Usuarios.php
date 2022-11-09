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

    // Funções utilizada para callback de form validation
    public function valida_email($email) {
        $usuarioId = $this->input->post('usuario_id');

        if (!$usuarioId) {
            //Cadastrando...
            if ($this->core_model->getById('users', ['email' => $email])) {
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('users', ['email' => $email, 'id <>' => $usuarioId])) {
                $this->form_validation->set_message('valida_email', 'Esse e-mail já existe!');
                return false;
            } else {
                return true;
            }
        }
    }

    public function valida_usuario($username) {
        $usuarioId = $this->input->post('usuario_id');

        if (!$usuarioId) {
            //Cadastrando...
            if ($this->core_model->getById('users', ['username' => $username])) {
                $this->form_validation->set_message('valida_usuário', 'Esse usuário já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('users', ['username' => $username, 'id <>' => $usuarioId])) {
                $this->form_validation->set_message('valida_usuário', 'Esse usuário já existe!');
                return false;
            } else {
                return true;
            }
        }
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
                // O arquivo que fica todas as validações é o "form_validation_lang.php (dentro de language)"
                $this->form_validation->set_rules('first_name', 'Nome', 'trim|required|min_length[4]|max_length[45]');
                $this->form_validation->set_rules('last_name', 'Sobrenome', 'trim|required|min_length[4]|max_length[45]');
                $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[4]|max_length[100]|valid_email|callback_valida_email');
                $this->form_validation->set_rules('username', 'Usuário', 'trim|required|min_length[4]|max_length[45]|callback_valida_usuario');
                // Obs: O callback faz a chamada de uma função dentro da própria controller
                $this->form_validation->set_rules('password', 'Senha', 'trim|required|min_length[4]|max_length[200]');
                $this->form_validation->set_rules('confirma', 'Confirmação de senha', 'required|matches[password]');

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
