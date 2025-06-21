<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <a href="design.php">Trang chủ</a>

    <?php
    $title = "Danh sách thiết bị văn phòng - Máy hủy tài liệu";
    if (isset($_GET['hien_thi']) && $_GET['danh_sach'] == 'tat_ca') {
        $title = "Danh sách thiết bị văn phòng";
    }
    echo "<h1>$title</h1>";
    ?>

    <form method="GET">
        <label for="filter">Chọn loại danh sách:</label>
        <select id="filter" name="danh_sach">
            <option value="may_htl" <?php if (isset($_GET['danh_sach']) && $_GET['danh_sach'] == 'may_htl') echo 'selected'; ?>>Máy hủy tài liệu</option>
            <option value="tat_ca" <?php if (isset($_GET['danh_sach']) && $_GET['danh_sach'] == 'tat_ca') echo 'selected'; ?>>Tất cả</option>
        </select>
        <input type="submit" name="hien_thi" value="Hiển thị">
    </form>

    <?php
    include "action/db_conn.php";

    $sql = "SELECT * FROM $tb_name WHERE ten_hang LIKE 'Máy hủy tài liệu%'";
    if (isset($_GET['danh_sach'])) {
        $danh_sach = $_GET['danh_sach'];
        if ($danh_sach == 'tat_ca') {
            $sql = "SELECT * FROM $tb_name";
        }
    }
    $result = $conn->query($sql);

    echo
    "<table border='1'>
        <tr>
            <th>Mã hàng</th>
            <th>Tên hàng</th>
            <th>Hãng sản xuất</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>";

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo
            "<tr>
                <td>" . $row['ma_hang'] . "</td>
                <td>" . $row['ten_hang'] . "</td>
                <td>" . $row['hang_sx'] . "</td>
                <td>" . $row['gia'] . "</td>
                <td>                    
                    <a href='action/update.php?ma_hang=" . $row['ma_hang'] . "'>Sửa</a> | 
                    <a href='action/delete.php?ma_hang=" . $row['ma_hang'] . "'>Xóa</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
    }

    echo "</table>";

    $conn->close();
    ?>
</body>
</html>