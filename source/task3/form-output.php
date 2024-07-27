<!DOCTYPE html>
<html>

<head>
   <title>Kết quả nhập liệu</title>
</head>

<body>
   <?php
   // Định nghĩa các biến và gán giá trị rỗng cho biến
   $name = $email = $gender = $comment = $website = "";

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $time = test_input($_POST["time"]);
      $comment = test_input($_POST["comment"]);
      $gender = test_input($_POST["gender"]);
   }

   function test_input($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
   ?>

   <h2>Thông tin bạn đã cung cấp:</h2>
   <?php
   echo "Họ tên: " . $name . "<br>";
   echo "E-mail: " . $email . "<br>";
   echo "Thời gian học: " . $time . "<br>";
   echo "Tên lớp: " . $comment . "<br>";
   echo "Giới tính: " . $gender . "<br>";
   ?>
</body>

</html>