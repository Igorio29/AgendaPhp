<?php
    include ("../../conect.php");

    $id = $_GET['Id'];

    $sqldelete = "DELETE FROM contatos WHERE id = '$id'";
    $conn->query($sqldelete);

    header("Location:" . "../view/index.php");
?>
<?php
    include ("../conect.php");

    $id = $_GET['Id'];

    $sqldelete = "DELETE FROM contatos WHERE id = '$id'";
    $conn->query($sqldelete);

        header("Location:" . "../../View/Contatos/index.php");
?>