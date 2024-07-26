<?php
function static_variable()
{
    static $X = 10; //static variable
    $Y = 20; // non-static variable
    $X++; //increment in static variable
    $Y++; //increment in non-static variable
    echo "Static: " .$X ."</br>";
    echo "Non-static: " .$Y ."</br>";
}
//first function call
static_variable();
echo '<hr>';
//second function call
static_variable();

echo '<hr>';

class Counter {
  static $count = 0; // Biến tĩnh

  public function increment() {
    self::$count++; // Truy cập biến tĩnh bằng self::
    echo "Số lượng sau khi gọi hàm: " . self::$count . "\n";
    echo '<hr>';
  }
}

$counter1 = new Counter();
$counter1->increment(); // 1

$counter2 = new Counter();
$counter2->increment(); // 2

echo "Số lượng cuối cùng: " . Counter::$count . "\n"; // 2
