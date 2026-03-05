<?php
    include ("../../conect.php");

    $id = $_GET['Id'];

    $sqldelete = "DELETE FROM tab_contatos WHERE id = '$id'";
    $conn->query($sqldelete);

        header("Location:" . "../../View/Contatos/index.php");
?>