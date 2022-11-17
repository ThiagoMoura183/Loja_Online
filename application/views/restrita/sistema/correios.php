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

                        <?php echo form_open('restrita/sistema/correios'); ?>

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
                                <div class="form-group col-md-2">
                                    <label>CEP de Origem</label>
                                    <input type="text" class="form-control cep" placeholder="CEP de Origem" name="config_cep_origem" value="<?php echo isset($correio) ? $correio->config_cep_origem : set_value('config_cep_origem') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('config_cep_origem', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Código de Serviço PAC</label>
                                    <input type="text" class="form-control codigo_servico_correios" placeholder="Código de Serviço PAC" name="config_codigo_pac" value="<?php echo isset($correio) ? $correio->config_codigo_pac : set_value('config_codigo_pac') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('config_codigo_pac', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Código de Serviço SEDEX</label>
                                    <input type="text" class="form-control codigo_servico_correios" placeholder="Código de Serviço SEDEX" name="config_codigo_sedex" value="<?php echo isset($correio) ? $correio->config_codigo_sedex : set_value('config_codigo_sedex') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('config_codigo_sedex', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor de Soma ao Frete</label>
                                    <input type="text" class="form-control money2" placeholder="Valor de Soma ao Frete" name="config_somar_frete" value="<?php echo isset($correio) ? $correio->config_somar_frete : set_value('config_somar_frete') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('config_somar_frete', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor Declarado</label>
                                    <input type="text" class="form-control money2" placeholder="Valor Declarado" name="config_valor_declarado" value="<?php echo isset($correio) ? $correio->config_valor_declarado : set_value('config_valor_declarado') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('config_valor_declarado', '<div class="text-danger">', '</div>'); ?>
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