<?php
$conexao = mysqli_connect("localhost", "root", "", "login_db");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>