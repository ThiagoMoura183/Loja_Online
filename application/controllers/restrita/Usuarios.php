<?php

defined('BASEPATH') OR exit('Ação não permitida!');

class Usuarios extends CI_Controller {
    public function __construct() {
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
}