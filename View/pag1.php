<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/style.css">
    <link rel="shortcut icon" href="../Style/icon.png" type="image/x-icon">
</head>
<body>

    <div class="container-form">
        <h1 class="Titulo">Cadastro</h1>
        <hr>
        <form action="../controllers/cadastroContatos.php" method="POST" class="formulario">
            
            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" required name="nome" class="input-text" id="nome">
            </div>

            <div class="campo">
                <label for="telefone">Tel:</label>
                <input type="text" required placeholder="(00) 0000-0000" name="tel" id="telefone" class="input-text">
            </div>

            <div class="campo">
                <label for="obs">Obs:</label>
                <input type="text" name="obs" class="input-text" id="obs">
            </div>

            <input type="submit" value="Enviar" class="btn-submit">

        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
$(document).ready(function () {
    $('#telefone').mask('(00) 00000-0000');
});
</script>
</body>
</html>