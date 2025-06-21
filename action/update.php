<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật</title>
</head>
<body>
    <a href="../design.php">Trang chủ</a>
    <a href="../display.php">Danh sách</a>
    <h1>Cập nhật thông tin sản phẩm</h1>

    <?php
    include "db_conn.php";

    $row = [];
    if (isset($_GET['ma_hang'])) {
        $ma_hang = $_GET['ma_hang'];
        $sql = "SELECT * FROM $tb_name WHERE ma_hang = '$ma_hang'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            echo "Không tìm thấy sản phẩm với mã hàng: $ma_hang";
        }

        if (isset($_POST['cap_nhat'])) {
            $ma_hang = $_POST['ma_hang'];
            $ten_hang = $_POST['ten_hang'];
            $hang_sx = $_POST['hang_sx'];
            $gia = $_POST['gia'];

            $sql = "UPDATE $tb_name SET ten_hang = '$ten_hang', hang_sx = '$hang_sx', gia = '$gia' WHERE ma_hang = '$ma_hang'";
            if ($conn->query($sql) === TRUE) {
                echo "Cập nhật sản phẩm thành công";                
            } else {
                echo "Lỗi: " . $conn->error;
            }
        }
    }

    $ht_ma_hang = $row['ma_hang'] ?? '';
    $ht_ten_hang = $row['ten_hang'] ?? '';
    $ht_hang_sx = $row['hang_sx'] ?? '';
    $ht_gia = $row['gia'] ?? '';
    ?>

    <form method="POST">
        <label for="id">Mã hàng:</label>
        <input type="number" id="id" name="ma_hang" value="<?php echo $ht_ma_hang ?>" readonly><br><br>
        <label for="name">Tên hàng:</label>
        <input type="text" id="name" name="ten_hang" value="<?php echo $ht_ten_hang ?>" required><br><br>
        <label for="brand">Hãng sản xuất:</label>
        <input type="text" id="brand" name="hang_sx" value="<?php echo $ht_hang_sx ?>" required><br><br>
        <label for="price">Giá:</label>
        <input type="number" id="price" name="gia" value="<?php echo $ht_gia ?>" min="0" step="0.01" required><br><br>
        <input type="submit" name="cap_nhat" value="Cập nhật sản phẩm">
        <input type="reset" value="Nhập lại">
    </form>
</body>
</html>