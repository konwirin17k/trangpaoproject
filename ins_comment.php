<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname ="trangpao";

$conn = mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

$name = $_POST["name"];
$email = $_POST["email"];
$comment = $_POST["comment"];
$sql = "INSERT INTO comment(name,email,comment) values('$name','$email','$comment')";

if(mysqli_query($conn,$sql)){
    
    echo "<script>alert('insertข้อมูลสำเร็จ');</script>";
     ('location:ins_comment.php');
    
    
}
  
  
require('mysql_conn.php');

$query = "SELECT*FROM comment ";

$result = $mysqli->query($query) or die ("Query Failed");

if($result->num_rows==0){
	echo "Nothing Display";
}
    print"<html><head><title></title><meta charset=\"UTF-8\"></head><body>";
    print"<table border=1>\n";
echo "<tr><th>ชื่อ</th><th>e-mail</th><th >ความคิดเห็น</th><th >ลบ</th></tr>";
while($row = $result->fetch_array()){
    print "\t<tr>\n";
    echo "<td>",$row["name"],"</td>\n";
    echo "<td>",$row["email"],"</td>\n";
    echo "<td>",$row["comment"],"</td>\n";
    $name = $row["name"];
    echo "<td><a href=\"del_comment.php?name=$name\">Delete</a></td>\n";
    echo "\t</tr>\n";
}

/*
foreach ($rowas as $col_value) {
    print "\t<td>$col_value</td>\n";
}*/

print "</table>\n";
echo "จำนวนข้อมูลทั้งหมด: ",mysqli_num_rows($result),"รายการ<br>";
print "</body></html>\n";

$result->free_result();
$mysqli->close();
?>