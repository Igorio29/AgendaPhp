<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login do Sistema</title>
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

        .login-container {
            background: black;
            color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        .login-container h2 {
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
            background: rgb(0, 104, 201);
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: rgb(0, 32, 65);
        }

        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 12px;
            color: #666;
        }

        .registro-link {
            display: flex;
            gap: 5px;
            align-items: center;
        }

        .registro {
            color: white;
            font-size: 15px;
        }

        .registro a {
            text-decoration: none;
            color: #4a90e2;
        }

        .registro a:hover {
            text-decoration: none;
            color: rgb(4, 97, 202);
        }
    </style>
</head>

<body>

    <div class="login-container">

        <?php
        $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';

        if (isset($_GET['erro'])) {
            echo "<div class='erro'>Email ou senha inválidos</div>";
        }
        ?>
        <h2>Login</h2>

        <form action="../controllers/login/login.php" method="POST">
            <div class="form-group">
                <label for="email">Usuário</label>
                <input type="email" name="email" placeholder="Email" required
                    value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <button type="submit">Entrar</button>
        </form>

        <div class="footer">
            Sistema de Login <br>
            <div class="registro">
                <a href="./RegistroUsuario/index.php"
                    class="cadastrar"> Não tem conta? Registre aqui</a>
            </div>
        </div>
    </div>

</body>

</html>