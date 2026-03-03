
<?php
include "../../conect.php";

$sql = "SELECT * FROM TAB_contatos";
$result = $conn->query($sql);
$busca = $result->fetch_all();

?>