<?php

defined('BASEPATH') or exit('Ação não permitida!');


class Produtos_model extends CI_Model {
    public function getAll() {
        $this->db->select([
            'produtos.produto_id',
            'produtos.produto_codigo',
            'produtos.produto_nome',
            'produtos.produto_valor',
            'produtos.produto_ativo',
            'categorias.categoria_id',
            'categorias.categoria_nome',
            'marcas.marca_nome',
        ]);

        $this->db->join('categorias', 'categorias.categoria_id = produtos.produto_categoria_id', 'LEFT');
        $this->db->join('marcas', 'marcas.marca_id = produtos.produto_marca_id', 'LEFT');
        return $this->db->get('produtos')->result();
    }
}