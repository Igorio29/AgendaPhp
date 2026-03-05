<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, rgb(9, 11, 14), rgb(0, 32, 63));
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .registro-container {
            background: black;
            color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 320px;
        }

        .registro-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input:focus {
            outline: none;
            border-color: #4a90e2;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background: #4a90e2;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #357abd;
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        .link-login {
            text-align: center;
            margin-top: 10px;
        }

        .link-login a {
            text-decoration: none;
            color: #4a90e2;
            font-size: 14px;
        }

        .link-login a:hover {
            text-decoration: underline;
        }

        .erro {
            background-color: #ffdddd;
            color: #a30000;
            border: 1px solid #ff5c5c;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="registro-container">
        <?php
        $usuario = isset($_GET['usuario']) ? htmlspecialchars($_GET['usuario']) : '';
        $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
        ?>
        <?php
        if (isset($_GET['1'])) {
            echo "<div class='erro'>As senhas não coincidem!</div>";
        }
        ?>
        <h2>Registro</h2>


        <form action="../../controllers/registro/registro.php" method="POST">
            <div class="form-group">
                <label for="usuario">Usuário</label>
                <input type="text" name="usuario" placeholder="Nome Completo" required value="<?php echo $usuario; ?>">
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="email@email.com" required value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" placeholder="Escreva a Senha" name="senha" required>
            </div>

            <div class="form-group">
                <label for="confirmar">Confirmar Senha</label>
                <input type="password" id="confirmar" placeholder="Confirmar a Senha" name="confirmar" required>
            </div>


            <button type="submit">Cadastrar</button>
        </form>

        <div class="link-login">
            <a href="../index.php">Já tem conta? Fazer login</a>
        </div>

        <div class="footer">
            Sistema de Cadastro
        </div>
    </div>

</body>

</html>