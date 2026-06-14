<?php
require 'conexao.php';

// Buscar alunos
$sql_alunos = "SELECT id, nome FROM alunos";
$alunos = mysqli_query($conexao, $sql_alunos);

// Buscar livros
$sql_livros = "SELECT id_livro, titulo FROM livros";
$livros = mysqli_query($conexao, $sql_livros);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Empréstimo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<?php include('navbar.php'); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>Adicionar Empréstimo
                        <a href="listaremprestimos.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>

                <div class="card-body">

                    <form action="acoesdoemprestimo.php" method="POST">

                        <!-- ALUNO -->
                        <div class="mb-3">
                            <label>Aluno:</label>
                            <select name="id_aluno" class="form-control" required>
                                <option value="">Selecione o aluno</option>
                                <?php foreach ($alunos as $aluno) { ?>
                                    <option value="<?= $aluno['id']; ?>">
                                        <?= $aluno['nome']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- LIVRO -->
                        <div class="mb-3">
                            <label>Livro:</label>
                            <select name="id_livro" class="form-control" required>
                                <option value="">Selecione o livro</option>
                                <?php foreach ($livros as $livro) { ?>
                                    <option value="<?= $livro['id_livro']; ?>">
                                        <?= $livro['titulo']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- DATA EMPRÉSTIMO -->
                        <div class="mb-3">
                            <label>Data do Empréstimo:</label>
                            <input type="date" name="data_emprestimo" class="form-control" required>
                        </div>

                        <!-- DATA VENCIMENTO -->
                        <div class="mb-3">
                            <label>Data de Vencimento:</label>
                            <input type="date" name="data_vencimento" class="form-control" required>
                        </div>

                        <!-- STATUS -->
                        <div class="mb-3">
                            <label>Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="Pendente">Pendente</option>
                                <option value="Vencido">Vencido</option>
                                <option value="Devolvido">Devolvido</option>
                            </select>
                        </div>

                        <!-- BOTÃO -->
                        <div class="mb-3">
                            <button type="submit" name="create_emprestimo" class="btn btn-primary">
                                Salvar
                            </button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>