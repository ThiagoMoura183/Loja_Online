<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Sistema extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index() {

        $this->form_validation->set_rules('sistema_razao_social', 'Razão Social', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('sistema_nome_fantasia', 'Nome Fantasia', 'trim|required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('sistema_cnpj', 'CNPJ', 'trim|required|exact_length[18]');
        $this->form_validation->set_rules('sistema_ie', 'Inscrição Estadual', 'trim|required|min_length[5]|max_length[25]');
        $this->form_validation->set_rules('sistema_telefone_fixo', 'Telefone Fixo', 'trim|required|exact_length[14]');
        $this->form_validation->set_rules('sistema_telefone_movel', 'Telefone Móvel', 'trim|required|min_length[14]');
        $this->form_validation->set_rules('sistema_cep', 'CEP', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('sistema_endereco', 'Endereço', 'trim|required|min_length[5]|max_length[145]');
        $this->form_validation->set_rules('sistema_numero', 'Número', 'trim|required|max_length[30]');
        $this->form_validation->set_rules('sistema_cidade', 'Cidade', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('sistema_estado', 'UF', 'trim|required|exact_length[2]');
        $this->form_validation->set_rules('sistema_site_url', 'URL do site', 'trim|required|valid_url|max_length[100]');
        $this->form_validation->set_rules('sistema_email', 'Email de contato','trim|required|valid_email|max_length[100]');
        $this->form_validation->set_rules('sistema_produtos_destaques', 'Quantidade produtos destaque', 'trim|required|integer');

        if ($this->form_validation->run()) {
           
            $data = elements(
                [       
                    'sistema_razao_social',
                    'sistema_nome_fantasia',
                    'sistema_cnpj',
                    'sistema_ie',
                    'sistema_telefone_fixo',
                    'sistema_telefone_movel',
                    'sistema_email',
                    'sistema_site_url',
                    'sistema_cep',
                    'sistema_endereco',
                    'sistema_numero',
                    'sistema_cidade',
                    'sistema_estado',
                    'sistema_produtos_destaques'           
                ], $this->input->post()    
                );

                // Sanitizando o $data!
                $data['sistema_estado'] = strtoupper($data['sistema_estado']);
                $data = html_escape($data);

                $this->core_model->update('sistema',$data,['sistema_id' => 1]);
                redirect('restrita/sistema');

        } else {
            // Erros de Validação

            // Core_model está no auto load!
            $sistema = $this->core_model->getById('sistema', (array('sistema_id' => 1)));
    
            $data = [
                'titulo' => 'Informações da Empresa',
                'sistema' => $sistema,
                'scripts' => [
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ],
            ];
    
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/index');
            $this->load->view('restrita/layout/footer');
        }
    }

    public function correios() {

        $this->form_validation->set_rules('config_cep_origem', 'CEP de Origem', 'trim|required|exact_length[9]');
        $this->form_validation->set_rules('config_codigo_pac', 'Serviço PAC', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_codigo_sedex', 'Serviço SEDEX', 'trim|required|exact_length[5]');
        $this->form_validation->set_rules('config_somar_frete', 'Valor de Soma no Frete', 'trim|required');
        $this->form_validation->set_rules('config_valor_declarado', 'Valor Declarado', 'trim|required');

        if ($this->form_validation->run()) {
           
            $data = elements(
                [       
                    'config_cep_origem',
                    'config_codigo_pac',
                    'config_codigo_sedex',
                    'config_somar_frete',
                    'config_valor_declarado',
                ], $this->input->post()    
                );

                // Sanitizando o $data!
                // Removendo vírgula dos valores
                $data['config_somar_frete'] = str_replace(',', '', $data['config_somar_frete']);
                $data['config_valor_declarado'] = str_replace(',', '', $data['config_valor_declarado']);

                $data = html_escape($data);

                $this->core_model->update('config_correios',$data,['config_id' => 1]);
                redirect('restrita/sistema/correios');

        } else {
            // Erros de Validação

            $data = [
                'titulo' => 'Editar Informações dos Correios',
                'correio' => $this->core_model->getById('config_correios', (array('config_id' => 1))),
                'scripts' => [
                    'mask/jquery.mask.min.js',
                    'mask/custom.js',
                ],
            ];
    
            $this->load->view('restrita/layout/header', $data);
            $this->load->view('restrita/sistema/correios');
            $this->load->view('restrita/layout/footer');
        }
    }
}
