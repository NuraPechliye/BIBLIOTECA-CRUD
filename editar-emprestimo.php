<?php
session_start();
require 'conexao.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Empréstimo</title>
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
        Editar Empréstimo
        <a href="listaremprestimos.php" class="btn btn-danger float-end">Voltar</a>
    </h4>
</div>

<div class="card-body">

<?php
if (isset($_GET['id'])) {

    $id = mysqli_real_escape_string($conexao, $_GET['id']);

    $sql = "SELECT * FROM emprestimos WHERE id_emprestimos='$id'";
    $query = mysqli_query($conexao, $sql);

    if ($query && mysqli_num_rows($query) > 0) {

        $emprestimo = mysqli_fetch_array($query);

        // alunos
        $sql_alunos = "SELECT id, nome FROM alunos";
        $alunos = mysqli_query($conexao, $sql_alunos);

        // livros
        $sql_livros = "SELECT id_livro, titulo FROM livros";
        $livros = mysqli_query($conexao, $sql_livros);
?>

<form action="acoesdoemprestimo.php" method="POST">

<input type="hidden" name="id_emprestimos" value="<?= $emprestimo['id_emprestimos'] ?>">

<!-- ALUNO -->
<div class="mb-3">
    <label>Aluno:</label>
    <select name="id_aluno" class="form-control">

        <?php foreach ($alunos as $aluno) { ?>
            <option value="<?= $aluno['id']; ?>"
                <?= ($emprestimo['id_aluno'] == $aluno['id']) ? 'selected' : '' ?>>
                <?= $aluno['nome']; ?>
            </option>
        <?php } ?>

    </select>
</div>

<!-- LIVRO -->
<div class="mb-3">
    <label>Livro:</label>
    <select name="id_livro" class="form-control">

        <?php foreach ($livros as $livro) { ?>
            <option value="<?= $livro['id_livro']; ?>"
                <?= ($emprestimo['id_livro'] == $livro['id_livro']) ? 'selected' : '' ?>>
                <?= $livro['titulo']; ?>
            </option>
        <?php } ?>

    </select>
</div>

<!-- DATA EMPRÉSTIMO -->
<div class="mb-3">
    <label>Data Empréstimo:</label>
    <input type="date" name="data_emprestimo"
        value="<?= $emprestimo['data_emprestimo'] ?>"
        class="form-control">
</div>

<!-- DATA VENCIMENTO -->
<div class="mb-3">
    <label>Data Vencimento:</label>
    <input type="date" name="data_vencimento"
        value="<?= $emprestimo['data_vencimento'] ?>"
        class="form-control">
</div>

<!-- STATUS -->
<div class="mb-3">
    <label>Status:</label>
    <select name="status" class="form-control">

        <option value="Pendente" <?= ($emprestimo['status'] == 'Pendente') ? 'selected' : '' ?>>
            Pendente
        </option>

        <option value="Vencido" <?= ($emprestimo['status'] == 'Vencido') ? 'selected' : '' ?>>
            Vencido
        </option>

        <option value="Devolvido" <?= ($emprestimo['status'] == 'Devolvido') ? 'selected' : '' ?>>
            Devolvido
        </option>

    </select>
</div>

<div class="mb-3">
    <button type="submit" name="update_emprestimo" class="btn btn-primary">
        Salvar
    </button>
</div>

</form>

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