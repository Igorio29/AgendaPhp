<?php
session_start();

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
include("../../controllers/contatos/getContatos.php");

$nome = $_GET['busca'] ?? null;

if ($nome) {
    // busca ativa: traz todos os resultados correspondentes
    $nomeEscaped = $conn->real_escape_string($nome);
    $sql = "SELECT * FROM contatos WHERE nome LIKE '%$nomeEscaped%' ORDER BY nome ASC";

    // contar total de registros da busca
    $total = $conn->query("SELECT COUNT(*) as total FROM contatos WHERE nome LIKE '%$nomeEscaped%'")
        ->fetch_assoc()['total'];
    $totalPaginas = 1; // só uma página, pois mostra todos os resultados
} else {
    // sem busca: mantém paginação
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $limite = 10;
    $offset = ($pagina - 1) * $limite;

    $sql = "SELECT * FROM tab_contatos LIMIT $limite OFFSET $offset";

    // contar total de registros
    $resultTotal = $conn->query("SELECT COUNT(*) as total FROM tab_contatos");
    $total = $resultTotal->fetch_assoc()['total'];
    $totalPaginas = ceil($total / $limite);
}

$result = $conn->query($sql);
$busca = $result->fetch_all();

function formatarTelefone($tel)
{
    $tel = preg_replace('/\D/', '', $tel);

    if (strlen($tel) == 11) {
        return "(" . substr($tel, 0, 2) . ") " . substr($tel, 2, 5) . "-" . substr($tel, 7);
    } else {
        return "(" . substr($tel, 0, 2) . ") " . substr($tel, 2, 4) . "-" . substr($tel, 6);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <link rel="stylesheet" href="../../style/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="../../Style/icon.png" type="image/x-icon">
</head>

<body>

    <h1 class="titulo">Agenda</h1>
    <div>
        <a href="../index.php" class="home"><i class="fa-solid fa-home"></i></i></a>
        <button onclick="history.back()" class="back"><i class="fa-solid fa-backward"></i></button>
    </div>
    <hr>
    <div class="topo">

        <a href="pag1.php">
            <button class="btn-cadastrar">
                <i class="fa-solid fa-plus"></i> Novo contato
            </button>
        </a>

        <form method="GET" class="pesquisa">
            <input type="text" name="busca" value="<?= htmlspecialchars($nome) ?>" placeholder="Pesquisar contato..." class="input-pesquisa">
            <button type="submit" class="btn-pesquisa">
                <i class="fa-solid fa-search"></i>
            </button>
        </form>

    </div>

    <div class="tabela-container">
        <table class="tabela-contatos">
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>

            <?php foreach ($busca as $i): ?>
                <tr>
                    <td><?= htmlspecialchars($i[1]) ?></td>
                    <td><?= formatarTelefone($i[2]) ?></td>
                    <td><?= htmlspecialchars($i[3]) ?></td>
                    <td class="acoes">
                        <a href="pag2.php?tipo=edit&Id=<?= $i[0] ?>">
                            <i class="fa-solid fa-pen-to-square" style="color: rgb(116, 192, 252);"></i>
                        </a>
                        <a href="../../controllers/contatos/deletarContato.php?tipo=delete&Id=<?= $i[0] ?>">
                            <i class="fa-solid fa-trash" style="color: rgb(232, 75, 75);"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

    <?php if (!$nome && $totalPaginas > 1): ?>
        <div class="paginacao">
            <?php if ($pagina > 1): ?>
                <a href="?pagina=1" class="pag-btn">&laquo;</a>
                <a href="?pagina=<?= $pagina - 1 ?>" class="pag-btn">&lsaquo;</a>
            <?php endif; ?>
            <?php if ($pagina == 1): ?>
                <a class="desativado">&laquo;</a>
                <a class="desativado">&lsaquo;</a>
            <?php endif; ?>
            <span class="pag-info">
                Página <?= $pagina ?> de <?= $totalPaginas ?>
            </span>

            <?php if ($pagina < $totalPaginas): ?>
                <a href="?pagina=<?= $pagina + 1 ?>" class="pag-btn">&rsaquo;</a>
                <a href="?pagina=<?= $totalPaginas ?>" class="pag-btn">&raquo;</a>
            <?php endif; ?>

            <?php if ($pagina == $totalPaginas): ?>
                <a class="desativado">&rsaquo;</a>
                <a class="desativado">&raquo;</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

</body>

</html>