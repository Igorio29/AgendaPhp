
<?php
    include ("../conect.php");
?>

<?php

    $sql = "SELECT * FROM contatos ORDER BY nome ASC";
    $result = $conn->query($sql);

    $busca = $result->fetch_all();
    

    $dado=$_POST;
    if(!empty($dado)){
        
            $n=$dado["nome"];
            $t=$dado["tel"];
            $d=$dado["obs"];
        
            $sqladd = "INSERT INTO contatos VALUES(NULL,'$n', '$t','$d')";
            $conn->query($sqladd);
            
        header("Location:" . "../view/index.php");
    }

?>