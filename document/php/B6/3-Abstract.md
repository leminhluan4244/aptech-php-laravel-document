## Abstract Class trong PHP

### Định Nghĩa

- Abstract Class là một lớp không thể tạo ra đối tượng trực tiếp, mà chỉ có thể được kế thừa.
- Abstract Class có thể chứa cả các phương thức trừu tượng (không có định nghĩa) và các phương thức cụ thể (có định nghĩa).
- Một lớp chỉ có thể kế thừa từ một abstract class.

### Liên hệ thực tế
Quay lại với phần **Liên hệ thực tế** ở phần Interface ta sẽ có:

Bài toán này là ổn vì ta không biết phải khai báo các phương thức `drive()`, `stop()`, và `refuel()` như thế nào nên việc sử dụng interface là chính xác.

Tuy nhiên nếu thay đổi lại yêu cầu, lúc này thay vì quản lý tất cả các loại xe lưu thông, ta chỉ quản lý các loại xe sử dụng động cơ đốt trong 4 bánh.

Với bài toán này việc bạn cũng sẽ thiết kế một `interface Vehicle` chung nhất mà các class khác sau này sẽ implements nó (`Truck`, `Car`).

Lúc này bạn tạo ra một interface Cars với 3 phương thức: `drive()`, `stop()`, và `refuel()`. Tạm thời bạn sẽ để trống nội dung của các function trên để làm sau:

```php
interface Vehicle {
    public function drive();
    public function stop();
    public function refuel();
}
```

Tiếp theo bạn tạo ra 2 class implements `interface Vehicle` là `Trucks` và `Car`:

```php
class Trucks implements Vehicle {
    public function drive() {
        echo "Xe được lái bằng vô lăng";
    }

    public function stop() {
        echo "Xe dừng bằng phanh chân";
    }

    public function refuel() {
        echo "Sử dụng dầu";
    }
}

class Car implements Vehicle {
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
```

Lúc này mọi việc vẫn tốt và bạn quay lại để làm nốt phần còn lại của `class Vehicle`. Tuy nhiên khi tiếp tục bạn nhận ra một vấn đề, bạn biết rằng mỗi loại xe sẽ thực hiện 3 hành động khác nhau. Tuy nhiên chúng ta gặp vấn đề sau:
- Hành động `drive` cho tất cả các loại ở trên đều là `Xe được lái bằng vô lăng`. 
- Hành động `stop` cho tất cả các loại ở trên đều là `"Xe dừng bằng phanh chân`.
- Hành động `refuel` với các xe là khác nhau.
Vấn đề này đặt ra 2 cách giải quyết
- Khai báo `Vehicle` là `class`: Bạn sẽ có thể viết phương thức chung cho `drive` và `stop`. Nhưng không có hàm `refuel` chung cho tất cả.
- Khai báo `Vehicle` là `interface`: Bạn sẽ phải khai báo lại hàm `drive` và `stop` cho tất cả các class đã `implements`. Sẽ tất tốn thời gian nếu số class trên tăng lên.

Để giải quyết vấn đề trên người ta thường dùng `abstract class`. Hiểu đơn giản `abstract class` cho phép chúng ta khai báo đầy đủ nội dung hàm hoặc không. Nó giống như một sự kết hợp linh hoạt giữa interface và class thông thường.

### Ví Dụ Thực Tế

Bạn nhận thấy tất cả các loại xe có chung 2 phương thức như nhau là `drive` và `stop` vì vậy chúng sẽ được định nghĩa bên trong Vehicle như một phương thức bình thường trong các class.
Ngược lại `refuel` thì sẽ chỉ định nghĩa tên hàm. Để phân biệt chúng ta có những phương thức chỉ định nghĩa tên sẽ có từ khóa `abstract` ở đầu tiên.

```php
abstract class Vehicle {
    public function drive() {
        echo "Xe được lái bằng vô lăng";
    }

    public function stop() {
        echo "Xe dừng bằng phanh chân";
    }

    abstract public function refuel();
}

class Truck extends Vehicle {
    public function refuel() {
        echo "Sử dụng dầu";
    }
}

class Car extends Vehicle {
    public function refuel() {
        echo "Sử dụng xăng";
    }
}

$truck = new Trucks();
$truck->drive();         // Output: Xe được lái bằng vô lăng
$truck->refuel();        // Output: Sử dụng dầu

$car = new Car();
$car->drive();          // Output: Xe được lái bằng vô lăng
$car->drive();          // Output: Sử dụng xăng
```

### Các đặc điểm của Abstract
#### Một `class` chỉ có thể kế thừa một `abstract class` thông qua từ khóa `extends`.
Việc chỉ cho phép kế thừa một `abstract class` nhằm các mục đích sau:

- **Một lớp cha duy nhất:** Nếu một lớp có thể kế thừa từ nhiều lớp cha, sẽ xảy ra xung đột khi các lớp cha này có cùng một phương thức hoặc thuộc tính với tên giống nhau nhưng định nghĩa khác nhau. Lớp con sẽ không biết nên sử dụng định nghĩa nào, dẫn đến sự mơ hồ và lỗi trong chương trình.
- **Cấu trúc rõ ràng:** Việc giới hạn một lớp chỉ có một lớp cha giúp cho cấu trúc kế thừa trở nên đơn giản và dễ hiểu hơn. Mỗi lớp con sẽ có một nguồn gốc rõ ràng và dễ dàng truy vết.

#### Abstract Class không có thuộc tính

Giống như một class thông thường `abstract class` cũng có thuộc tính. Cách khai báo và sử dụng giống như class thông thường.

#### Tất cả các phương thức trong abstract class là public hoặc protected
Abstrac Class được thiết kế với mục đích có ít nhất 1 lớp kế thừa nó vì vậy tất cả các phương thức trong abstract class là public hoặc protected.

**Vậy tại sao không phải là private?**

Không thể override: Nếu một phương thức được khai báo là private, nó chỉ có thể được truy cập từ bên trong lớp và không thể được override bởi các lớp con. Điều này sẽ làm giảm tính linh hoạt của abstract class và hạn chế khả năng kế thừa.
Mất đi tính đa hình: Nếu không thể override các phương thức, chúng ta sẽ không thể tận dụng được tính đa hình của OOP trong abstract class.