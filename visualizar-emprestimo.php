<?php
require 'conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Empréstimo</title>
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
                        Visualizar Empréstimo
                        <a href="listaremprestimos.php" class="btn btn-danger float-end">
                            Voltar
                        </a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {

                        $id = mysqli_real_escape_string($conexao, $_GET['id']);

                        $sql = "SELECT 
                                    e.id_emprestimos,
                                    a.nome AS nome_aluno,
                                    l.titulo AS titulo_livro,
                                    e.data_emprestimo,
                                    e.data_vencimento,
                                    e.status
                                FROM emprestimos e
                                INNER JOIN alunos a ON e.id_aluno = a.id
                                INNER JOIN livros l ON e.id_livro = l.id_livro
                                WHERE e.id_emprestimos = '$id'";

                        $query = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($query) > 0) {

                            $emprestimo = mysqli_fetch_array($query);
                    ?>

                    <div class="mb-3">
                        <label>ID Empréstimo:</label>
                        <p class="form-control">
                            <?= $emprestimo['id_emprestimos']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Livro:</label>
                        <p class="form-control">
                            <?= $emprestimo['titulo_livro']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Aluno:</label>
                        <p class="form-control">
                            <?= $emprestimo['nome_aluno']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Data do Empréstimo:</label>
                        <p class="form-control">
                            <?= $emprestimo['data_emprestimo']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Data de Vencimento:</label>
                        <p class="form-control">
                            <?= $emprestimo['data_vencimento']; ?>
                        </p>
                    </div>

                    <div class="mb-3">
                        <label>Status:</label>
                        <p class="form-control">
                            <?= $emprestimo['status']; ?>
                        </p>
                    </div>

                    <?php
                        } else {
                            echo '<h5>Empréstimo não encontrado</h5>';
                        }

                    } else {
                        echo '<h5>ID não informado</h5>';
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