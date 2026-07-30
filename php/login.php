<?php

$conexao = mysqli_connect("localhost", "root", "", "login_db");

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha_hash);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../login.html");
    exit();
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
