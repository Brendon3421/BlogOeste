<?php echo $this->extend('includes/template'); ?>

<?php echo $this->section('content'); ?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/listaUsuario.css") ?>">


<div class="filtro">
    <form method="get" action="<?php echo base_url('usuarios/filtro'); ?>">
        <label for="filtro_nome">Nome:</label>
        <input type="text" name="filtro_nome" value="<?php echo set_value('filtro_nome', isset($filtro_nome) ? $filtro_nome : ''); ?>">

        <label for="filtro_email">Email:</label>
        <input type="text" name="filtro_email" value="<?php echo set_value('filtro_email', isset($filtro_email) ? $filtro_email : ''); ?>">

        <label for="filtro_cpf">CPF:</label>
        <input type="text" name="filtro_cpf" id="cpf" value="<?php echo set_value('filtro_cpf', isset($filtro_cpf) ? $filtro_cpf : ''); ?>">

        <label for="filtro_numero">Numero:</label>
        <input type="text" name="filtro_numero" id="numero" value="<?php echo set_value('filtro_numero', isset($filtro_numero) ? $filtro_numero : ''); ?>">




        <label for="filtro_nascimento">Data de Nascimento:</label>
        <input type="text" name="filtro_nascimento" placeholder="Data de Nascimento (DD/MM/AAAA)" id="data_nascimento" value="<?php echo set_value('filtro_nascimento', isset($filtro_nascimento) ? $filtro_nascimento : ''); ?>">


        <input class="btn btn-success" type="submit" >
    </form>
</div>
</div>
<div class="container">

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>mercado_id</th>
                    <th>Senha</th>
                    <th>Email</th>
                    <th>cpf</th>
                    <th>Numero</th>
                    <th>Data de Nascimento</th>
                    <th>genero</th>
                    <th>data de cadastro</th>
                    <th>opção</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario->nome; ?></td>
                        <td><?= $usuario->mercado_id; ?></td>
                        <td><?= $usuario->senha; ?></td>
                        <td><?= $usuario->email; ?></td>
                        <td><?= $usuario->cpf; ?></td>
                        <td><?= $usuario->numero ?></td>
                        <td><?= $usuario->data_nascimento; ?></td>
                        <td><?= $usuario->nome_genero ?></td>
                        <td><?= timestamp2br($usuario->created_at) ?></td>

                        <td>
                            <a href="<?= base_url('usuarios/edit/' . $usuario->id); ?>" class="edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('usuarios/excluir/' . $usuario->id); ?>" class="delete-link">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="<?php echo base_url('assets/js/editaruser.js') ?>"></script>
    <?php echo $this->endSection(); ?>