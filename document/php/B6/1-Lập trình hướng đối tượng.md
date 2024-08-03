## Cơ bản về lập trình hướng đối tượng

### What (OOP là gì?)

`OOP` viết tắt của Object-Oriented Programming – Lập trình hướng đối tượng ra đời giải quyết các vấn đề mà lập trình truyền thống gặp phải. Lập trình hướng đối tượng không chỉ đơn giản là các cú pháp, câu lệnh mới mà còn là một cách tư duy mới khi giải quyết một vấn đề.

`Lập trình hướng đối tượng (OOP):` Là một phương pháp lập trình dựa trên các đối tượng (objects), mà mỗi đối tượng là một thực thể có trạng thái (dữ liệu) và hành vi (phương thức).

- Lập trình hướng đối tượng có 4 tính chất chính:
  - Tính trừu tượng (abstraction).
  - Tính kế thừa (inheritance).
  - Tính đóng gói (encapsulation).
  - Tính đa hình (polymorphism).

### Các khái niệm cơ bản trong OOP

**Lớp và đối tượng**

- **Lớp (Class)**: Lớp là tập hợn các thuộc tính (biến) và phương thức (hàm) mà các đối tượng được tạo ra bởi nó có thể sử dụng.
- **Đối tượng (Object)**: Từ một bản thiết kế class ta có thể đối tượng là sự thể hiện cụ thể của một lớp. Nó có thể sử dụng các giá trị và các phương thức của lớp tạo ra nó.

**Thuộc tính và phương thức**

- **Thuộc tính (Properties/Attribute)**: Đây là các **biến** dùng để lưu trữ dữ liệu và chúng được định nghĩa ở trong lớp. Tên thuộc tính thường là các **tính từ** hoặc **danh từ**.
- **Phương thức (Method)**: Đây là các **hàm** để thực hiện một chức năng nhất định có liên quan đến đối tượng và chúng cũng được định nghĩa ở trong lớp. Tên của phương thức thường là **động từ**.

**Hàm khởi tạo (Constructor) và Hàm hủy (Destructor)**

- **Hàm khởi tạo (Constructor)**: Đây là một phương thức đặc biệt, nó sẽ được gọi ngay sau khi đối tượng của lớp đó được tạo ra. Thông thường trong hàm khởi tạo chúng ta sẽ khởi tạo các **thuộc tính** của đối tượng để có thể sử dụng khi cần thiết.
- **Hàm hủy (Destructor)**: Ngược lại với hàm khởi tạo, hàm hủy có tác dụng giải phóng tài nguyên mà đối tượng đã sử dụng. Hàm này được gọi sau khi đối tượng bị xóa bỏ khỏi bộ nhớ.

```php
class Fruit {
  public $name;
  public $color;

  function __construct($name) {
    $this->name = $name;
  }
  function __destruct() {
    echo "The fruit is {$this->name}.";
  }
}

$apple = new Fruit("Apple");
```

**Từ khoá `this`**

- `this` là một từ khóa đặc biệt trong PHP, được sử dụng bên trong một lớp để tham chiếu đến đối tượng hiện tại của lớp đó.
- Nó cho phép truy cập đến các thuộc tính và phương thức của đối tượng hiện tại.

```php
class Car {
    public $model;
    public $year;

    public function __construct($model, $year) {
        $this->model = $model;
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Model: " . $this->model . ", Year: " . $this->year;
    }
}

$myCar = new Car('Toyota', 2021);
$myCar->displayInfo();  // Output: Model: Toyota, Year: 2021
```

**Từ khóa `instanceof`**

- `instanceof` là một toán tử trong PHP được sử dụng để kiểm tra xem một đối tượng có phải là một instance (thực thể) của một lớp hoặc một interface cụ thể hay không.

