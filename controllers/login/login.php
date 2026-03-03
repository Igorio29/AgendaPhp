<?php
session_start(); // TEM que ser a primeira coisa

include "../../conect.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM tab_usuario
            WHERE email_usuario = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $dados = $result->fetch_assoc(); // pega os dados do banco

    if (password_verify($senha, $dados['senha_usuario'])) {

        $_SESSION['usuario'] = $dados['nome_usuario'];
        $_SESSION['email'] = $dados['email_usuario'];

        header("Location: ../../View/telaInicial.php");
        exit;
    } else {
        header("Location:" . "../../View/index.php?erro=1&email=" . urlencode($email));
    }
}
