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

$classes = $result = mysqli_query($conn, "SELECT *FROM classes");
$classes=mysqli_fetch_all($classes);

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($_POST['student_name'] != "" && $_POST['birth_date'] != "") {
        $student_name = $_POST['student_name'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $class_id = $_POST['class_id'];
    
        // Chuẩn bị câu lệnh SQL để thêm mới sinh viên
        $sql = "INSERT INTO students (student_name, birth_date, gender, class_id) 
                VALUES ('$student_name', '$birth_date', '$gender', $class_id)";
        if (mysqli_query($conn, $sql)) {
            echo '<h3 style="color:blue">Sinh viên đã được thêm thành công</h3>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    } else {
        echo '<h3 style="color:red">Cần điền tất cả các trường nhé</h3>';
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Thêm mới sinh viên</title>
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
    <h2>Thêm mới sinh viên</h2>
    <form method="post">
    <table>
            <tr>
                <td>Tên sinh viên:</td>
                <td><input type="text" name="student_name"></td>
            </tr>
            <tr>
                <td>Ngày sinh:</td>
                <td><input type="date" name="birth_date"></td>
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>
                    <select name="gender">
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Lớp:</td>

                <td>
                    <select name="class_id">
                    <?php
                        foreach($classes as $row) {
                            echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                        }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
            </tr>
        </table>
    </form>
    

    <a href="index.php">Home</a>
</body>
</html>