```php
class Car
{
    public $model;
    public $year;

    public function __construct($model, $year)
    {
        $this->model = $model;
        $this->year = $year;
    }

    public function displayInfo()
    {
        echo "Model: " . $this->model . ", Year: " . $this->year;
    }
}

$myCar = new Car('Toyota', 2021);
if ($myCar instanceof Car) {
    echo "Đây là đối tượng của lớp Car";
} else {
    echo "Đây không phải là đối tượng của lớp Car";
}
```

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

$car = new Car('RED', '2022');
$str = $car->message();
echo $str;
```

#### `Tạo đối tượng (Object)`

Đối tượng là một `thể hiện` của một `lớp`, có thể có các giá trị khác nhau cho các thuộc tính của nó.

```php
// ...
$myCar = new Car("black", "Volvo");
echo $myCar->message(); // Outputs: My car is a black Volvo.

echo "<hr>";

$youCar = new Car("white", "Tesla");
echo $youCar->message(); // Outputs: My car is a white Tesla.
```

#### `Tính kế thừa (Inheritance)`

Với tính kế thừa, khi chúng ta có một lớp cha gồm các thuộc tính và phương thức, chúng ta hoàn toàn có thế kế thừa nó cho lớp con, lúc này những gì có ở lớp cha thì lớp con cũng đều sử dụng được. Điều này áp dụng rất hiệu quả cho việc tái sử dụng mã nguồn cũng như là xây dựng các cấu trúc phân cấp. Để sử dụng tính kế thừa ta sử dụng từ khoá `extends`

Bạn có thể liên hệ thực tế, lớp cha giống như một người cha đã có sẵn các tài sản (phương thức, thuộc tính). Lớp con sau khi tạo ra sẽ được thừa kế các tài sản này, do đó lớp cha có thuộc tính hoặc phương thức nào thì lớp con cũng có phương thức và thuộc tính tương tự như vậy. Ngoài ra, người con cũng có thể điều chỉnh, bổ sung các tài sản hiện có, các hành động này sẽ được mô tả ở tính chất đa hình (Polymorphism) ở phần sau.

Kế thừa cho phép một `lớp con` kế thừa các thuộc tính và phương thức của một `lớp cha`.

```php

class Car {
    public $batteryLife;

    public function batteryStatus() {
        return "The battery life is " . $this->batteryLife . " hours.";
    }
}

class ElectricCar extends Car {

}
// Bạn có thể tạo mới class ElectricCar và gọi các phương thức mà nó được kế thừa từ Car.
$myCar = new ElectricCar("white", "Tesla");
$myCar->batteryLife = 5;
echo $myCar->batteryStatus();
```

#### `Tính đa hình (Polymorphism)`

Tính đa hình trong lập trình hướng đối tượng là sự đa hình của mỗi hành động cụ thể ở những đối tượng khác nhau. Ví dụ hành động ăn ở các loài động vật hoàn toàn khác nhau như: con heo ăn cám, hổ ăn thịt

Đó là sự đa hình trong thực tế, còn đa hình trong lập trình thì được hiểu là Lớp Con sẽ `viết lại` những `phương thức` ở `lớp cha` (ovewrite).

```php
class Vehicle {
    public function move() {
        return "Moving.";
    }
}

class Bike extends Vehicle {
    public function move() {
        return "The bike is moving.";
    }
}

class Bus extends Vehicle {
    public function move() {
        return "The bus is moving.";
    }
}

$myBike = new Bike();
echo $myBike->move();

echo "<hr>";

