<?php
session_start();
require 'conexao.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Livro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Livro
                            <a href="listarlivros.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $id_livro = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM livros WHERE id_livro='$id_livro'";
                            $query = mysqli_query($conexao, $sql);
                            if (mysqli_num_rows($query) > 0) {
                                $livro = mysqli_fetch_array($query);
                            
                        
                        ?>
                        <form action="acoesdolivro.php" method="POST">

                        <input type="hidden" name="id_livro" value="<?= $livro['id_livro'] ?>">
                        
                        <div class="mb-3">
                            <label for="">Genero:</label>
                            
                            <select name="genero" value="<?= $livro['genero'] ?>" class="form-control">
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

                        <div class="mb-3">
                            <label>Título:</label>
                            <input type="text" name="titulo" value="<?= $livro['titulo'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Autor:</label>
                            <input type="text" name="autor" value="<?= $livro['autor'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Quantidade:</label>
                            <input type="number" name="quantidade" value="<?= $livro['quantidade'] ?>" class="form-control">
                        </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="update_livro" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                        <?php
                            
                        } else {
                            echo '<h5>Livro não encontrado</h5>';
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