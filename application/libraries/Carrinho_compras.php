<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Carrinho_compras {
    public function __construct() {

        // Verifica se existe na sessão uma chave de carrinho
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }
    }

    public function insert($produtoId = NULL, $produtoQtd = NULL) {
        if($produtoId && $produtoQtd) {
            if(isset( $_SESSION['carrinho'][$produtoId])) {
                $_SESSION['carrinho'][$produtoId] += $produtoQtd;
            } else {
                $_SESSION['carrinho'][$produtoId] = $produtoQtd;
            }
        }
    }

    // Atualiza a quantidade de itens do referido produto
    public function update ($produtoId = NULL, $produtoQtd = NULL) {
        if($produtoId && $produtoQtd && $produtoQtd > 0) {
                $_SESSION['carrinho'][$produtoId] = $produtoQtd;
        } 
    }

    // Remove do carrinho o produto identificado
    public function delete($produtoId = NULL) {
        unset($_SESSION['carrinho'][$produtoId]);
    }

    // Limpa todo o carrinho de compras
    public function clear() {
        unset($_SESSION['carrinho']);
    }

    // Lista todos os itens do carrinho (sessão) de compras

    public function getAll() {
        $CI = & get_instance();
        $CI->load->model('carrinho_model'); 

        $retorno = [];
        $indice = 0;

        foreach($_SESSION['carrinho'] as $produto_id => $produtoQtd) {
            $query = $CI->carrinho_model->getById($produto_id);
            $retorno[$indice]['produto_id'] = $query->produto_id;
            $retorno[$indice]['produto_nome'] = $query->produto_nome;
            $retorno[$indice]['produto_valor'] = $query->produto_valor;
            $retorno[$indice]['produto_quantidade'] = $query->produto_quantidade;
            $retorno[$indice]['subtotal'] = number_format($produtoQtd * $query->produto_valor, 2, '.', '');

            $retorno[$indice]['produto_peso'] = $query->produto_peso;
            $retorno[$indice]['produto_altura'] = $query->produto_altura;
            $retorno[$indice]['produto_largura'] = $query->produto_largura;
            $retorno[$indice]['produto_comprimento'] = $query->produto_comprimento;
            $retorno[$indice]['produto_foto'] = $query->produto_caminho;
            $retorno[$indice]['produto_meta_link'] = $query->produto_meta_link;

            $indice++;    
        }

        return $retorno;
    }
}
