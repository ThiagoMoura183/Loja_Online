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

                        <?php
                        $atributos = [
                            'name' => 'form_core',
                        ];

                        (isset($produto)) ? $produto_id = $produto->produto_id : $produto_id = '';
                        ?>

                        <!-- Multipart serve para enviar imagens, como não será enviado, podemos colocar apenas open -->
                        <?php echo form_open('restrita/produtos/core/' . $produto_id, $atributos); ?>

                        <!-- Não precisa disso pois é a abertura PADRÃO de formulários, mas utilizará o form_open (acima) -->
                        <!-- <form name="form_core"> -->
                        <div class="card-body">

                            <?php if (isset($produto)) : ?>
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label>Meta Link do Produto</label>
                                        <p class="text-info"><?php echo $produto->produto_meta_link ?></p>

                                    </div>
                                </div>
                            <?php endif; ?>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Código do Produto</label>
                                    <input type="text" class="form-control" placeholder="Código do Produto" name="produto_codigo" value="<?php echo isset($produto) ? $produto->produto_codigo : set_value('produto_codigo') ?>" readonly>
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('produto_codigo', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nome do Produto</label>
                                    <input type="text" class="form-control" placeholder="Nome do Produto" name="produto_nome" value="<?php echo isset($produto) ? $produto->produto_nome : set_value('produto_nome') ?>">
                                    <!-- O trecho abaixo é na ordem: o campo que deu erro de validação, abertura do elemento que irá utilizar e por fim o fechamento do elemento.  -->
                                    <?php echo form_error('produto_nome', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Categoria Filha</label>
                                    <select class="form-control" name="produto_categoria_id">

                                    <option value="">Escolha...</option>
                                        <?php foreach ($categorias as $categoria) : ?>
                                            <?php if (isset($produto)) : ?>
                                                <option value="<?php echo $categoria->categoria_id ?>" <?php echo ($categoria->categoria_id == $produto->produto_categoria_id) ? 'selected' : '' ?>><?php echo $categoria->categoria_nome; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $categoria->categoria_id ?>"><?php echo $categoria->categoria_nome; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Marca</label>
                                    <select class="form-control" name="produto_marca_id">
                                    <option value="">Escolha...</option>
                                        <?php foreach ($marcas as $marca) : ?>
                                            <?php if (isset($produto)) : ?>
                                                <option value="<?php echo $marca->marca_id ?>" <?php echo ($marca->marca_id == $produto->produto_marca_id) ? 'selected' : '' ?>><?php echo $marca->marca_nome; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $marca->marca_id ?>"><?php echo $marca->marca_nome; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <?php if (isset($produto)) : ?>
                                    <input type="hidden" name="produto_id" value="<?php echo $produto->produto_id; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary mr-2">Salvar</button>
                            <a class="btn btn-dark" href="<?php echo base_url('restrita/produtos'); ?>">Voltar</a>
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