$myBus = new Bus();
echo $myBus->move();
```

#### `Tính đóng gói (encapsulation)`

Tính đóng gói là tính chất không cho phép người dùng hay đối tượng khác thay đổi dữ liệu thành viên của đối tượng nội tại. Chỉ có các hàm thành viên của đối tượng đó mới có quyền thay đổi trạng thái nội tại của nó mà thôi. Các đối tượng khác muốn thay đổi thuộc tính thành viên của đối tượng nội tại, thì chúng cần truyền thông điệp cho đối tượng, và việc quyết định thay đổi hay không vẫn do đối tượng nội tại quyết định.

Trong PHP việc đóng gói được thực hiện nhờ sử dụng các mức độ `Access Modifiers` (một số hướng dẫn có thể gọi là `visibility`) với các từ khoá `public`, `private` và `protected`:
Trong lập trình hướng đối tượng (OOP) với PHP, tính đóng gói (encapsulation) là một khái niệm quan trọng. Tính đóng gói cho phép bạn kiểm soát khả năng truy cập và sửa đổi các thuộc tính và phương thức của một đối tượng từ bên ngoài lớp. PHP hỗ trợ ba mức độ truy cập (acces modifiers) chính: `public`, `protected`, và `private`. Dưới đây là phần giới thiệu chi tiết về các mức độ truy cập này.

##### **Public**

Các thuộc tính và phương thức khai báo với mức truy cập `public` có thể được truy cập từ bất kỳ đâu, bao gồm cả bên trong và bên ngoài lớp.

Ví dụ:

```php
class MyClass {
    public $publicProperty = 'I am public';

    public function publicMethod() {
        echo "This is a public method.";
    }
}

$object = new MyClass();
echo $object->publicProperty;  // Truy cập thuộc tính public
echo '<hr>';
$object->publicMethod();       // Gọi phương thức public
```

##### **Protected**:

Các thuộc tính và phương thức khai báo với mức truy cập `protected` chỉ có thể được truy cập từ bên trong lớp đó và các lớp con (subclasses).

Ví dụ:

```php
class MyClass {
    protected $protectedProperty = 'I am protected <br>';

    protected function protectedMethod() {
        echo "This is a protected method. <br>";
    }

    public function accessProtected() {
        // Truy cập thuộc tính và phương thức protected từ bên trong lớp
        echo $this->protectedProperty;
        $this->protectedMethod();
    }
}

class ChildClass extends MyClass {
    public function accessParentProtected() {
        // Truy cập thuộc tính và phương thức protected từ lớp con
        echo $this->protectedProperty;
        $this->protectedMethod();
    }
}

$object = new MyClass();
$object->accessProtected();  // OK

echo "<hr>";

$childObject = new ChildClass();
$childObject->accessParentProtected();  // OK

// Không thể truy cập trực tiếp từ bên ngoài
// echo $object->protectedProperty;  // Lỗi
// $object->protectedMethod();       // Lỗi
```

##### **Private**:

Các thuộc tính và phương thức khai báo với mức truy cập `private` chỉ có thể được truy cập từ bên trong chính lớp đó. Không thể truy cập từ các lớp con hay từ bên ngoài.

Ví dụ

```php
class MyClass {
    private $privateProperty = 'I am private <br>';

    private function privateMethod() {
        echo "This is a private method. <br>";
    }

    public function accessPrivate() {
        // Truy cập thuộc tính và phương thức private từ bên trong lớp
        echo $this->privateProperty;
        $this->privateMethod();
    }
}

$object = new MyClass();
$object->accessPrivate();

// Không thể truy cập trực tiếp từ bên ngoài
// echo $object->privateProperty;  // Lỗi
// $object->privateMethod();       // Lỗi
```

**Bảng So Sánh**

| Access Modifiers | Truy cập từ chính lớp | Truy cập từ lớp con | Truy cập từ bên ngoài |
| ---------------- | --------------------- | ------------------- | --------------------- |
| Public           | ✔️                    | ✔️                  | ✔️                    |
| Protected        | ✔️                    | ✔️                  | ❌                    |
| Private          | ✔️                    | ❌                  | ❌                    |

#### `Tính trừu tượng (abstraction)`

Trừu tượng hóa là quá trình đơn giản hóa một đối tượng mà trong đó chỉ bao gồm những đặc điểm quan tâm và bỏ qua những đặc điểm chi tiết nhỏ. Quá trình trừu tượng hóa dữ liệu giúp ta xác định được những thuộc tính, hành động nào của đối tượng cần thiết sử dụng cho chương trình.

Để hiểu rõ về tính trừu tượng chúng ta sẽ tìm hiểu về `Abstract` class và `Interface`. Sẽ học ở buổi sau.
