<!DOCTYPE html>
<html>

<head>
   <title>Form trong PHP</title>
</head>

<body>
   <h2>Mẫu đăng ký lớp mới Aptech </h2>
   <form method="post" action="form-output.php">
      <table>
         <tr>
            <td>Họ tên:</td>
            <td><input type="text" name="name"></td>
         </tr>
         <tr>
            <td>E-mail:</td>
            <td><input type="text" name="email"></td>
         </tr>
         <tr>
            <td>Thời gian học:</td>
            <td><input type="text" name="time"></td>
         </tr>
         <tr>
            <td>Bình luận:</td>
            <td><textarea name="comment" rows="5" cols="40"></textarea></td>
         </tr>
         <tr>
            <td>Giới tính:</td>
            <td>
               <input type="radio" name="gender" value="male">Nam
               <input type="radio" name="gender" value="female">Nữ
            </td>
         </tr>
         <tr>
            <td><input type="submit" name="submit" value="Submit"></td>
         </tr>
      </table>
   </form>
</body>

</html>