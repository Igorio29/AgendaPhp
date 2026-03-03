
<?php
    include ("../../conect.php");
?>

<?php
    
    $dado=$_POST;
    if(!empty($dado)){
        
            $n=$dado["nome"];
            $t=$dado["tel"];
            $d=$dado["obs"];
        
            $sqladd = "INSERT INTO TAB_contatos VALUES(NULL,'$n', '$t','$d')";
            $conn->query($sqladd);
            
        header("Location:" . "../../View/Contatos/index.php");
    }

?>