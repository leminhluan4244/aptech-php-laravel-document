
## So Sánh Interface và Abstract Class

### So Sánh Interface và Abstract Class

| Đặc Điểm    | Interface                                             | Abstract Class                                              |
| --------------- | --------------------------------------------------------- | --------------------------------------------------------------- |
| Mục Đích    | Định nghĩa các phương thức mà lớp phải triển khai         | Định nghĩa các phương thức và có thể cung cấp định nghĩa cơ bản |
| Kế Thừa     | Một lớp có thể triển khai nhiều interface                 | Một lớp chỉ có thể kế thừa một abstract class                   |
| Phương Thức | Chỉ chứa các phương thức trừu tượng (không có định nghĩa) | Có thể chứa cả phương thức trừu tượng và phương thức cụ thể     |
| Thuộc Tính  | Không thể chứa thuộc tính                                 | Có thể chứa thuộc tính                                          |

### Kết hợp Interface và Abstract Class

- Một `Abstract Class` có thể `implements` một hoặc nhiều `Interface`.
- Một class cùng lúc có thể kế thừa một `Abstract Class` và một hoặc nhiều `Interface`.

Xem ví dụ sau:
```php
// Interface phương tiện giao thông
interface Vehicle {
    public function drive();
    public function stop();
    public function refuel();
}

// Abstract dành cho xe 2 bánh
abstract class Motor implements Vehicle {
    protected $numberPeople;
    public function __construct() {
        $this->numberPeople = 2;
    }

    public function drive() {
        echo "Xe được lái bằng hai tay cầm";
    }

    public function stop() {
        echo "Xe dừng bằng phanh tay";
    }

    public abstract function refuel();
}

// Abstract dành cho xe Winner X
class HondaWinerX extends Motor implements Vehicle {
    public function refuel() {
        echo "Sử dụng xăng";
    }
}

// Abstract dành cho xe Suzuki Sport Xipo
class SuzukiSportXipo extends Motor implements Vehicle {
    public function refuel() {
        echo "Sử dụng xăng và nhớt hỗ hợp";
    }
}

// Abstract dành cho xe Vinfast Evo200
class VinfastEvo200 extends Motor implements Vehicle {
    public function refuel() {
        echo "Sử dụng điện năng";
    }
}
```

Tiếp tục ví dụ trên ứng dụng `implements` nhiều interface cho xe máy lội nước.
![Motor](../../../assets/image/image27.png)

Vì xe lội nước có 1 điểm khác biệt mới là cách lội nước (có thể là dùng chân vịt, dùng máy thổi, ...). Nên ta cần tạo ra một hàm tương ứng tên `wade`, nhưng nếu đưa nó vào `interface Vehicle` thì sẽ hơi vô lý vì các loại xe khác như `HondaWinerX`, `SuzukiSportXipo`, `VinfastEvo200` sẽ bị `interface Vehicle` yêu cầu tạo ra hàm `wade`. Vì vậy ta sẽ tạo một interface mới là `VehicleWater`:
```php
interface VehicleWater {
    public function wade();
}


class Biski extends Motor implements Vehicle, VehicleWater {
    public function refuel() {
        echo "Sử dụng xăng";
    }

    public function wade() {
        echo "Sử chân vịt truyền động";
    }
}
```

### Kết Luận

- Interface hữu ích khi bạn muốn đảm bảo rằng các lớp khác nhau triển khai một tập hợp các phương thức cụ thể.
- Abstract Class hữu ích khi bạn muốn cung cấp một số chức năng cơ bản mà các lớp con có thể kế thừa và mở rộng.
