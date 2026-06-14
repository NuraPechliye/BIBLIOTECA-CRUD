<?php
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'bibliotec');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ("Deu ruim, não conectou!");
?>