<?php
session_start();
require 'conexao.php';


if (isset($_POST['create_livro'])) {

    $genero = $_POST['genero'];
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $quantidade = mysqli_real_escape_string($conexao, trim($_POST['quantidade']));
    

    $sql = "INSERT INTO livros (genero, titulo, autor, quantidade)
                VALUES ('$genero', '$titulo', '$autor', '$quantidade')";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Livro criado com sucesso';
            header('Location: listarlivros.php');
    exit;
        } else {
            $_SESSION['mensagem'] = 'Livro não foi criado';
            header('Location: listarlivros.php');
    exit;
        }

}


if (isset($_POST['update_livro'])) {

    $id_livro = mysqli_real_escape_string($conexao, $_POST['id_livro']);
    $genero = mysqli_real_escape_string($conexao, trim($_POST['genero']));
    $titulo = mysqli_real_escape_string($conexao, trim($_POST['titulo']));
    $autor = mysqli_real_escape_string($conexao, trim($_POST['autor']));
    $quantidade = mysqli_real_escape_string($conexao, trim($_POST['quantidade']));

    $sql = "UPDATE livros
        SET genero='$genero',
            titulo='$titulo',
            autor='$autor',
            quantidade='$quantidade'
        WHERE id_livro='$id_livro'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Livro atualizado com sucesso';
            header('Location: listarlivros.php');
            exit;

    } else {
            $_SESSION['mensagem'] = 'Livro não foi atualizado';
            header('Location: listarlivros.php');
            exit;
        }
}


if (isset($_POST['delete_livro'])) {
    $id_livro = mysqli_real_escape_string($conexao, $_POST['delete_livro']);
    
    $sql = "DELETE FROM livros WHERE id_livro = '$id_livro'";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem2'] = 'Livro deletado com sucesso';
        header('Location: listarlivros.php');
        exit;
    } else {
        $_SESSION['mensagem2'] = 'Livro não foi deletado';
        header('Location: listarlivros.php');
        exit;
    }
}

?>