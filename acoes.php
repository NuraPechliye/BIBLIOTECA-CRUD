<?php
session_start();
require 'conexao.php';


if (isset($_POST['create_aluno'])) {

    $periodo = $_POST['periodo'];
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $rm = mysqli_real_escape_string($conexao, trim($_POST['rm']));
    $turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $logra = mysqli_real_escape_string($conexao, trim($_POST['logra']));
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));
    

    $sql = "INSERT INTO alunos (periodo, nome, rm, turma, tel, email, cep, logra, numero, bairro, cidade, uf)
                VALUES ('$periodo', '$nome', '$rm', '$turma', '$telefone', '$email', '$cep', '$logra', '$numero', '$bairro', '$cidade', '$uf' )";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Aluno criado com sucesso';
            header('Location: index.php');
    exit;
        } else {
            $_SESSION['mensagem'] = 'Aluno não foi criado';
            header('Location: index.php');
    exit;
        }

}

if (isset($_POST['update_aluno'])) {

    $aluno_id = mysqli_real_escape_string($conexao, $_POST['aluno_id']);
    $periodo = mysqli_real_escape_string($conexao, trim($_POST['periodo']));
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $rm = mysqli_real_escape_string($conexao, trim($_POST['rm']));
    $turma = mysqli_real_escape_string($conexao, trim($_POST['turma']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
    $logra = mysqli_real_escape_string($conexao, trim($_POST['logra']));
    $numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
    $bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $uf = mysqli_real_escape_string($conexao, trim($_POST['uf']));

    $sql = "UPDATE alunos SET periodo='$periodo', nome = '$nome', rm = '$rm', turma = '$turma', tel = '$telefone', email = '$email', cep = '$cep', logra = '$logra', numero = '$numero', bairro = '$bairro', cidade = '$cidade', uf = '$uf' ";

    if (!empty($senha)) {
        $sql .= ", senha= '" .password_hash($senha, PASSWORD_DEFAULT) . "'";
    } 
    
    $sql .= "WHERE id = '$aluno_id'";

    mysqli_query($conexao, $sql);

    if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Aluno atualizado com sucesso';
            header('Location: index.php');
            exit;

    } else {
            $_SESSION['mensagem'] = 'Aluno não foi atualizado';
            header('Location: index.php');
            exit;
        }
}

if (isset($_POST['delete_aluno'])) {
    $aluno_id = mysqli_real_escape_string($conexao, $_POST['delete_aluno']);
    
    $sql = "DELETE FROM alunos WHERE id = '$aluno_id'";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['mensagem2'] = 'Aluno deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['mensagem2'] = 'Aluno não foi deletado';
        header('Location: index.php');
        exit;
    }
}




    


?>