
<?php
include "../conect.php";


$sql = "SELECT * FROM contatos";
$result = $conn->query($sql);
$busca = $result->fetch_all();

?>