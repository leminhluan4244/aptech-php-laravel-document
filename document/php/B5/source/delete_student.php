<?php
// Kết nối đến cơ sở dữ liệu
$host = "localhost:3306";
$username = "root";
$password = "";
$database = "quan_ly_hoc_sinh";
$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    // Chuẩn bị câu lệnh SQL để cập nhật sinh viên
    $sql = "DELETE FROM students WHERE student_id = '$student_id'";

    if (mysqli_query($conn, $sql)) {
        echo '<h3 style="color:blue">Thông tin sinh viên đã được xóa</h3>';
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

} elseif($_SERVER["REQUEST_METHOD"] == "GET") {
    // Lấy ID sinh viên cần sửa từ URL
    $student_id = $_GET['id'];
    // Lấy thông tin sinh viên từ cơ sở dữ liệu
    $sql = "SELECT * FROM students WHERE student_id = $student_id";
    $result = mysqli_query($conn, $sql);
    // Lấy 1 dòng đầu tiên của mảng data chính là thông tin sinh viên
    $student = mysqli_fetch_assoc($result);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật sinh viên</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    
    <h2>Xóa sinh sinh viên</h2>
    <form method="post">
        <?php if($_SERVER["REQUEST_METHOD"] == "GET") {?>
        <p>Bạn có muốn xóa user: <?php echo $student['student_name'] ?> không ?</p>
        <input hidden type="text" name="student_id" value=<?php echo $student['student_id'] ?>">
        <input type="submit" value="Đồng ý">
        <?php }?>
        <button><a href="index.php">Quay lại Home</a></button>
    </form>
   
</body>
</html>
