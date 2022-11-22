<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Carrinho extends CI_Controller {
    public function __construct() {
        parent::__construct();

        $this->load->library('carrinho_compras');
    }

    public function index() {
    }

    public function insert()
    {
        $produtoId = (int) $this->input->post('produto_id');
        $produtoQuantidade = (int) $this->input->post('produto_quantidade');

        $retorno = [];
        if (!$produtoId || $produtoQuantidade < 1) {
            $retorno['erro'] = 3;
            $retorno['mensagem'] = 'Informe a quantidade maior que zero';
        } else {
            // Validando se o produto existe na base
            if (!$produto = $this->core_model->getById('produtos', ['produto_id' => $produtoId])) {
                $retorno['erro'] = 3;
                $retorno['mensagem'] = 'Produto não encontrado.';
            } else {
                // Sucesso... O produto existe... Agora validar quantidade de estoque
                if ($produtoQuantidade > $produto->produto_quantidade_estoque) {
                    $retorno['erro'] = 3;
                    $retorno['mensagem'] = 'Infelizmente só temos ' . $produto->produto_quantidade_estoque . ' em estoque.';
                } else {
                    // Estoque disponível...

                    $this->carrinho_compras->insert($produtoId, $produtoQuantidade);
                    $retorno['erro'] = 0;
                    $retorno['mensagem'] = 'Produto adicionado com sucesso!';
                }
            }
        }
        echo json_encode($retorno);
    }
}
