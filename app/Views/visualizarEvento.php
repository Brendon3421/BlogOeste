<?php
echo $this->extend('includes/template');

?>
<?php echo $this->section('content') ?>

<link rel="stylesheet" href="<?php echo base_url("assets/css/visuEvent.css") ?>">

<body>
    <div class="container">
        <form method="get" action="<?php echo base_url('evento/blog/filter'); ?>">
            <div class="row align-items-end">
                <div class="col-md-2 mb-3">
                    <label for="filtro_nome" class="form-label">Titulo:</label>
                    <input type="text" class="form-control" name="filtro_nome" value="<?php echo set_value('filtro_nome', isset($filtro_nome) ? $filtro_nome : ''); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="filtro_cidade" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" name="filtro_cidade" id="cidade" value="<?php echo set_value('filtro_cidade', isset($filtro_cidade) ? $filtro_cidade : ''); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="filtro_estado" class="form-label">Estado:</label>
                    <input type="text" class="form-control" name="filtro_estado" id="estado" value="<?php echo set_value('filtro_estado', isset($filtro_estado) ? $filtro_estado : ''); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="filtro_rua" class="form-label">Rua:</label>
                    <input type="text" class="form-control" name="filtro_rua" id="rua" value="<?php echo set_value('filtro_rua', isset($filtro_rua) ? $filtro_rua : ''); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <label for="filtro_cep" class="form-label">CEP:</label>
                    <input type="text" class="form-control" name="filtro_cep" id="cep" value="<?php echo set_value('filtro_cep', isset($filtro_cep) ? $filtro_cep : ''); ?>">
                </div>
                <div class="col-md-2 mb-3">
                    <input class="btn btn-success" type="submit" value="Filtrar">
                </div>
            </div>
        </form>
    </div>

    <body>
        <div class="container-eventos">
            <?php foreach ($eventos as $event) : ?>
                <div class="event-container">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= base_url($event->imagem); ?>" alt="Imagem do Evento" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?= $event->nome; ?></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Cep:</strong> <?= $event->cep; ?></li>
                            <li class="list-group-item"><strong>Cidade:</strong> <?= $event->cidade; ?></li>
                            <li class="list-group-item"><strong>Estado:</strong> <?= $event->estado; ?></li>
                            <li class="list-group-item"><strong>Rua:</strong> <?= $event->rua; ?></li>

                        </ul>
                        <div class="card-body">
                            <p class="event-info">
                                <strong><a href="<?= base_url('SaibaMais/Evento/' . $event->id); ?>">Saiba mais! ou adicione um comentário sobre a obra</a></strong>

                                <!-- Verifica se o ID do usuário logado é igual ao ID do usuário associado ao evento -->
                                <?php
                                $userIdInSession = session()->get('usuario_id');
                                $eventCreatorUserId = $event->usuario_id;

                                if ($userIdInSession == $eventCreatorUserId) : ?>
                                    <span>
                                        <a href="<?= base_url('SaibaMais/Evento/Edit/' . $event->id); ?>">
                                            <i class="ri-lock-fill" title="Editar notícia"> </i>
                                        </a>
                                    </span>
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        </div>
    </body>

    <?php echo $this->endSection(); ?>