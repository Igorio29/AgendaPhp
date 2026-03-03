
<?php
    include ("../../conect.php");

    $dado = $_POST;
    if(!empty($dado)){
        $id=$dado["id"];
        $n=$dado["nome"];
        $t=$dado["tel"];
        $d=$dado["obs"];
        
        $sqladd = "UPDATE contatos SET nome = '$n', tel = '$t', obs = '$d' WHERE id = '$id'";
        $conn->query($sqladd);
    }

        header("Location:" . "../../View/Contatos/index.php");
?>