<?php
session_start();
require 'conexao.php';
$sql = "SELECT * FROM alunos";

if (
    isset($_GET['filtrar_aluno']) &&
    !empty($_GET['periodo'])
) {
    $periodo = mysqli_real_escape_string(
        $conexao,
        $_GET['periodo']
    );

    $sql .= " WHERE periodo = '$periodo'";
}


$alunos = mysqli_query($conexao, $sql);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIBLIOTEC - INÍCIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php
        include('mensagem.php');
        ?>
        <div class="row">

            <div class="col-md-12">

                <div class="card">
                    
                        <div class="card-header">
                            <h4> Lista de Alunos</h4>

                            <div class=" btn-group float-end">
                            <a href="criar-aluno.php" class="btn btn-primary ">ADICIONAR ALUNO</a>
                            <a href="paginainicial.php" class="btn btn-danger ">VOLTAR</a>
                            </div>

                            <div class="selecionar">
                            <form method="GET">
                            <select name="periodo" class="form-control">
                                <option value="">Todos</option>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>

                            <button type="submit" name="filtrar_aluno" class="btn btn-primary">
                                Filtrar
                            </button>
                            </form>

                            </div>

                        </div>

                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Período</th>
                                        <th>COD</th>
                                        <th>Nome</th>
                                        <th>RM</th>
                                        <th>Turma</th>
                                        <th>Telefone</th>
                                        <th>E-mail</th>
                                        <th>CEP</th>
                                        <th>Logradouro</th>
                                        <th>Número</th>
                                        <th>Bairro</th>
                                        <th>Cidade</th>
                                        <th>UF</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    if (mysqli_num_rows($alunos) > 0) {
                                        foreach($alunos as $aluno) {

                                    
                                    ?>
                                    <tr>
                                        <td><?= $aluno['periodo']?></td>
                                        <td><?= $aluno['id']?></td>
                                        <td><?= $aluno['nome']?></td>
                                        <td><?= $aluno['rm']?></td>
                                        <td><?= $aluno['turma']?></td>
                                        <td><?= $aluno['tel']?></td>
                                        <td><?= $aluno['email']?></td>
                                        <td><?= $aluno['cep']?></td>
                                        <td><?= $aluno['logra']?></td>
                                        <td><?= $aluno['numero']?></td>
                                        <td><?= $aluno['bairro']?></td>
                                        <td><?= $aluno['cidade']?></td>
                                        <td><?= $aluno['uf']?></td>
                                        
                                        <td>
                                            <a href="visualizar-aluno.php?id=<?= $aluno['id'] ?>" class="btn btn-secondary btn-sm">VISUALIZAR</a>
                                            <a href="editar-aluno.php?id=<?= $aluno['id'] ?>" class="btn btn-success btn-sm">EDITAR</a>
                                            
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <button onclick="return confirm('Tem certeza de que deseja excluir?')" type="submit" name="delete_aluno" value="<?= $aluno['id'] ?>" class="btn btn-danger btn-sm">
                                                    EXCLUIR
                                                </button>
                                            </form>


                                        </td>
        
                                    </tr>
                                    <?php
                                        }
                                    }
                                     else {
                                        echo '<h5>Nenhum aluno foi encontrado!</h5>';
                                    }

                                    ?>

                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>