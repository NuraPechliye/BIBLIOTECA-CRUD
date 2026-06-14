<?php
session_start();
require 'conexao.php';

$sql = "SELECT 
            e.id_emprestimos,
            a.nome AS nome_aluno,
            l.titulo AS titulo_livro,
            e.data_vencimento
        FROM emprestimos e
        INNER JOIN alunos a ON e.id_aluno = a.id
        INNER JOIN livros l ON e.id_livro = l.id_livro
        WHERE e.data_vencimento < CURDATE()
        AND e.status != 'Devolvido'
        ORDER BY e.data_vencimento ASC";

$query = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>BIBLIOTEC - Página Inicial</title>

    <style>
        body {
            background-image: url('../tccadapt/img/telainicio.jpg');
            backdrop-filter: blur(10px);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark" style="background-color: #5a4633;">
    <div class="container-md">

        <a href="#" class="btn">
            <img src="../tccadapt/img/icone1.png" width="60">
        </a>

        <a class="btn fs-5 px-4 py-3" style="background-color:#887959; color:white;" href="index.php">
            Gerenciamento de Alunos
        </a>

        <a class="btn fs-5 px-4 py-3" style="background-color:#887959; color:white;" href="listarlivros.php">
            Gerenciamento de Livros
        </a>

        <a class="btn fs-5 px-4 py-3" style="background-color:#887959; color:white;" href="listaremprestimos.php">
            Empréstimo de Livros
        </a>
        
        <a class="btn fs-9 px-2 py-1" style="background-color:#4F221F; color:white;" href="#">
            Sair
        </a>

    </div>
</nav>


<div class="container-fluid">
<div class="row">

    
    <div class="OCUPAR ESPACOOO col-md-9 p-4">
        
    </div>

   
    <div class="col-md-3 bg-light p-3" style="min-height: 100vh;">
        <h5>Empréstimos Vencidos</h5>
        <hr>

        <?php if (mysqli_num_rows($query) > 0) { ?>

            <?php foreach ($query as $emprestimo) { ?>

                <div class="alert alert-danger">

                    <strong>
                        <?= $emprestimo['titulo_livro']; ?>
                    </strong>
                    <br>
                    <small>
                        Aluno: <?= $emprestimo['nome_aluno']; ?><br>
                        Venceu: <?= $emprestimo['data_vencimento']; ?>
                    </small>

                    <a href="visualizar-emprestimo.php?id=<?= $emprestimo['id_emprestimos']; ?>"
                       class="btn btn-sm btn-dark float-end mt-2">
                        Ver mais
                    </a>

                </div>

            <?php } ?>

        <?php } else { ?>

            <div class="alert alert-success">
                Nenhum empréstimo vencido.
            </div>

        <?php } ?>

    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>