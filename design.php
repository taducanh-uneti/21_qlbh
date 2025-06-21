<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <a href="display.php">Danh sách</a>
    <h1>Thêm sản phẩm</h1>
    <form action="action/add.php" method="POST">
        <label for="id">Nhập mã hàng:</label>
        <input type="number" id="id" name="ma_hang" min="1" required><br><br>
        <label for="name">Nhập tên hàng:</label>
        <input type="text" id="name" name="ten_hang" required><br><br>
        <label for="brand">Nhập hãng sản xuất:</label>
        <input type="text" id="brand" name="hang_sx" required><br><br>
        <label for="price">Nhập giá:</label>
        <input type="number" id="price" name="gia" step="0.01" min="0" required><br><br>
        <input type="submit" value="Thêm sản phẩm">
        <input type="reset" value="Nhập lại">
    </form>
</body>
</html>