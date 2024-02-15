<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/Login.css") ?>">


    <title>Login</title>

</head>

<body>
    <div class="container">
        <div class="login-container">

            <h2> Blog<span>Oeste</span> </h2>

            <h1>Login to continue</h1>
            <h2 class="errologin">
                <?php if (session()->has('errologin')) : ?>
                    <div><?= session()->getFlashdata('errologin') ?></div>
                <?php endif; ?>

                <?php if (session()->has('erroLog')) : ?>
                    <div><?php session()->getFlashdata('erroLog') ?> </div>]
                <?php endif;  ?>

            </h2>
            <form action="<?php echo base_url('loginProcessamento') ?>" method="post">
                <label for="nome">Username:</label>
                <input type="text" id="nome" name="nome" required placeholder="User"><br>
                <div class=""></div>
                <label for="senha">Password:</label>
                <input type="password" name="senha" id="senha" required placeholder="Password">
                <div class="checkbox">
                    <input type="checkbox" id="mostrarSenha" onclick="mostrarOcultarSenha()"> Show password<br>
                </div>
                <div class="submit">
                    <button type="submit" class="btn-register">Login</button>
                </div>


            </form>
            <div class="register-link">
                Não tem uma conta?<a href="usuarios/adicionar">Cadastrar</a>
            </div>


        </div>

    </div>

    <section>


</body>
<script src="<?php echo base_url('assets/js/login.js') ?>"></script>

</html>