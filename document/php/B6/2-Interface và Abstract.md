### Interface trong PHP

#### Định Nghĩa

- **Interface** là một tập hợp các phương thức trừu tượng (chỉ khai báo, không có định nghĩa) mà các lớp phải triển khai.
- Một lớp có thể triển khai nhiều interface.

#### Liên hệ thực tế

Hãy tưởng tượng bạn đang xây dựng một hệ thống cho các loại xe (Cars, Bikes). Mỗi loại xe có thể có phương thức `drive()`, `stop()`, và `refuel()`.

Với bài toán này việc bạn cần làm là thiết kế một `class Vehicle` chung nhất và các class khác sau này sẽ kế thừa (`Car`, `Bikes`).
Lúc này bạn tạo ra một lớp Cars với 3 phương thức: `drive()`, `stop()`, và `refuel()`. Tạm thời bạn sẽ để trống nội dung của các function trên để làm sau:

```php
class Vehicle {
    public function drive() {
        //TODO
    };

    public function stop() {
        //TODO
    };

    public function refuel() {
        //TODO
    };
}
```

Tiếp theo bạn tạo ra 2 class kế thừa là `Trucks` và `Bikes`:

```php
class Trucks extends Vehicle {
    public function drive() {
        echo "Xe được lái bằng vô lăng";
    }

    public function stop() {
        echo "Xe dừng bằng phanh chân";
    }

    public function refuel() {
        echo "Sử dụng xăng";
    }
}

class Bike extends Vehicle {
    public function drive() {
        echo "Xe được lái bằng hai tay cầm";
    }

    public function stop() {
        echo "Xe dừng bằng phanh tay";
    }

    public function refuel() {
        echo "Không cần tiếp nhiên liệu, ăn cơm no là được";
    }
}
```

Lúc này mọi việc vẫn tốt và bạn quay lại để làm nốt phần còn lại của `class Vehicle`. Tuy nhiên khi tiếp tục bạn nhận ra một vấn đề, bạn biết rằng mỗi loại xe sẽ thực hiện 3 hành động, nhưng hành động chúng sẽ khác nhau và tại lớp `class Vehicle` bạn không biết dùng hành động nào làm hành động chung cho các class con của nó, nếu dùng bất kỳ một hành động của loại xe nào làm đại diện thì cũng không hề hợp lý, đây là lý do vì sau chúng ta nên sử dụng `Interface`. Với interface bạn chỉ cần chỉ ra là các class con sẽ cần khai báo bao nhiêu thứ mà không cần nêu ra chi tiết của chúng ngay tại tại `Interface`.

#### Ví Dụ Thực Tế với trường hợp trên

Hãy tưởng tượng bạn đang xây dựng một hệ thống cho các loại xe (Cars, Bikes). Mỗi loại xe có thể có phương thức `drive()`, `stop()`, và `refuel()`. Chúng ta có thể định nghĩa một interface để buộc tất cả các loại xe phải triển khai các phương thức này.

```php
interface Vehicle {
    public function drive();
    public function stop();
    public function refuel();
}

class Trucks implements Vehicle {
    public function drive() {
        echo "Xe được lái bằng vô lăng";
    }

    public function stop() {
        echo "Xe dừng bằng phanh chân";
    }

    public function refuel() {
        echo "Sử dụng xăng";
    }
}

class Bike implements Vehicle {
    public function drive() {
        echo "Xe được lái bằng hai tay cầm";
    }

    public function stop() {
        echo "Xe dừng bằng phanh tay";
    }

    public function refuel() {
        echo "Không cần tiếp nhiên liệu, ăn cơm no là được";
    }
}

$car = new Car();
$car->drive();  // Output: Car is driving

$bike = new Bike();
$bike->drive();  // Output: Bike is driving
```

### Abstract Class trong PHP

#### Định Nghĩa

- **Abstract class** là một lớp không thể tạo ra đối tượng trực tiếp, mà chỉ có thể được kế thừa.
- Abstract class có thể chứa cả các phương thức trừu tượng (không có định nghĩa) và các phương thức cụ thể (có định nghĩa).
- Một lớp chỉ có thể kế thừa từ một abstract class.

#### Ví Dụ Thực Tế

Tiếp tục với ví dụ về hệ thống các loại xe, hãy tưởng tượng bạn muốn thêm một số phương thức chung mà tất cả các loại xe sẽ sử dụng. Chúng ta có thể sử dụng một abstract class để định nghĩa các phương thức này.

#### Ví Dụ Cụ Thể

```php
abstract class Vehicle {
    public function startEngine() {
        echo "Engine started\n";
    }

    abstract public function drive();
    abstract public function stop();
    abstract public function refuel();
}

class Car extends Vehicle {
    public function drive() {
        echo "Car is driving\n";
    }

    public function stop() {
        echo "Car has stopped\n";
    }

    public function refuel() {
        echo "Refueling car\n";
    }
}

class Bike extends Vehicle {
    public function drive() {
        echo "Bike is driving\n";
    }

    public function stop() {
        echo "Bike has stopped\n";
    }

    public function refuel() {
        echo "Refueling bike\n";
    }
}

$car = new Car();
$car->startEngine();  // Output: Engine started
$car->drive();        // Output: Car is driving

$bike = new Bike();
$bike->startEngine();  // Output: Engine started
$bike->drive();        // Output: Bike is driving
```

### So Sánh Interface và Abstract Class

| **Đặc Điểm**    | **Interface**                                             | **Abstract Class**                                              |
| --------------- | --------------------------------------------------------- | --------------------------------------------------------------- |
| **Mục Đích**    | Định nghĩa các phương thức mà lớp phải triển khai         | Định nghĩa các phương thức và có thể cung cấp định nghĩa cơ bản |
| **Kế Thừa**     | Một lớp có thể triển khai nhiều interface                 | Một lớp chỉ có thể kế thừa một abstract class                   |
| **Phương Thức** | Chỉ chứa các phương thức trừu tượng (không có định nghĩa) | Có thể chứa cả phương thức trừu tượng và phương thức cụ thể     |
| **Thuộc Tính**  | Không thể chứa thuộc tính                                 | Có thể chứa thuộc tính                                          |

### Kết Luận

- **Interface** hữu ích khi bạn muốn đảm bảo rằng các lớp khác nhau triển khai một tập hợp các phương thức cụ thể.
- **Abstract class** hữu ích khi bạn muốn cung cấp một số chức năng cơ bản mà các lớp con có thể kế thừa và mở rộng.

Hy vọng rằng với những ví dụ liên hệ thực tế này, học sinh của bạn sẽ hiểu rõ hơn về cách sử dụng interface và abstract class trong PHP.
