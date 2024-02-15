<?php
echo $this->extend('includes/template');

?>
<?php echo $this->section('content') ?>
<link rel="stylesheet" href="<?php echo base_url("assets/css/listaProduto.css") ?>">

<title>Lista produto</title>



<body>
    <h1>List Product</h1>
    <div class="cotanier-filtro-table">
        <div class="filtro">
            <form method="get" action="<?= base_url('produto/filtrarProdutos'); ?>">
                <div class="nome">
                    <label for="filtro_nome">Nome:</label>
                    <input type="text" name="filtro_nome" value="<?php echo set_value('filtro_nome', isset($filtro_nome) ? $filtro_nome : ''); ?>">
                </div>
                <div class="email">
                    <label for="filtro_email">codigo de barra:</label>
                    <input type="number" name="filtro_codigoBarra" value="<?php echo set_value('filtro_codigoBarra', isset($filtro_codigoBarra) ? $filtro_codigoBarra : ''); ?>">
                </div>

                <div class="inicial">
                    <label for="filtro_data_entrada_inicial">Data de Entrada (Inicial):</label>
                    <input type="date" name="filtro_data_entrada_inicial" value="<?= set_value('filtro_data_entrada_inicial', isset($filtro_data_entrada_inicial) ? $filtro_data_entrada_inicial : ''); ?>">
                </div>

                <div class="final">
                    <label for="filtro_data_entrada_final">Data de Entrada (Final):</label>
                    <input type="date" name="filtro_data_entrada_final" value="<?= set_value('filtro_data_entrada_final',  isset($filtro_data_entrada_final) ? $filtro_data_entrada_final : ''); ?>">
                </div>

                <div class="categoria">
                    <label for="id_categoria">Selecione uma categoria:</label>
                    <select name="categoria_id" id="categoria_id">

                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="0" <?= set_select('todos', '0', ($categoria ?? '') == '0'); ?>>todos</option>
                            <option value="<?= $categoria->id ?>"><?= $categoria->nome ?></option>
                        <?php endforeach; ?>


                </div>
                <div class="status">
                    </select>

                    <label name="status_id">Selecione um status</label>
                    <select name="status_id" id="status_id">
                        <option value="0" <?= set_select('todos', '0', ($status_id ?? '') == '0'); ?>>todos</option>
                        <option value="2" <?= set_select('status_id', '2', ($status_id ?? '') == '2'); ?>>Disponível</option>
                        <option value="1" <?= set_select('status_id', '1', ($status_id ?? '') == '1'); ?>>Indisponível</option>
                    </select>
                </div>
                <div class="submit">
                    <input class="btn btn-success" type="submit" value="Filtrar">
                </div>
            </form>

        </div>

        <div class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>codigo de barra</th>
                            <th>quantidade</th>
                            <th>data de entrada</th>
                            <th>data de vencimento</th>
                            <th>peso</th>
                            <th>descrição</th>
                            <th>status do Produto</th>
                            <th>Categoria do Produto</th>
                            <th>Imagem</th>
                            <th>data de cadastro do produto</th>
                            <th>Status</th>
                            <th>option</th>

                        </tr>
                    </thead>
            </div>
            <tbody>
                <?php foreach ($produtos as $produto) : ?>
                    <tr>
                        <td><?= $produto->nome; ?></td>
                        <td><?= $produto->valor; ?></td>
                        <td><?= $produto->codigo_barra; ?></td>
                        <td><?= $produto->quantidade ?></td>
                        <td><?= br2bd($produto->data_entrada) ?></td>
                        <td><?= br2bd($produto->data_vencimento) ?></td>
                        <td><?= $produto->peso ?></td>
                        <td><?= $produto->descricao; ?></td>
                        <td><?= $produto->nome_status; ?></td>
                        <td><?= $produto->nome_categoria; ?></td>
                        <td><img src="<?php echo base_url('imgs/imgsuser' . $produto->imagem); ?>" alt="Imagem do Produto"></td>

                        <td><?= timestamp2br($produto->created_at) ?></td>

                        <td><?= entrada_Menor($produto->data_vencimento) ?></td>


                        <td>
                            <a href="<?= base_url('produto/lista/editar/' . $produto->id); ?>" class="edit-link">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="<?= base_url('produto/excluir/' . $produto->id); ?>" class="delete-link">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
    <?php echo $this->endSection(); ?>