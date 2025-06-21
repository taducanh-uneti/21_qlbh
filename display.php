<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hien thi</title>
</head>
<body>
    <a href="design.php">Trang chu</a>

    <h1>Danh sach thiet bi van phong - May huy tai lieu</h1>

    <?php
    include 'action/db_conn.php';

    $sql = "SELECT * FROM $tb_name WHERE ten_hang LIKE 'May huy tai lieu%'";
    $result = $conn->query($sql);
    echo
        "<table border='1'>
            <tr>
                <th>Ma hang</th>
                <th>Ten hang</th>
                <th>Hang san xuat</th>
                <th>Gia</th>
                <th>Thao tac</th>
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
                    <a href='action/update.php?ma_hang=" . $row['ma_hang'] . "'>Sua</a> |
                    <a href='action/delete.php?ma_hang=" . $row['ma_hang'] . "'>Xoa</a>
                </td>
            </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Khong co du lieu</td></tr>";
    }
    echo "</table>";

    $conn->close();
    ?>
</body>
</html>
