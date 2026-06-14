<?php
session_start();
require 'conexao.php';
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
WHERE 1=1";

if (isset($_GET['filtrar_emprestimos']) && !empty($_GET['status'])) {
    $status = mysqli_real_escape_string($conexao, $_GET['status']);
    $sql .= " AND e.status = '$status'";
}

$emprestimos = mysqli_query($conexao, $sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIBLIOTEC - LISTAR EMPRÉSTIMOS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php include('navbar.php'); ?>

<div class="container mt-4">

    <?php include('mensagem.php'); ?>

    <div class="card">

        <div class="card-header">
            <h4>Lista de Empréstimos</h4>
                <div class=" btn-group float-end">
                            <a href="criar-emprestimo.php" class="btn btn-primary ">ADICIONAR EMPRÉSTIMO</a>
                            <a href="paginainicial.php" class="btn btn-danger ">VOLTAR</a>
                            </div>
            
        </div>

        <div class="card-body">

            <form method="GET" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <select name="status" class="form-control">
                            <option value="">Todos</option>
                            <option value="Pendente">Pendente</option>
                            <option value="Devolvido">Devolvido</option>
                            <option value="Vencido">Vencido</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button type="submit" name="filtrar_emprestimos" class="btn btn-primary">
                            Filtrar
                        </button>
                    </div>
                </div>
            </form>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID Empréstimo</th>
                    <th>Livro</th>
                    <th>Aluno</th>
                    <th>Data Empréstimo</th>
                    <th>Data Vencimento</th>
                    <th>Status</th>
                    <th width="250">Ações</th>
                </tr>
                </thead>

                <tbody>
<?php
if (mysqli_num_rows($emprestimos) > 0) {
    foreach ($emprestimos as $emprestimo) {
?>
<tr>
    <td><?= $emprestimo['id_emprestimos']; ?></td>
    <td><?= $emprestimo['titulo_livro']; ?></td>
    <td><?= $emprestimo['nome_aluno']; ?></td>
    <td><?= $emprestimo['data_emprestimo']; ?></td>
    <td><?= $emprestimo['data_vencimento']; ?></td>
    <td><?= $emprestimo['status']; ?></td>

    <td>
        <a href="visualizar-emprestimo.php?id=<?= $emprestimo['id_emprestimos']; ?>"
           class="btn btn-secondary btn-sm">VISUALIZAR</a>

        <a href="editar-emprestimo.php?id=<?= $emprestimo['id_emprestimos']; ?>"
           class="btn btn-success btn-sm">EDITAR</a>

        <form action="acoesdoemprestimo.php" method="POST" class="d-inline">
            <button onclick="return confirm('Tem certeza que deseja excluir?')"
                    type="submit"
                    name="delete_emprestimo"
                    value="<?= $emprestimo['id_emprestimos']; ?>"
                    class="btn btn-danger btn-sm">
                EXCLUIR
            </button>
        </form>
    </td>
</tr>
<?php
    }
} else {
    echo '<tr><td colspan="7">Nenhum empréstimo encontrado!</td></tr>';
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