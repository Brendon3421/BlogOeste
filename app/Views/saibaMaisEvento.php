<?php
echo $this->extend('includes/template');

?>
<?php echo $this->section('content') ?>



<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/saibamais.css") ?>">
</head>


<div class="container">

    <body>
        <header>
            <?php if (session()->has('sucess')) : ?>
                <div class="alert alert-primary" role="alert"><?= session()->getFlashdata('sucess'); ?></div>
            <?php endif; ?>

        </header>
        <div class="container">
            <div class="item cabecalho">
                <div class="titulo">
                    <h5 class="card-title"><?= $event->nome; ?></h5>
                </div>
            </div>
            <div class="item menu-lateral">
                <img src="<?php echo base_url($event->imagem); ?>" alt="">
                <video width="640" height="360" controls>
                    <source src="<?php echo base_url($event->video); ?>" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
                <div class="formulario">
                    <h1>Local</h1>

                    <div class="mb-3">
                        <label for="cep" class="form-label">Cep</label>
                        <input name="cep" type="text" id="cep" value="<?= $event->cep ?>" size="10" maxlength="9" class="form-control" onblur="pesquisacep(this.value);" disabled />
                        <div class="text-danger"> <?php echo session()->getFlashdata('erros')['cep'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">rua</label>
                        <input type="text" name="rua" value="<?= $event->rua ?>" id="rua" class="form-control" disabled>
                        <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['rua'] ?? ''; ?></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Cidade</label>
                        <input type="text" name="cidade" value="<?= $event->cidade ?>" id="cidade" class="form-control" readonly>
                        <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['cidade'] ?? ''; ?></div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">estado</label>
                        <input type="text" name="estado" value="<?= $event->estado ?>" id="uf" class="form-control" readonly>
                        <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['estado'] ?? ''; ?></div>
                    </div>
                </div>
                </form>
            </div>
            <div class="item principal">Conteúdo Principal

                <p class="descricao"><?= $event->descricao ?></p>

            </div>

            <div class="item rodape">
                <footer>
                    <div class="content-coment">
                        <section class="section-coment">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2>Adicionar Comentário</h2>
                                    <form method="post" action="<?= base_url('comentarios/adicionar')  ?> " enctype="multipart/form-data">
                                        <input type="hidden" name="evento_id" value="<?= $event->id ?>">
                                        <div class="mb-10">
                                            <label for="nome" class="form-label">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome" required>
                                            <div class="text-danger"><?php echo session()->getFlashdata('erros')['nome'] ?? ''; ?></div>
                                        </div>
                                        <div class="mb-10">
                                            <label for="email" class="form-label">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            <div class="text-danger"><?php echo session()->getFlashdata('erros')['email'] ?? ''; ?></div>

                                        </div>
                                        <div class="mb-10">
                                            <label for="descricao" class="form-label">Mensagem:</label>
                                            <textarea class="form-control" id="mensagem" name="descricao" required></textarea>
                                            <div class="text-danger"><?php echo session()->getFlashdata('erros')['descricao'] ?? ''; ?></div>
                                        </div>
                                        <div class="input-group">
                                            <div class="mb-10">
                                                <label for="form-label">Imagem da população:</label>
                                                <input type="file" name="imagem" class="form-control" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".png, .jpg, .jpeg" multiple>
                                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['imagem'] ?? ''; ?></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Adicionar Comentário</button>
                        </section>

                        </form>
                        <footer>
                            <div class="comentarios">
                                <?php if (!empty($comentarios)) : ?>
                                    <h3 id="comentario">Comentários Anteriores</h3>
                                    <ul class="list-group">
                                        <?php foreach ($comentarios as $comentario) : ?>
                                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                                <div class="ms-2 me-auto">
                                                    <strong>Email:</strong> <?= $comentario->email ?>
                                                </div>
                                                <div class="ms-2 me-auto">
                                                    <strong><?= $comentario->nome ?></strong> disse: <?= $comentario->descricao ?><br>
                                                </div>
                                                <?php if (!empty($comentario->imagem)) : ?>
                                                    <img src="<?= base_url($comentario->imagem); ?>" alt="Imagem do Comentário" class="imagem-comentario" style="width: 160px; height:160px ">
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else : ?>
                                    <p>Nenhum comentário ainda. Seja o primeiro a comentar!</p>
                                <?php endif; ?>
                            </div>
                        </footer>

                    </div>
            </div>




    </body>
</div>

</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script src="<?php echo base_url('assets/js/apicidade.js') ?>"></script>
<?php echo $this->endSection(); ?>