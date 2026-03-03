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
    <?php
        date_default_timezone_set("America/Sao_Paulo");
        $hora = date("HH");
    ?>
    <h1><?php 
        if($hora < 12) {
            echo "<h1> Bom dia! </h1>";
        } else if ($hora < 19) {
            echo "<h1> Boa tarde! </h1>";
        } else {
            echo "<h1> Boa noite! </h1>";
        };
    ?></h1>
    <br>
    <p>Selecione o que deseja:   </p>

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