<?php
$servername = "localhost";
$username = "root";
$password = "031130";
$dbname = "board";

//$conn=new mysqli($servername, $username, $password);
$conn=mysqli_connect($servername, $username, $password, $dbname);
//$conn = new PDO("mysql:host=$servername", $username, $password);

if(!$conn) {
    die("DB연결 실패");
}
echo "DB연결 성공";
?>