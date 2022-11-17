<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Produtos extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // Existe uma sessão válida?
        if (!$this->ion_auth->logged_in()) {
            redirect('restrita/login');
        }
    }

    public function index()
    {
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


    // Função utilizada para callback de form validation   
    public function validaNomeProdutoUnico($produtoNome) {
        $produto_id = $this->input->post('produto_id');

        if (!$produto_id) {
            //Cadastrando...
            if ($this->core_model->getById('produtos', ['produto_nome' => $produtoNome])) {
                $this->form_validation->set_message('validaNomeProdutoUnico', 'Esse produto já existe!');
                return false;
            } else {
                return true;
            }
        } else {
            //Editando...
            if ($this->core_model->getById('produtos', ['produto_nome' => $produtoNome, 'produto_id <>' => $produto_id])) {
                $this->form_validation->set_message('validaNomeProdutoUnico', 'Esse produto já existe!');
                return false;
            } else {
                return true;
            }
        }
    }

    public function core(int $produto_id = NULL)
    {

        if (!$produto_id) {
            // Cadastrando...

                $this->form_validation->set_rules('produto_nome', 'Nome do Produto', 'trim|required|min_length[4]|max_length[40]|callback_validaNomeProdutoUnico');
                $this->form_validation->set_rules('produto_categoria_id', 'Categoria do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_marca_id', 'Marca do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_valor', 'Valor de Venda do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_peso', 'Peso do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_altura', 'Altura do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_largura', 'Largura do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_comprimento', 'Comprimento do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_quantidade_estoque', 'Quantidade em estoque', 'trim|required|integer');
                $this->form_validation->set_rules('produto_descricao', 'Descrição do Produto', 'trim|required|min_length[10]|max_length[5000]');

                if ($this->form_validation->run()) {

                    echo '<pre>';
                    print_r($this->input->post());
                    echo '<pre>';
                    exit();

                    $data =  elements([
                        'produto_nome',
                        'produto_categoria_id',
                        'produto_marca_id',
                        'produto_valor',
                        'produto_peso',
                        'produto_altura',
                        'produto_largura',
                        'produto_comprimento',
                        'produto_quantidade_estoque',
                        'produto_ativo',
                        'produto_destaque',
                        'produto_controlar_estoque',
                        'produto_descricao']
                        , $this->input->post());
                 
                        // Remover a vírgula do valor
                        $data['produto_valor'] = str_replace(',', '', $data['produto_valor']);

                        // Criar o metalink do produto
                        $data['produto_meta_link'] = url_amigavel($data['produto_nome']);

                        $data = html_escape($data);

                        // echo '<pre>';
                        // print_r($data);
                        // echo '<pre>';
                        // exit();

                        $this->core_model->update('produtos', $data, ['produto_id' => $produto_id]);

                        //Exclui as imagens antigas do produto, para que não duplique na exibição da view.
                        $this->core_model->delete('produtos_fotos',['foto_produto_id' => $produto_id]);

                        // Recuperar do post se veio imagens  do produto...
                        if( $fotos_produtos = $this->input->post('fotos_produtos')) {
                            $total_fotos = count($fotos_produtos);
                            for($i=0; $i < $total_fotos; $i++) {
                                $data = [
                                    'foto_produto_id' => $produto_id,
                                    'foto_caminho' => $fotos_produtos[$i]
                                ];
                                $this->core_model->insert('produtos_fotos', $data);
                            }
                        }

                        redirect('restrita/produtos');

                } else {
                    $data = [
                        'titulo' => 'Cadastrar Produto',
                        'styles' => [
                            'jquery-upload-file/css/uploadfile.css'
                        ],
                        'scripts' => [
                            'sweetalert2/sweetalert2.all.min.js',
                            'mask/jquery.mask.min.js',
                            'mask/custom.js',
                            'jquery-upload-file/js/jquery.uploadfile.min.js',
                            'jquery-upload-file/js/produtos.js'
                        ],
                        'codigoGerado' => $this->core_model->generateUniqueCode('produtos','numeric', 8, 'produto_codigo'),
                        'categorias' => $this->core_model->getAll('categorias', ['categoria_ativa' => 1]),
                        'marcas' => $this->core_model->getAll('marcas', ['marca_ativa' => 1]),
                    ];

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/produtos/core');
                    $this->load->view('restrita/layout/footer');
                }


        } else {
            if (!$produto = $this->core_model->getById('produtos', ['produto_id' => $produto_id])) {
                $this->session->set_flashdata('erro', 'Esse produto não foi encontrado');
                redirect('restrita/produtos');
            } else {
                // Editando...

                $this->form_validation->set_rules('produto_nome', 'Nome do Produto', 'trim|required|min_length[4]|max_length[40]|callback_validaNomeProdutoUnico');
                $this->form_validation->set_rules('produto_categoria_id', 'Categoria do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_marca_id', 'Marca do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_valor', 'Valor de Venda do Produto', 'trim|required');
                $this->form_validation->set_rules('produto_peso', 'Peso do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_altura', 'Altura do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_largura', 'Largura do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_comprimento', 'Comprimento do Produto', 'trim|required|integer');
                $this->form_validation->set_rules('produto_quantidade_estoque', 'Quantidade em estoque', 'trim|required|integer');
                $this->form_validation->set_rules('produto_descricao', 'Descrição do Produto', 'trim|required|min_length[10]|max_length[5000]');

                if ($this->form_validation->run()) {

                    $data =  elements([
                        'produto_nome',
                        'produto_categoria_id',
                        'produto_marca_id',
                        'produto_valor',
                        'produto_peso',
                        'produto_altura',
                        'produto_largura',
                        'produto_comprimento',
                        'produto_quantidade_estoque',
                        'produto_ativo',
                        'produto_destaque',
                        'produto_controlar_estoque',
                        'produto_descricao']
                        , $this->input->post());
                 
                        // Remover a vírgula do valor
                        $data['produto_valor'] = str_replace(',', '', $data['produto_valor']);

                        // Criar o metalink do produto
                        $data['produto_meta_link'] = url_amigavel($data['produto_nome']);

                        $data = html_escape($data);

                        // echo '<pre>';
                        // print_r($data);
                        // echo '<pre>';
                        // exit();

                        $this->core_model->update('produtos', $data, ['produto_id' => $produto_id]);

                        //Exclui as imagens antigas do produto, para que não duplique na exibição da view.
                        $this->core_model->delete('produtos_fotos',['foto_produto_id' => $produto_id]);

                        // Recuperar do post se veio imagens  do produto...
                        if( $fotos_produtos = $this->input->post('fotos_produtos')) {
                            $total_fotos = count($fotos_produtos);
                            for($i=0; $i < $total_fotos; $i++) {
                                $data = [
                                    'foto_produto_id' => $produto_id,
                                    'foto_caminho' => $fotos_produtos[$i]
                                ];
                                $this->core_model->insert('produtos_fotos', $data);
                            }
                        }

                        redirect('restrita/produtos');

                } else {
                    $data = [
                        'produto' => $produto,
                        'titulo' => 'Editar Produto',
                        'styles' => [
                            'jquery-upload-file/css/uploadfile.css'
                        ],
                        'scripts' => [
                            'sweetalert2/sweetalert2.all.min.js',
                            'mask/jquery.mask.min.js',
                            'mask/custom.js',
                            'jquery-upload-file/js/jquery.uploadfile.min.js',
                            'jquery-upload-file/js/produtos.js'
                        ],
                        'fotos_produto' => $this->core_model->getAll('produtos_fotos', ['foto_produto_id' => $produto_id]),
                        'categorias' => $this->core_model->getAll('categorias', ['categoria_ativa' => 1]),
                        'marcas' => $this->core_model->getAll('marcas', ['marca_ativa' => 1]),
                    ];

                    $this->load->view('restrita/layout/header', $data);
                    $this->load->view('restrita/produtos/core');
                    $this->load->view('restrita/layout/footer');
                }
            }
        }
    }

    // Função própria para o upload de imagens
    public function upload()
    {

        $config['upload_path']          = './uploads/produtos/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 2048; //Max 2mb
        $config['max_width']            = 1000;
        $config['max_height']           = 1000;
        $config['encrypt_name']           = TRUE;
        $config['max_filename']           = 200;
        $config['file_ext_tolower']           = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_produto')) {
            $data = [
                'uploaded_data' => $this->upload->data(),
                'mensagem' => 'Imagem enviada com sucesso',
                'foto_caminho' => $this->upload->data('file_name'),
                'erro' => 0
            ];

            // Redimensionar imagens para exibição maior e carousel
            // https://codeigniter.com/userguide3/libraries/image_lib.html?highlight=image

            // ATENÇÃO: Para utilizar a biblioteca GD2, consultar o arquivo config do XAMPP:
            // Ir no painel XAMPP Control Panel v3.3.0 >>> config do Apache depois em PHP (php.ini) e TIRAR o (;) de extension=gd.
            $config['image_library'] = 'gd2';
            $config['source_image'] = './uploads/produtos/' . $this->upload->data('file_name');
            $config['new_image'] = './uploads/produtos/small/' . $this->upload->data('file_name'); //Diretório para imagens menores
            $config['width']         = 300;
            $config['height']       = 300;

            // Chama a biblioteca
            $this->load->library('image_lib', $config);
            // Faz o resize e, se der erro, atribui os erros à chave 'erro'
            if (!$this->image_lib->resize()) {
                $data['erro'] = $this->image_lib->display_errors();
            }
        } else {
            $data = [
                'mensagem' => $this->upload->display_errors(),
                'erro' => 999,
            ];
        }
        echo json_encode($data);
    }
}
