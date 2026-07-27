<?php
include 'conexao.php';

// Pega os dados enviados pelo formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Criptografa a senha antes de salvar
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Monta a query usando "prepared statements" 
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $senha_hash);

if (mysqli_stmt_execute($stmt)) {
    header("Location:sucesso.html");
    exit();
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

mysqli_stmt_close($stmt);
mysqli_close($conexao);
?>