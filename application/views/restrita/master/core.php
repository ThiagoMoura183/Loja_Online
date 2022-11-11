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
                            <h4><?php echo $titulo; ?></h4>
                        </div>

                        <?php
                        $atributos = [
                            'name' => 'form_core',
                        ];

                        (isset($marca)) ? $marca_id = $marca->marca_id : $marca_id = '';
                        ?>

                        <!-- Multipart serve para enviar imagens, como não será enviado, podemos colocar apenas open -->
                        <?php echo form_open('restrita/marcas/core/' . $marca_id, $atributos); ?>

                        <!-- Não precisa disso pois é a abertura PADRÃO de formulários, mas utilizará o form_open (acima) -->
                        <!-- <form name="form_core"> -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Nome da Marca</label>
                                    <input type="text" class="form-control" placeholder="Nome da Marca" name="marca_nome" value="<?php echo isset($marca) ? $marca->marca_nome : set_value('marca_nome') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('marca_nome', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Ativo?</label>
                                    <select class="form-control" name="marca_ativa">
                                        <?php if (isset($marca)) : ?>
                                            <option value="1" <?php echo ($marca->marca_ativa == 1) ? 'selected' : '' ?>>Sim</option>
                                            <option value="0" <?php echo ($marca->marca_ativa == 0) ? 'selected' : '' ?>>Não</option>
                                        <?php else : ?>
                                            <option value="1">Sim</option>
                                            <option value="0">Não</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <?php if (isset($marca)) : ?>
                                <div class="form-group col-md-4">
                                    <label>Meta Link</label>
                                    <input type="text" class="form-control border-0" placeholder="Meta Link da Marca" name="marca_meta_link" value="<?php echo $marca->marca_meta_link ?>" readonly="">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('marca_meta_link', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <?php endif; ?>

                            </div>
                            <div class="form-row">
                                <?php if (isset($marca)) : ?>
                                    <input type="hidden" name="marca_id" value="<?php echo $marca->marca_id; ?>">
                                <?php endif; ?>
                            </div>  
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary mr-2">Salvar</button>
                            <a class="btn btn-dark" href="<?php echo base_url('restrita/marcas'); ?>">Voltar</a>
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