<html>
   <body>
   
      <?php
         $d=date("D");
         
         if ($d=="Fri"){
            echo "Chúc cuối tuần vui vẻ!";
         } elseif ($d=="Sun") {
            echo "Chủ nhật vui vẻ!"; 
         } else {
            echo "Chúc một ngày vui vẻ!";
         }
      ?> 
   </body>
</html>
