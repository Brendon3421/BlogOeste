<?php
echo $this->extend('includes/template');
?>
<?php echo $this->section('content') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/addblog.css")?>">
</head>
<body>
    <div class="content">
        <?php if (session()->has('sucess')) : ?>
            <div class="alert alert-primary" role="alert"><?= session()->getFlashdata('sucess'); ?></div>
        <?php endif; ?>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <div class="col-md-3">
                    <div class="mb-3">
                        <label class="form-label">Sua Latitude</label>
                        <h2 class="lead">Sua longitude:</h2>
                    </div>
                </div>
            </div>
        </nav>

        <form method="post" action="<?php echo base_url("processamento-adicionar/Evento") ?>" enctype="multipart/form-data">
            <div id="appCep">
                <div class="formulario">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <input type="text" name="nome" id="Nome" class="form-control">
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['nome'] ?? ''; ?></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email" id="Nome" class="form-control">
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['Email'] ?? ''; ?></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="cep" class="form-label">Cep</label>
                                <input name="cep" type="text" id="cep" value="" size="10" maxlength="9" class="form-control" onblur="pesquisacep(this.value);" /></label><br />
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['cep'] ?? ''; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">rua</label>
                                <input type="text" name="rua" id="rua" class="form-control">
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['rua'] ?? ''; ?></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control">
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['bairro'] ?? ''; ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Cidade</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" readonly>
                                    <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['cidade'] ?? ''; ?></div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">estado</label>
                                    <input type="text" name="estado" id="uf" class="form-control" readonly>
                                    <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['estado'] ?? ''; ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">IBGE</label>
                                <input type="text" name="ibge" id="ibge" class="form-control" readonly>
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['ibge'] ?? ''; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">DDD</label>
                                <input type="text" name="ddd" id="ddd" class="form-control" readonly>
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['ddd'] ?? ''; ?></div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">GIA</label>
                                <input name="gia" id="gia" type="text" class="form-control" readonly>
                                <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['gia'] ?? ''; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <div class="mb-3">
                    <label for="form-label">Imagem:</label>
                    <input type="file" name="imagem" class="form-control" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept=".png, .jpg, .jpeg" multiple>
                    <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['imagem'] ?? ''; ?></div>
                </div>
            </div>

            <div class="input-group">
                <div class="mb-3">
                    <label for="form-label">Video:</label>
                    <input type="file" name="videos" class="form-control" id="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" accept="video/*" multiple>
                    <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['video'] ?? ''; ?></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="mb-3">
                    <span class="input-group-text">Descrição</span>
                    <textarea class="form-control" style="height: 100px; width: 300px;" aria-label="With textarea" id="descricao" name="descricao"></textarea>
                    <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['descricao'] ?? ''; ?></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sua longitude</label>
                        <input type="text" name="longitude" id="longitude" class="form-control" readonly>
                        <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['longitude'] ?? ''; ?></div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Sua Latitude</label>
                        <input type="text" name="latitude" id="Latitude" class="form-control" readonly>
                        <div class="text-danger"> <?php echo  session()->getFlashdata('erros')['latitude'] ?? ''; ?></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="mb-3">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Button</button>
                    </div>
                </div>
        </form>

    </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="<?php echo base_url('assets/js/apicidade.js') ?>"></script>
<?php echo $this->endSection(); ?>