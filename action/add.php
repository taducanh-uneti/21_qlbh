<?php
include "db_conn.php";

$ma_hang = $_POST['ma_hang'];
$ten_hang = $_POST['ten_hang'];
$hang_sx = $_POST['hang_sx'];
$gia = $_POST['gia'];

$sql = "INSERT INTO $tb_name (ma_hang, ten_hang, hang_sx, gia)
        VALUES ('$ma_hang', '$ten_hang', '$hang_sx', '$gia')";

try {
    if ($conn->query($sql) === TRUE) {
        echo "Thêm sản phẩm thành công";
    }
} catch (mysqli_sql_exception $err) {
    if ($err->getCode() == 1062) {
        echo "Lỗi: Mã hàng đã tồn tại, vui lòng chọn mã hàng khác";
    } else {
        echo "Lỗi: " . $err->getMessage();
    }
}

echo "<br><br><a href='../design.php'>Quay lại trang chủ</a>";
echo "<br><br><a href='../display.php'>Xem danh sách</a>";

$conn->close();
?>