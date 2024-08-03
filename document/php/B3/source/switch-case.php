<html>
   <body>
      
      <?php
         $d=date("D");
         
         switch ($d)
         {
            case "Mon":
               echo "Hôm nay là Thứ Hai";
               break;
            
            case "Tue":
               echo "Hôm nay là Thứ Ba";
               break;
            
            case "Wed":
               echo "Hôm nay là Thứ Tư";
               break;
            
            case "Thu":
               echo "Hôm nay là Thứ Năm";
               break;
            
            case "Fri":
               echo "Hôm nay là Thứ Sáu";
               break;
            
            case "Sat":
               echo "Hôm nay là Thứ Bảy";
               break;
            
            case "Sun":
               echo "Hôm nay là Chủ Nhật";
               break;
            
            default:
               echo "Còn ngày này là thứ mấy ???";
         }

      ?>
   </body>
</html>