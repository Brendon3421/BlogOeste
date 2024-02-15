
<?php 
echo $this->extend('includes/template');

?>
<?php  echo $this->section('content')?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/editarUser.css")?>">



<div class="errros"></div>
<?php if (session()->has('erros')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session()->getFlashdata('erros') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<body>
    <div class="container">
        <h1>Registrar Usuário</h1>
        <form action="<?= base_url('usuarios/add') ?>" method="post"  enctype="multipart/form-data" onsubmit="return validateForm(); ">
            <?php if (session()->has('message')) : ?>
                <div><?= session()->getFlashdata('message') ?></div>
            <?php endif; ?>

            <label for="nome">Nome:</label>
            <input type="text" name="nome" required placeholder="Nome"><br>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required placeholder="Senha">
            <input type="checkbox" id="mostrarSenha" onclick="mostrarOcultarSenha()"> Mostrar Senha<br>

            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" name="confirmar_senha" required placeholder="Confirmar Senha"><br>

            <label for="email">E-mail:</label>
            <input type="email" name="email" required placeholder="E-mail"><br>

            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required placeholder="CPF (apenas números)" id="cpf"><br>

            <label for="numero">Número:</label>
            <input type="text" name="numero" required placeholder="Número (apenas números)" id="numero"><br>

            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="text" name="data_nascimento" required placeholder="Data de Nascimento (DD/MM/AAAA)" id="data_nascimento"><br>
            
            <div class="genero">

    <input type="radio" id="female" name="genero_id" value="1">
    <label for="female">Feminino</label>
    
    <input type="radio" id="male" name="genero_id" value="2">
    <label for="male">Masculino</label>

    <input type="radio" id="other" name="genero_id" value="3">
    <label for="other">Outro</label>
</div>




<div class="upload-file">
    <label for="imagem">Imagem do Produto:</label>
    <input type="file" name="imagem" id="imagem" required accept=".png, .jpg, .jpeg">
    <?php echo  session()->getFlashdata('erros')['imagem'] ?? ''; ?>

  </div>
            <button type="submit" class="btn-register" value="Registrar">Registrar</button>
        </form>

        </form>
    </div>




<script src="<?php  echo base_url('assets/js/userADicionar.js')?>"></script>

<?php echo $this->endSection();?>

