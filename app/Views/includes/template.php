<!doctype html>
<html lang="pt-Br">

<head>
  <title>Modulob</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://unpkg.com/imask"></script>
  <script src="https://cdn.jsdelivr.net/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css") ?>">
</head>

<body>

  <nav class="section__container nav__container">
    <div class="nav__logo">Blog <span>Oeste</span></div>
    <ul class="nav__link">
      <li class="link"><a href="<?php echo base_url("home") ?>">home</a></li>
      <li class="link"><a href="<?php echo base_url("cadastro/Evento/blog") ?>">Adicionar Noticia</a></li>
      <li class="link"><a href="<?php echo base_url("visualizar/Evento/blog") ?>">Noticias</a></li>
    </ul>
    <button class="btn" disabled>Suporte</button>


  </nav>
  <nav class="sidebar close">

    <header>
      <div class="image-text">
        <div class="image-text">
          <span class="imagem">
            <?php if (!empty(session('imagem'))) : ?>
              <a href="#">
                <img src="<?php echo base_url(session('imagem')); ?>" alt="Imagem do Usuário" class="img logo rounded-circle mb-5">
              </a>
            <?php endif; ?>
          </span>
        </div>
        <div class="text header-text">
          <span class="name">
            <div class="nav__logo">Sid<span>bar</span></div>
          </span>
        </div>
        </span>
      </div>

      <i class='bx bxs-arrow-to-right bx-rotate-90 toggle'></i>
    </header>
    <div class="menu-bar">
      <div class="menu">
        <ul class="menu-links">
          <li class="nav-link">
            <a href="<?php echo base_url("cadastro/Evento/blog") ?>">
              <i class='bx bxs-add-to-queue'></i>
              <span class="text nax-text">Adicionar Noticia</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="<?php echo base_url("evento/blog/filter") ?>">
              <i class='bx bx-news'></i>
              <span class="text nax-text">Noticias Recentes</span>
            </a>
          </li>
          <li class="nav-link">
            <?php
            $sessioUser = 'data_login';
            $sessioMercado = 'data_login_mercado';

            if (session()->has('data_login')) {
              $user = session('data_login');
            } elseif (session()->has('data_login_mercado')) {
              $user = session('data_login_mercado');
            } else {
              $user = route_to("modulo");
            }
            ?>
            <a href="#">
              <i class='bx bx-calendar'></i>
              <span class="text nax-text"><?php echo "Data login: " . $user; ?></span>
            </a>
          </li>

          <li class="nav-link">
            <a href="#">
              <i class='bx bx-rename'></i>
              <span class="text nax-text"> <?php echo "" . session('nome'); ?></span>
            </a>
          </li>

          <li class="nav-link">
            <?php
            $user_id = session('usuario_id');
            $mercado_id = session('mercado_id');

            if ($user_id) {
              $route = base_url('usuarios/dados/' . session('usuario_id'));
            } elseif ($mercado_id) {
              $route =  base_url('mercado/dados/' . session('mercado_id'));
            } else {
              $route = route_to("modulo");
            }
            ?>
            <a href="<?= $route ?>">
              <i class='bx bxs-user'></i>
              <span class="text nax-text">Conta</span>
            </a>
          </li>
          <li class="nav-link">
            <a href="<?php echo route_to('logout') ?>">
              <i class='bx bx-log-in'></i>
              <span class="text nax-text">Logout</span>
            </a>
          </li>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php echo $this->renderSection('content') ?>
  </div>

  <body>

</html>


<script src="<?php echo base_url("assets/js/sidebar.js") ?>"></script>