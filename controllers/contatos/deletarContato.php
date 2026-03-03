<?php
    include ("../../conect.php");

    $id = $_GET['Id'];

    $sqldelete = "DELETE FROM TAB_contatos WHERE id = '$id'";
    $conn->query($sqldelete);

        header("Location:" . "../../View/Contatos/index.php");
?>