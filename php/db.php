<?php
//$conn=new mysqli($servername, $username, $password);
$conn=mysqli_connect("localhost", "root", "031130", "board");
//$conn = new PDO("mysql:host=$servername", $username, $password);

if(!$conn) {
    die("DB연결 실패");
}echo "DB연결 성공";

?>