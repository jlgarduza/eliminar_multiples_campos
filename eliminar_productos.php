<?php
include "connect.php";

$ids = $_GET["ids"];
$ids2 = explode(",", $ids);
foreach ($ids2 as $id) {
	$sql = "DELETE FROM productos WHERE id = $id";
	$con = connect();
	$query  = $con->query($sql);
}

?>
