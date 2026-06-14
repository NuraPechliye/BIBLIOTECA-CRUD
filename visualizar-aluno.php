<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualizar Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4>Visualizar Aluno
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="aluno">
                        
                        <?php
                        if (isset($_GET['id'])) {

                            $aluno_id = mysqli_real_escape_string($conexao, $_GET['id']);

                            $sql = "SELECT * FROM alunos WHERE id='$aluno_id'";
                            $query = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($query) > 0) {

                                $aluno = mysqli_fetch_array($query);
                        ?>

                                <div class="mb-3">
                            <label>Código:</label>
                            <p class="form-control">
                                <?= $aluno['id']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Período:</label>
                            <p class="form-control">
                                <?= $aluno['periodo']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Nome:</label>
                            <p class="form-control">
                                <?= $aluno['nome']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>RM:</label>
                            <p class="form-control">
                                <?= $aluno['rm']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Turma:</label>
                            <p class="form-control">
                                <?= $aluno['turma']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Telefone:</label>
                            <p class="form-control">
                                <?= $aluno['tel']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>E-mail:</label>
                            <p class="form-control">
                                <?= $aluno['email']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>CEP:</label>
                            <p class="form-control">
                                <?= $aluno['cep']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Logradouro:</label>
                            <p class="form-control">
                                <?= $aluno['logra']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Número:</label>
                            <p class="form-control">
                                <?= $aluno['numero']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Bairro:</label>
                            <p class="form-control">
                                <?= $aluno['bairro']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>Cidade:</label>
                            <p class="form-control">
                                <?= $aluno['cidade']; ?>
                            </p>
                        </div>

                        <div class="mb-3">
                            <label>UF:</label>
                            <p class="form-control">
                                <?= $aluno['uf']; ?>
                            </p>
                        </div>
                    
                        <?php
                            } else {
                                echo '<h5>Aluno não encontrado</h5>';
                            }
                        }           
                        
                        ?>
                            <br><br>
                        <div class="livroemprestado">

                            <div class="card-header">
                                <h4> Lista de Empréstimos</h4>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Código do Livro</th>
                                        <th>Livro</th>
                                        <th>Data do Empréstimo</th>
                                        <th>Vencimento</th>
                                        <th>
                                            <button type="button" class="btn btn-danger">Excluir</button>
                                            <button type="button" class="btn btn-primary">Editar</button>
                                        </th>
                                        
                                    </tr>
                                </thead>
                            </div>
                        
                        </div>