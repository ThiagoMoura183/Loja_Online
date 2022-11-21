<?php $this->load->view('restrita/layout/navbar'); ?>
<?php $this->load->view('restrita/layout/sidebar'); ?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h3><?php echo $titulo; ?></h3>
                        </div>

                        <?php echo form_open('restrita/sistema/'); ?>

                        <!-- Não precisa disso pois é a abertura PADRÃO de formulários, mas utilizará o form_open (acima) -->
                        <!-- <form name="form_core"> -->
                        <div class="card-body">

                            <?php if ($message = $this->session->flashdata('sucesso')) : ?>
                                <div class="alert alert-success alert-has-icon alert-dismissible show fade">
                                    <div class="alert-icon"><i class="fa fa-check-circle fa-lg"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Sucesso!</div>
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($message = $this->session->flashdata('erro')) : ?>
                                <div class="alert alert-danger alert-has-icon alert-dismissible show fade">
                                    <div class="alert-icon"><i class="fa fa-exclamation-circle fa-lg"></i></div>
                                    <div class="alert-body">
                                        <div class="alert-title">Atenção!</div>
                                        <button class="close" data-dismiss="alert">
                                            <span>&times;</span>
                                        </button>
                                        <?php echo $message; ?>
                                    </div>
                                </div>
                            <?php endif; ?>


                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Razão Social</label>
                                    <input type="text" class="form-control" placeholder="Razão Social da Loja" name="sistema_razao_social" value="<?php echo isset($sistema) ? $sistema->sistema_razao_social : set_value('sistema_razao_social') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_razao_social', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Nome Fantasia</label>
                                    <input type="text" class="form-control" placeholder="Nome Fantasia da Loja" name="sistema_nome_fantasia" value="<?php echo isset($sistema) ? $sistema->sistema_nome_fantasia : set_value('sistema_nome_fantasia') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_nome_fantasia', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>CNPJ</label>
                                    <input type="text" class="form-control cnpj" placeholder="CNPJ da Loja" name="sistema_cnpj" value="<?php echo isset($sistema) ? $sistema->sistema_cnpj : set_value('sistema_cnpj') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_cnpj', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Inscrição Estadual</label>
                                    <input type="text" class="form-control" placeholder="I.E da Loja" name="sistema_ie" value="<?php echo isset($sistema) ? $sistema->sistema_ie : set_value('sistema_ie') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_ie', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Telefone Fixo</label>
                                    <input type="text" class="form-control phone_with_ddd" placeholder="Telefone Fixo da Loja" name="sistema_telefone_fixo" value="<?php echo isset($sistema) ? $sistema->sistema_telefone_fixo : set_value('sistema_telefone_fixo') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_telefone_fixo', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Telefone Móvel</label>
                                    <input type="text" class="form-control sp_celphones" placeholder="Telefone Móvel da Loja" name="sistema_telefone_movel" value="<?php echo isset($sistema) ? $sistema->sistema_telefone_movel : set_value('sistema_telefone_movel') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_telefone_movel', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>E-mail de contato</label>
                                    <input type="text" class="form-control" placeholder="E-mail da Loja" name="sistema_email" value="<?php echo isset($sistema) ? $sistema->sistema_email : set_value('sistema_email') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_email', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>URL da Loja</label>
                                    <input type="text" class="form-control" placeholder="Site da Loja" name="sistema_site_url" value="<?php echo isset($sistema) ? $sistema->sistema_site_url : set_value('sistema_site_url') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_site_url', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>CEP</label>
                                    <input type="text" class="form-control cep" placeholder="CEP" name="sistema_cep" value="<?php echo isset($sistema) ? $sistema->sistema_cep : set_value('sistema_cep') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_cep', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" placeholder="Endereço da Loja" name="sistema_endereco" value="<?php echo isset($sistema) ? $sistema->sistema_endereco : set_value('sistema_endereco') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_endereco', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Número</label>
                                    <input type="text" class="form-control" placeholder="Número da Loja" name="sistema_numero" value="<?php echo isset($sistema) ? $sistema->sistema_numero : set_value('sistema_numero') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_numero', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" placeholder="Cidade da Loja" name="sistema_cidade" value="<?php echo isset($sistema) ? $sistema->sistema_cidade : set_value('sistema_cidade') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_cidade', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>UF</label>
                                    <input type="text" class="form-control" placeholder="Estado da Loja" name="sistema_estado" value="<?php echo isset($sistema) ? $sistema->sistema_estado : set_value('sistema_estado') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_estado', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Quantidade de produtos em destaque</label>
                                    <input type="number" class="form-control cep" placeholder="CEP" name="sistema_produtos_destaques" value="<?php echo isset($sistema) ? $sistema->sistema_produtos_destaques : set_value('sistema_produtos_destaques') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_produtos_destaques', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>URL Facebook</label>
                                    <input type="text" class="form-control" placeholder="Coloque a URL do Facebook (Pós barra)" name="sistema_facebook_url" value="<?php echo isset($sistema) ? $sistema->sistema_facebook_url : set_value('sistema_facebook_url') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_facebook_url', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>URL Instagram</label>
                                    <input type="text" class="form-control" placeholder="Coloque a URL do Instagram (Pós barra)" name="sistema_instagram_url" value="<?php echo isset($sistema) ? $sistema->sistema_instagram_url : set_value('sistema_instagram_url') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('sistema_instagram_url', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary mr-2">Salvar</button>
                        </div>
                        <!-- </form> -->
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('restrita/layout/sidebar_settings'); ?>
</div>