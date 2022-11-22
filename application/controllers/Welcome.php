<?php
defined('BASEPATH') or exit('Ação não permitida!');

class Welcome extends CI_Controller {

	public function index() {

		$sistema = info_header_footer();

		$data = [
			'titulo' => $sistema->sistema_nome_fantasia,
			'produtosDestaques' => $this->loja_model->getProdutosDestaques($sistema->sistema_produtos_destaques)
		];

		$this->load->view('web/layout/header', $data);
		$this->load->view('web/loja');
		$this->load->view('web/layout/footer');
	}

}
