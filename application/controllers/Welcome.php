<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index() {

		$sistema = info_header_footer();

		$data = [
			'titulo' => $sistema->sistema_nome_fantasia,
		];
		$this->load->view('web/layout/header', $data);
		$this->load->view('web/loja');
		$this->load->view('web/layout/footer');
	}

}
