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

// Lấy danh sách sinh viên
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['search'] != "") {
    $sql = "SELECT students.*, classes.class_name FROM students INNER JOIN classes ON students.class_id = classes.class_id WHERE students.student_name LIKE '%{$_POST['search']}%' OR classes.class_name LIKE '%{$_POST['search']}%'";
} else {
    $sql = "SELECT students.*, classes.class_name FROM students INNER JOIN classes ON students.class_id = classes.class_id";
}

$result = mysqli_query($conn, $sql);

mysqli_close($conn);

// Hiển thị danh sách sinh viên dưới dạng bảng HTML
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sinh viên</title>
</head>
<body>
    <h2>Danh sách sinh viên</h2>

    <form method="post">
        <input type="text" name="search" placeholder="Tìm kiếm theo tên" value="<?php echo $_POST['search'] ?? "" ?>">
        <input type="submit" value="Tìm kiếm">
    </form>
    <hr>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Lớp</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["student_id"] . "</td>";
            echo "<td>" . $row["student_name"] . "</td>";
            echo "<td>" . $row["birth_date"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["class_name"] . "</td>";
            // ... các trường khác
            echo "<td><a href='edit_student.php?id=" . $row["student_id"] . "'>Sửa</a></td>";
            echo "<td><a href='delete_student.php?id=" . $row["student_id"] . "'>Xóa</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
    <hr>
    <a href="add_student.php">Thêm mới sinh viên</a>
</body>
</html>