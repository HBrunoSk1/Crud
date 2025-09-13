<?php
include "db.php";
$id = $_GET['id'];

$conn->query("DELETE FROM contatos WHERE id=$id");
header("Location: home.php");
exit;
?>
