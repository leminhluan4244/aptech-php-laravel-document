### What (OOP là gì?)

- `Lập trình hướng đối tượng (OOP):` Là một phương pháp lập trình dựa trên các đối tượng (objects), mà mỗi đối tượng là một thực thể có trạng thái (dữ liệu) và hành vi (phương thức).
- `Các khái niệm chính trong OOP:` Bao gồm lớp (class), đối tượng (object), kế thừa (inheritance), đa hình (polymorphism), trừu tượng (abstraction), và đóng gói (encapsulation).

### Who (Ai sẽ sử dụng OOP?)

- `Lập trình viên PHP:` Những người sử dụng PHP để phát triển ứng dụng web và cần quản lý mã nguồn một cách hiệu quả, dễ bảo trì và mở rộng.
- `Người học lập trình:` Các sinh viên hoặc những người mới bắt đầu học lập trình PHP và muốn hiểu sâu hơn về các phương pháp lập trình hiện đại.


### When (Khi nào sử dụng OOP?)

- `Khi phát triển ứng dụng:` OOP thường được sử dụng khi phát triển các ứng dụng lớn và phức tạp, đòi hỏi mã nguồn dễ bảo trì, mở rộng và tái sử dụng.
- `Khi học lập trình nâng cao:` Khi người học đã nắm vững các kiến thức cơ bản về lập trình và muốn tiến xa hơn trong sự nghiệp lập trình.

### Where (Sử dụng OOP ở đâu?)

- `Trong mã nguồn PHP:` Các khái niệm và kỹ thuật OOP được sử dụng trực tiếp trong mã nguồn PHP.
- `Trong các framework PHP:` Nhiều framework PHP hiện đại như Laravel, Symfony, và Zend Framework đều được xây dựng dựa trên các nguyên tắc OOP.

### Why (Tại sao sử dụng OOP?)

- `Tái sử dụng mã nguồn:` OOP cho phép lập trình viên tái sử dụng mã nguồn thông qua các lớp và đối tượng.
- `Bảo trì dễ dàng:` Mã nguồn OOP dễ bảo trì và cập nhật hơn nhờ vào cấu trúc rõ ràng và sự phân chia trách nhiệm.
- `Quản lý phức tạp:` OOP giúp quản lý các ứng dụng phức tạp bằng cách chia chúng thành các đối tượng nhỏ hơn và dễ kiểm soát.
- `Hợp tác hiệu quả:` OOP cho phép nhiều lập trình viên làm việc cùng nhau trên cùng một dự án một cách hiệu quả.

### How (Sử dụng OOP như thế nào?)

#### `Định nghĩa lớp (Class)` 

Lớp là một `khuôn mẫu` cho các đối tượng, định nghĩa các `thuộc tính` và `phương thức` mà đối tượng của lớp đó có thể có.
  
```php
class Car {
    // Thuộc tính
    public $color;
    public $model;
    
    // Phương thức
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }
    
    public function message() {
        return "My car is a " . $this->color . " " . $this->model . ".";
    }
}
```

#### `Tạo đối tượng (Object)` 

Đối tượng là một `thể hiện` của một `lớp`, có thể có các giá trị khác nhau cho các thuộc tính của nó.

```php
$myCar = new Car("black", "Volvo");
echo $myCar->message(); // Outputs: My car is a black Volvo.

$youCar = new Car("white", "Tesla");
echo $myCar->message(); // Outputs: My car is a black Volvo.
```

#### `Kế thừa (Inheritance)` 

Kế thừa cho phép một `lớp con` kế thừa các thuộc tính và phương thức của một `lớp cha`.
  
```php
class ElectricCar extends Car {
    public $batteryLife;
    
    public function __construct($color, $model, $batteryLife) {
        parent::__construct($color, $model);
        $this->batteryLife = $batteryLife;
    }
    
    public function batteryStatus() {
        return "The battery life is " . $this->batteryLife . " hours.";
    }
}
```

#### `Đa hình (Polymorphism)`

Đa hình cho phép các đối tượng thuộc các lớp khác nhau có thể được xử lý thông qua cùng một giao diện.

```php
interface Vehicle {
    public function move();
}

class Bike implements Vehicle {
    public function move() {
        return "The bike is moving.";
    }
}

class Bus implements Vehicle {
    public function move() {
        return "The bus is moving.";
    }
}
```

#### `Trừu tượng (Abstraction) và đóng gói (Encapsulation)` 

Trừu tượng cho phép che giấu các chi tiết phức tạp và chỉ hiển thị những gì cần thiết, trong khi đóng gói bảo vệ dữ liệu khỏi bị truy cập trực tiếp từ bên ngoài.

```php
abstract class Shape {
    abstract protected function getArea();
}

class Circle extends Shape {
    private $radius;
    
    public function __construct($radius) {
        $this->radius = $radius;
    }
    
    public function getArea() {
        return pi() * pow($this->radius, 2);
    }
}
```