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

                        (isset($usuario)) ? $usuario_id = $usuario->id : $usuario_id = '';
                        ?>

                        <!-- Multipart serve para enviar imagens, como não será enviado, podemos colocar apenas open -->
                        <?php echo form_open('restrita/usuarios/core/' . $usuario_id, $atributos); ?>

                        <!-- Não precisa disso pois é a abertura PADRÃO de formulários, mas utilizará o form_open (acima) -->
                        <!-- <form name="form_core"> --> 
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" placeholder="Nome" name="first_name" value="<?php echo isset($usuario) ? $usuario->first_name : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Sobrenome</label>
                                        <input type="text" class="form-control" placeholder="Sobrenome" name="last_name" value="<?php echo isset($usuario) ? $usuario->last_name : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" placeholder="E-mail" name="email" value="<?php echo isset($usuario) ? $usuario->email : '' ?>">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Usuário</label>
                                        <input type="text" class="form-control" placeholder="Usuário (login)" name="username" value="<?php echo isset($usuario) ? $usuario->username : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Senha</label>
                                        <input type="password" class="form-control" placeholder="Senha" name="password">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Confirmar a senha</label>
                                        <input type="text" class="form-control" placeholder="Confirme a senha" name="confirma">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Ativo?</label>
                                        <select class="form-control" name="active">
                                            <?php if (isset($usuario)) : ?>
                                                <option value="1" <?php echo ($usuario->active == 1) ? 'selected' : '' ?>>Sim</option>
                                                <option value="0" <?php echo ($usuario->active == 0) ? 'selected' : '' ?>>Não</option>
                                            <?php else : ?>
                                                <option value="1">Sim</option>
                                                <option value="0">Não</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Perfil de Acesso</label>
                                        <select class="form-control" name="perfil">

                                            <?php foreach ($grupos as $grupo) : ?>
                                                <?php if (isset($usuario)) : ?>
                                                    <option value="<?php echo $grupo->id; ?>" <?php echo ($grupo->id == $perfil->id ? 'selected' : ''); ?>>
                                                        <?php echo $grupo->name ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $grupo->id; ?>">
                                                        <?php echo $grupo->name ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>

                                    <?php if (isset($usuario)) : ?>
                                        <input type="hidden" name="usuario_id" value="<?php echo $usuario->id; ?>">
                                    <?php endif; ?>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-2">Salvar</button>
                                <a class="btn btn-dark" href="<?php echo base_url('restrita/usuarios'); ?>">Voltar</a>
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