<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <div class="container-form">
        <h1>Editar</h1>

        <?php
        include("../conect.php");
        $id = $_GET['Id'];
        $sql = "SELECT * FROM contatos WHERE id=$id";
        $result = $conn->query($sql);
        $i = $result->fetch_assoc();
        ?>
        <hr>
        <form action="../controllers/editarContatos.php" method="POST">

            <div class="campo">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" required value="<?= $i["nome"] ?>" class="input-text" id="nome">
            </div>

            <div class="campo">
                <label for="telefone">Tel:</label>
                <input type="text" name="tel" placeholder="(00) 0000-0000" required id="telefone" value="<?= $i["tel"] ?>" class="input-text">
            </div>

            <div class="campo">
                <label for="obs">Obs:</label>
                <input type="text" name="obs" value="<?= $i["obs"] ?>" class="input-text" id="obs">
            </div>

            <input type="hidden" name="id" value="<?= $i["id"] ?>">

            <input type="submit" value="Atualizar" class="btn-submit">

        </form>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#telefone').mask('(00) 00000-0000');
        });
    </script>
</body>

</html>