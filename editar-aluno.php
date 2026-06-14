<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Aluno
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $aluno_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM alunos WHERE id='$aluno_id'";
                            $query = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $aluno = mysqli_fetch_array($query);
                            
                        
                        ?>
                        <form action="acoes.php" method="POST">

                        <input type="hidden" name="aluno_id" value="<?= $aluno['id'] ?>">
                        
                        <div class="mb-3">
                            <label for="">Período:</label>
                            
                            <select name="periodo" value="<?= $aluno['periodo'] ?>" class="form-control">

                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                            
                        </div>

                        <div class="mb-3">
                            <label>Nome:</label>
                            <input type="text" name="nome" value="<?= $aluno['nome'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>RM:</label>
                            <input type="text" name="rm" value="<?= $aluno['rm'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Turma:</label>
                            <input type="text" name="turma" value="<?= $aluno['turma'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Telefone:</label>
                            <input type="text" name="telefone" value="<?= $aluno['tel'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>E-mail:</label>
                            <input type="email" name="email" value="<?= $aluno['email'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>CEP:</label>
                            <input type="text" name="cep" value="<?= $aluno['cep'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Logradouro:</label>
                            <input type="text" name="logra" value="<?= $aluno['logra'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Número:</label>
                            <input type="text" name="numero" value="<?= $aluno['numero'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Bairro:</label>
                            <input type="text" name="bairro" value="<?= $aluno['bairro'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Cidade:</label>
                            <input type="text" name="cidade" value="<?= $aluno['cidade'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>UF:</label>
                            <input type="text" name="uf" value="<?= $aluno['uf'] ?>" class="form-control">
                        </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="update_aluno" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                            
                        } else {
                            echo '<h5>Usuário não encontrado</h5>';
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>