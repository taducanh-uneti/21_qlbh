<?php
include "db_conn.php";

if (isset($_GET['ma_hang'])) {
    $ma_hang = $_GET['ma_hang'];
    $sql = "DELETE FROM $tb_name WHERE ma_hang = '$ma_hang'";
    if ($conn->query($sql) === TRUE) {
        echo "Xóa sản phẩm thành công";
    } else {
        echo "Lỗi: " . $conn->error;
    }
} else {
    echo "Không tìm thấy mã hàng để xóa";
}

echo "<br><br><a href='../design.php'>Quay lại trang chủ</a>";
echo "<br><br><a href='../display.php'>Xem danh sách</a>";

$conn->close();
?>