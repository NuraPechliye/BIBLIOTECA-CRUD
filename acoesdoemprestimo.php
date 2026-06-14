<?php
session_start();
require 'conexao.php';

if (isset($_POST['create_emprestimo'])) {

    $id_aluno = mysqli_real_escape_string($conexao, trim($_POST['id_aluno']));
    $id_livro = mysqli_real_escape_string($conexao, trim($_POST['id_livro']));
    $data_emprestimo = mysqli_real_escape_string($conexao, trim($_POST['data_emprestimo']));
    $data_vencimento = mysqli_real_escape_string($conexao, trim($_POST['data_vencimento']));
    $status = mysqli_real_escape_string($conexao, trim($_POST['status']));

    $sql = "INSERT INTO emprestimos (id_aluno, id_livro, data_emprestimo, data_vencimento, status)
            VALUES ('$id_aluno', '$id_livro', '$data_emprestimo', '$data_vencimento', '$status')";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Empréstimo criado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Empréstimo não foi criado';
    }

    header('Location: listaremprestimos.php');
    exit;
}


if (isset($_POST['update_emprestimo'])) {

    $id_emprestimos = mysqli_real_escape_string($conexao, $_POST['id_emprestimos']);

    $id_aluno = mysqli_real_escape_string($conexao, trim($_POST['id_aluno']));
    $id_livro = mysqli_real_escape_string($conexao, trim($_POST['id_livro']));
    $data_emprestimo = mysqli_real_escape_string($conexao, trim($_POST['data_emprestimo']));
    $data_vencimento = mysqli_real_escape_string($conexao, trim($_POST['data_vencimento']));
    $status = mysqli_real_escape_string($conexao, trim($_POST['status']));

    $sql = "UPDATE emprestimos
            SET id_aluno='$id_aluno',
                id_livro='$id_livro',
                data_emprestimo='$data_emprestimo',
                data_vencimento='$data_vencimento',
                status='$status'
            WHERE id_emprestimos='$id_emprestimos'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem'] = 'Empréstimo atualizado com sucesso';
    } else {
        $_SESSION['mensagem'] = 'Empréstimo não foi atualizado';
    }

    header('Location: listaremprestimos.php');
    exit;
}


if (isset($_POST['delete_emprestimo'])) {

    $id_emprestimos = mysqli_real_escape_string($conexao, $_POST['delete_emprestimo']);

    $sql = "DELETE FROM emprestimos WHERE id_emprestimos = '$id_emprestimos'";
    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem2'] = 'Empréstimo deletado com sucesso';
    } else {
        $_SESSION['mensagem2'] = 'Empréstimo não foi deletado';
    }

    header('Location: listaremprestimos.php');
    exit;
}

?>