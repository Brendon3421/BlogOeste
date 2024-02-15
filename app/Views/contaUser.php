<?php
echo $this->extend('includes/template');

?>
<?php echo $this->section('content') ?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/editarUser.css") ?>">


<?php if (session()->has('erros')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php
            $erros = session()->getFlashdata('erros');
            if (is_array($erros)) {
                foreach ($erros as $error) : ?>
                    <li><?= $error ?></li>
            <?php endforeach;
            } else {
                echo $erros;
            }
            ?>
        </ul>
    </div>
<?php endif; ?>

<div class="sucess">
    <?php if (session()->has('sucess')) : ?>
        <div class="alert alert-sucess">
            <ul>
                <?php
                $sucess = session()->getFlashdata('sucess');
                if (is_array($sucess)) {
                    foreach ($sucess as $s) : ?>
                        <li><?= $s ?></li>
                <?php endforeach;
                } else {
                    echo $sucess;
                }
                ?>
            </ul>
        </div>
    <?php endif; ?>
</div>


<body>
    <div class="container">
        <h1>Usuário</h1>

        <form action="<?php echo base_url("usuarios/editado/{$usuario->id}") ?>" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">



            <?php if (session()->has('message')) : ?>
                <div><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required placeholder="Nome" value="<?= $usuario->nome; ?>"><br>
            <div class="text-danger"><?php echo session()->getFlashdata('erro')['nome'] ?? ''; ?></div>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" placeholder="Senha">

            <input type="checkbox" id="mostrarSenha" onclick="mostrarOcultarSenha()"> Mostrar Senha<br>

            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" placeholder="Confirmar Senha"><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" required placeholder="E-mail" value="<?= $usuario->email; ?>"><br>
            <div class="text-danger"><?php echo session()->getFlashdata('erro')['email'] ?? ""; ?></div>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" disabled required placeholder="CPF (apenas números)" id="cpf" value="<?= $usuario->cpf; ?>"><br>
            <div class="text-danger"><?php echo session()->getFlashdata('erro')['cpf']  ?? ''; ?></div>

            <label for="numero">Número:</label>
            <input type="text" name="numero" required placeholder="Número (apenas números)" id="numero" value="<?= $usuario->numero; ?>"><br>
            <div class="text-danger"><?php echo session()->getFlashdata('erro')['numero'] ?? ''; ?></div>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="text" name="data_nascimento" required placeholder="Data de Nascimento (DD/MM/AAAA)" id="data_nascimento" value="<?= $usuario->data_nascimento; ?>"><br>


            <div class="genero">
                <input type="radio" id="female" name="genero_id" value="1" <?php echo ($usuario->genero_id == 1) ? 'checked' : ''; ?>>
                <label for="female">Feminino</label>

                <input type="radio" id="male" name="genero_id" value="2" <?php echo ($usuario->genero_id == 2) ? 'checked' : ''; ?>>
                <label for="male">Masculino</label>

                <input type="radio" id="other" name="genero_id" value="3" <?php echo ($usuario->genero_id == 3) ? 'checked' : ''; ?>>
                <label for="other">Outro</label>

            </div>

            <div class="upload-file">
                <label for="imagem">Nova imagem:</label>
                <input type="file" name="imagem" id="imagem" accept=".png, .jpg, .jpeg">
                <?php if (!empty(session('imagem'))) : ?>
                    <p>Imagem Atual:</p>
                    <img src="<?= base_url(session('imagem')) ?>" class="img logo rounded-circle mb-3" alt="Imagem Atual">
                <?php endif; ?>

            </div>

            <button type="submit" class="btn-register" value="Registrar">Alterar</button>
        </form>

        </form>
    </div>
    <script src="<?php echo base_url('assets/js/editarUser.js') ?>"></script>


</body>
<?php echo $this->endSection(); ?>