<?php
require('mysql_conn.php');

$name = $_REQUEST['name'];

$sql = "DELETE from comment WHERE name ='$name'";

//excute sql
if($mysqli->query($sql)){
	echo "Record deleted!";
}else{
	echo "Error :",mysql_error();
}
$mysqli->close();
?>