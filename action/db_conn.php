<?php
$db_name = '21_qlbh';
$tb_name = '21_tbvp';

$conn = new mysqli('localhost', 'root', '', $db_name);
if ($conn->connect_error) {
    die("Ket noi that bai: " . $conn->connect_error);
}
?>