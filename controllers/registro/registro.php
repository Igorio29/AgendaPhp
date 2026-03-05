
<?php
    include "../../conect.php";

    $nome = $_POST["usuario"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmar = $_POST["confirmar"];


    if ($senha != $confirmar) {
        header("Location: ../../View/RegistroUsuario/index.php?1&usuario=$nome&email=$email");
        exit;
    }

    $senhaCripto = password_hash($senha, PASSWORD_DEFAULT);
    $sql = "INSERT INTO tab_usuario VALUES (NULL, '$nome', '$email', '$senhaCripto', NULL)";
    $conn->query($sql);

    header("location:"."../../View/index.php");
?>