<?php
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adicionar Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Aluno
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="acoes.php" method="POST">

                            <div class="mb-3">
                            <label for="">Período:</label>
                            <select name="periodo" class="form-control">

                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                            </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Nome:</label>
                                <input type="text" name="nome" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Rm:</label>
                                <input type="text" name="rm" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Turma:</label>
                                <input type="text" name="turma" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Telefone (somente números):</label>
                                <input type="number" name="telefone" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">E-mail:</label>
                                <input type="email" name="email" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">CEP:</label>
                                <input type="text" name="cep" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Logradouro:</label>
                                <input type="text" name="logra" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Número:</label>
                                <input type="text" name="numero" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Bairro:</label>
                                <input type="text" name="bairro" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">Cidade:</label>
                                <input type="text" name="cidade" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                                <label for="">UF:</label>
                                <input type="text" name="uf" class="form-control" id="">
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="create_aluno" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>