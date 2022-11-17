<?php

defined('BASEPATH') or exit('Ação não permitida!');

class Core_model extends CI_Model
{

    public function getAll($tabela = NULL, $condicoes = NULL)
    {
        if ($tabela && $this->db->table_exists($tabela)) {
            if (is_array($condicoes)) {
                $this->db->where($condicoes);
            }
            return $this->db->get($tabela)->result();
        } else {
            return false;
        }
    }

    public function getById($tabela = NULL, $condicoes = NULL)
    {
        if ($tabela && $this->db->table_exists($tabela) && is_array($condicoes)) {
            $this->db->where($condicoes);
            $this->db->limit(1);
            return $this->db->get($tabela)->row();
        } else {
            return false;
        }
    }

    public function insert($tabela = NULL, $data = NULL, $getLastId = NULL)
    {
        if ($tabela && $this->db->table_exists($tabela) && is_array($data)) {
            // Insere na sessão o último ID inserido no banco de dados
            $this->db->insert($tabela, $data);

            if ($getLastId) {
                // O insert_id retorna o ID gerado automaticamente na última consulta
                $this->session->set_userdata('last_id', $this->db->insert_id());
            }

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('erro', 'Não foi possível salvar os dados!');
            }
        } else {
            return false;
        }
    }

    public function update($tabela = NULL, $data = NULL, $condicoes = NULL)
    {
        if ($tabela && $this->db->table_exists($tabela) && is_array($data)) {
            if ($this->db->update($tabela, $data, $condicoes)) {
                $this->session->set_flashdata('sucesso', 'Dados salvos com sucesso!');
            } else {
                $this->session->set_flashdata('erro', 'Não foi possível salvar os dados!');
            }
        } else {
            return false;
        }
    }

    public function delete($tabela = NULL, $condicoes = NULL)
    {
        if ($tabela && $this->db->table_exists($tabela) && is_array($condicoes)) {
            if ($this->db->delete($tabela, $condicoes)) {
                $this->session->set_flashdata('sucesso', 'Registro removido com sucesso!');
            } else {
                $this->session->set_flashdata('erro', 'Não foi remover o registro!');
            }
        } else {
            return false;
        }     
    }

    // Função para gerar o código do item automaticamente
    public function generateUniqueCode($tabela = NULL, $tipoCodigo = NULL, $tamanhoCodigo = NULL, $campoProcura = NULL) {

        do {
            $codigo = random_string($tipoCodigo, $tamanhoCodigo);
            $this->db->where($campoProcura, $codigo);
            $this->db->from($tabela);
        } while($this->db->count_all_results() >= 1);

        return $codigo;
    }

}
