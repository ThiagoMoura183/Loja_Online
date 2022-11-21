<?php

defined('BASEPATH') or exit('Ação não permitida!');


class Produtos_model extends CI_Model {

    // O GetAll é utilizado na área restrita apenas
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

    // Recuperar o produto para detalhá-lo na página do cliente
    public function getById($produto_meta_link = NULL) {
        $this->db->select([
            'produtos.produto_id',
            'produtos.produto_codigo',
            'produtos.produto_nome',
            'produtos.produto_valor',
            'produtos.produto_quantidade_estoque',
            'produtos.produto_descricao',
            'produtos.produto_meta_link',
            'categorias_pai.categoria_pai_nome',
            'categorias_pai.categoria_pai_meta_link',
            'categorias.categoria_id',
            'categorias.categoria_nome',
            'categorias.categoria_meta_link',
            'marcas.marca_id',
            'marcas.marca_nome',
            'marcas.marca_meta_link',
        ]);

        $this->db->where('produtos.produto_meta_link', $produto_meta_link);
        $this->db->join('marcas', 'marcas.marca_id = produtos.produto_marca_id');
        $this->db->join('categorias', 'categorias.categoria_id = produtos.produto_categoria_id');
        $this->db->join('categorias_pai', 'categorias_pai.categoria_pai_id = categorias.categoria_pai_id');

        return $this->db->get('produtos')->row();

    }
}