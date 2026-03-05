
<?php
include "../../conect.php";

$sql = "SELECT * FROM tab_contatos";
$result = $conn->query($sql);
$busca = $result->fetch_all();

?>