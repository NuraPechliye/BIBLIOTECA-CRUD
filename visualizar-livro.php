<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include('navbar.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    <h4>
                        Visualizar Livro
                        <a href="listarlivros.php" class="btn btn-danger float-end">
                            Voltar
                        </a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {

                        $id_livro = mysqli_real_escape_string($conexao, $_GET['id']);

                        $sql = "SELECT * FROM livros WHERE id_livro='$id_livro'";
                        $query = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($query) > 0) {

                            $livro = mysqli_fetch_array($query);
                    ?>

                    <div class="mb-3">
                        <label>Código:</label>
                        <p class="form-control">
                            <?= $livro['id_livro']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Título:</label>
                        <p class="form-control">
                            <?= $livro['titulo']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Autor:</label>
                        <p class="form-control">
                            <?= $livro['autor']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Gênero:</label>
                        <p class="form-control">
                            <?= $livro['genero']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Quantidade:</label>
                        <p class="form-control">
                            <?= $livro['quantidade']; ?>
                        </p>
                    </div>

                    <?php
                        } else {
                            echo '<h5>Livro não encontrado</h5>';
                        }
                    }
                    ?>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>