<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$tempoLimite = 86400; // 24 horas

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (isset($_SESSION['ultimo_acesso'])) {
    $tempoPassado = time() - $_SESSION['ultimo_acesso'];

    if ($tempoPassado > $tempoLimite) {
        session_destroy();
        header("Location: index.php?erro=tempo");
        exit();
    }
}

$_SESSION['ultimo_acesso'] = time(); // atualiza o tempo
?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Se não estiver logado volta pro login
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}

// Hora certa
date_default_timezone_set("America/Sao_Paulo");
$hora = date("H");
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../style/menu-style.css">
</head>

<body>
    <h1>
        <?php
        if ($hora < 12) {
            echo "Bom dia, " . $_SESSION['usuario'] . "!";
        } else if ($hora < 19) {
            echo "Boa tarde, " . $_SESSION['usuario'] . "!";
        } else {
            echo "Boa noite, " . $_SESSION['usuario'] . "!";
        }
        ?>
    </h1>
    <br>
    <p>Selecione o que deseja: </p>

    <div class="container">
        <a href="./Contatos/" class="card">
            <i class="fa-regular fa-address-book"></i>
            <span>Contatos</span>
        </a>
        <a href="./AgendaEventos/" class="card">
            <i class="fa-regular fa-calendar"></i>
            <span>Agenda</span>
        </a>
    </div>

</body>

</html>