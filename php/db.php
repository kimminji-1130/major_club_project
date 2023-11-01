<?php
$servername = "localhost";
$username = "root";
$password = "031130";

//$conn=new mysqli($servername, $username, $password);
$conn=mysqli_connect($servername, $username, $password);
//$conn = new PDO("mysql:host=$servername", $username, $password);

if(!$conn) {
    die("DB연결 실패");
}
echo "DB연결 성공";
?>