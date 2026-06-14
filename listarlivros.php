<?php
session_start();
require 'conexao.php';

$sql = "SELECT * FROM livros";

if (isset($_GET['filtrar_livro']) && !empty($_GET['genero'])) {
    $genero = mysqli_real_escape_string($conexao, $_GET['genero']);
    $sql .= " WHERE genero = '$genero'";
}

$livros = mysqli_query($conexao, $sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIBLIOTEC - LISTAR LIVROS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include('navbar.php'); ?>

<div class="container mt-4">

    <?php include('mensagem.php'); ?>

    <div class="card">

        <div class="card-header">
            <h4>Lista de Livros</h4>
                <div class=" btn-group float-end">
                            <a href="criar-livro.php" class="btn btn-primary ">ADICIONAR LIVRO</a>
                            <a href="paginainicial.php" class="btn btn-danger ">VOLTAR</a>
                            </div>
            
        </div>

        <div class="card-body">

            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="genero" class="form-control">
                            <option value="">Todos os gêneros</option>

                            <option value="Ação">Ação</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Autoajuda">Autoajuda</option>
                            <option value="Biografia">Biografia</option>
                            <option value="Comédia">Comédia</option>
                            <option value="Conto">Conto</option>
                            <option value="Crônica">Crônica</option>
                            <option value="Drama">Drama</option>
                            <option value="Fantasia">Fantasia</option>
                            <option value="Ficção Científica">Ficção Científica</option>
                            <option value="História">História</option>
                            <option value="Horror">Horror</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Mistério">Mistério</option>
                            <option value="Poesia">Poesia</option>
                            <option value="Policial">Policial</option>
                            <option value="Romance">Romance</option>
                            <option value="Suspense">Suspense</option>
                            <option value="Terror">Terror</option>
                            <option value="Tragédia">Tragédia</option>
                            <option value="Young Adult">Young Adult</option>

                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name="filtrar_livro" class="btn btn-primary">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th>Quantidade</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    if (mysqli_num_rows($livros) > 0) {
                        foreach ($livros as $livro) {
                    ?>

                    <tr>
                        <td><?= $livro['id_livro']; ?></td>
                        <td><?= $livro['titulo']; ?></td>
                        <td><?= $livro['autor']; ?></td>
                        <td><?= $livro['genero']; ?></td>
                        <td><?= $livro['quantidade']; ?></td>

                        <td>
                            <a href="visualizar-livro.php?id=<?= $livro['id_livro']; ?>"
                               class="btn btn-secondary btn-sm">
                               VISUALIZAR
                            </a>

                            <a href="editar-livro.php?id=<?= $livro['id_livro']; ?>"
                               class="btn btn-success btn-sm">
                               EDITAR
                            </a>

                            <form action="acoesdolivro.php" method="POST" class="d-inline">
                                <button
                                    onclick="return confirm('Tem certeza que deseja excluir?')"
                                    type="submit"
                                    name="delete_livro"
                                    value="<?= $livro['id_livro']; ?>"
                                    class="btn btn-danger btn-sm">
                                    EXCLUIR
                                </button>
                            </form>
                        </td>
                    </tr>

                    <?php
                        }
                    } else {
                        echo '<tr><td colspan="6">Nenhum livro encontrado!</td></tr>';
                    }
                    ?>

                </tbody>
            </table>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>