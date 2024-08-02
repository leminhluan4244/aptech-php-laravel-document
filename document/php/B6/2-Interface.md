## Interface trong PHP

### Định Nghĩa

- Interface là một tập hợp các phương thức trừu tượng (chỉ khai báo, không có định nghĩa) mà các lớp phải triển khai.

### Liên hệ thực tế

Hãy tưởng tượng bạn đang xây dựng một hệ thống cho các loại phương tiên giao thông (Truck, Bikes). Mỗi loại phương tiện có thể có phương thức `drive()`, `stop()`, và `refuel()`.

Với bài toán này việc bạn cần làm là thiết kế một `class Vehicle` chung nhất và các class khác sau này sẽ kế thừa (`Vehicle`, `Bikes`).
Lúc này bạn tạo ra một lớp `Vehicle` với 3 phương thức: `drive()`, `stop()`, và `refuel()`. Tạm thời bạn sẽ để trống nội dung của các function trên để làm sau:

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
class Truck extends Vehicle {
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

Lúc này mọi việc vẫn tốt và bạn quay lại để làm nốt phần còn lại của `class Vehicle`. Tuy nhiên khi tiếp tục bạn nhận ra một vấn đề, bạn biết rằng mỗi loại xe sẽ thực hiện 3 hành động, nhưng hành động chúng sẽ khác nhau và tại lớp `class Vehicle` bạn không biết dùng hành động nào làm hành động chung cho các class con của nó, nếu dùng bất kỳ một hành động của loại xe nào làm đại diện thì cũng không hề hợp lý, đây là lý do vì sau chúng ta nên sử dụng interface. Với interface bạn chỉ cần chỉ ra các class con sẽ cần khai báo bao nhiêu thứ mà không cần nêu ra chi tiết của chúng ngay tại tại interface.

### Ví Dụ thực tế với trường hợp trên

Hãy tưởng tượng bạn đang xây dựng một hệ thống cho các loại xe (Cars, Bikes). Mỗi loại xe có thể có phương thức `drive()`, `stop()`, và `refuel()`. Chúng ta có thể định nghĩa một interface để buộc tất cả các loại xe phải triển khai các phương thức này.

```php
interface Vehicle {
    public function drive();
    public function stop();
    public function refuel();
}

class Truck implements Vehicle {
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

$truck = new Truck();
$truck->drive();  // Output: Xe được lái bằng vô lăng

$bike = new Bike();
$bike->drive();  // Output: Xe được lái bằng hai tay cầm
```
### Các đặc điểm của Interface
#### Một `class` có thể triển khai nhiều `interface` thông qua từ khóa `implements`.

Giả sử chúng ta đang xây dựng một hệ thống quản lý thư viện.

- Interface `Searchable`: Định nghĩa các phương thức để tìm kiếm sách theo tiêu đề, tác giả, thể loại.
- Interface `Rentable`: Định nghĩa các phương thức để cho mượn và trả sách.
- Class `Book`: Triển khai cả hai interface này, tức là sách có thể được **tìm kiếm** và **cho mượn**.

```php
interface Searchable {
    public function searchByTitle($title);
    public function searchByAuthor($author);
    public function searchByCategory($category);
}

interface Rentable {
    public function rent();
    public function returnBook();
}

class Book implements Searchable, Rentable {
    private $title;
    private $author;
    private $category;
    private $isAvailable;

    // ... các phương thức khác

    public function searchByTitle($title) {
        // Logic tìm kiếm sách theo tiêu đề
    }

    public function searchByAuthor($author) {
        // Logic tìm kiếm sách theo tác giả
    }

    public function searchByCategory($category) {
        // Logic tìm kiếm sách theo thể loại
    }

    public function rent() {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            echo "Sách đã được mượn.";
        } else {
            echo "Sách hiện đang được mượn.";
        }
    }

    public function returnBook() {
        $this->isAvailable = true;
        echo "Sách đã được trả lại.";
    }
}
```

Lợi ích của việc sử dụng nhiều interface:

- Đa hình: Một đối tượng có thể đóng nhiều vai trò khác nhau. Việc tách ra nhiều interface tạo ra nhiều lựa chọn và các class sử dụng chúng có thể tạo ra nhiều bảng phối khác nhau thay vì chỉ có một lựa chọn với rất nhiều phương thức phải khai báo mặc dù một số thứ không cần sử dụng.
- Tái sử dụng mã: Các phương thức trong interface có thể được sử dụng lại trong nhiều lớp khác nhau. Các gia đoạn về sau hoặc các dự án sau này nếu bạn cần sử dụng các tính năng tương tự bạn có thể sử dụng lại interface.
- Dễ dàng mở rộng: Thêm các interface mới để bổ sung các tính năng mới cho lớp.
- Tăng tính đọc hiểu: Code sẽ trở nên rõ ràng và dễ hiểu hơn.

Lưu ý:
- Một lớp có thể implements nhiều interface, nhưng chỉ kế thừa từ một lớp cha duy nhất.

Kết luận:

Việc sử dụng interface trong PHP giúp chúng ta tạo ra các hệ thống phần mềm linh hoạt, mở rộng và dễ bảo trì. Nó cho phép chúng ta mô hình hóa thế giới thực một cách chính xác hơn và tạo ra các ứng dụng có cấu trúc tốt.

Bạn có muốn tìm hiểu thêm về các ví dụ khác hoặc các khái niệm liên quan đến interface và abstract class không?

```php
interface Searchable {
    public function searchByTitle($title);
    public function searchByAuthor($author);
    public function searchByCategory($category);
}

interface Rentable {
    public function rent();
    public function returnBook();
}

class Book implements Searchable, Rentable {
    private $title;
    private $author;
    private $category;
    private $isAvailable;

    // ... các phương thức khác

    public function searchByTitle($title) {
        // Logic tìm kiếm sách theo tiêu đề
    }

    public function searchByAuthor($author) {
        // Logic tìm kiếm sách theo tác giả
    }

    public function searchByCategory($category) {
        // Logic tìm kiếm sách theo thể loại
    }

    public function rent() {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            echo "Sách đã được mượn.";
        } else {
            echo "Sách hiện đang được mượn.";
        }
    }

    public function returnBook() {
        $this->isAvailable = true;
        echo "Sách đã được trả lại.";
    }
}
```
#### Interface không có thuộc tính

**Interface** trong PHP được thiết kế để định nghĩa một hợp đồng (contract) mà các lớp khác phải tuân thủ. Nó giống như một bản kế hoạch chi tiết về các phương thức mà một đối tượng phải thực hiện. **Không có thuộc tính mặc định** trong interface vì lý do sau:

- **Tập trung vào hành vi:** Interface tập trung vào việc định nghĩa những hành động mà một đối tượng có thể thực hiện (các phương thức). Việc thêm thuộc tính vào interface sẽ làm mờ đi mục đích chính này.
- **Linh hoạt:** Nếu interface có thuộc tính mặc định, các lớp thực hiện interface sẽ bị giới hạn bởi các thuộc tính đó. Điều này làm giảm tính linh hoạt và khả năng tái sử dụng của interface.
- **Tránh xung đột:** Các lớp khác nhau có thể có cách triển khai thuộc tính khác nhau. Việc đặt thuộc tính mặc định trong interface có thể dẫn đến xung đột khi nhiều lớp thực hiện cùng một interface.
- **Tính rõ ràng:** Bằng cách không có thuộc tính, interface làm cho rõ ràng rằng nó chỉ định nghĩa các phương thức mà một đối tượng phải cung cấp.

**Ví dụ minh họa:**

Giả sử chúng ta có một interface `Shape` với một thuộc tính `color` mặc định là "red":

```php
interface Shape {
    public function draw();
    public $color = "red"; // Không nên làm như vậy
}
```

Nếu một lớp `Circle` thực hiện interface này, nó sẽ bị giới hạn bởi màu đỏ:

```php
class Circle implements Shape {
    public function draw() {
        // ...
    }
}

$circle = new Circle();
echo $circle->color; // Sẽ in ra "red"
```

Tuy nhiên, nếu chúng ta muốn tạo một hình tròn màu xanh, chúng ta sẽ gặp khó khăn.

**Cách làm đúng:**

```php
interface Shape {
    public function draw();
}

class Circle implements Shape {
    private $color;

    public function __construct($color) {
        $this->color = $color;
    }

    public function draw() {
        // ...
    }
}
```

Bằng cách này, lớp `Circle` có thể tự do quyết định màu sắc của mình.

#### Tất cả các phương thức trong interface là public
Trong ngữ cảnh của interface, việc sử dụng protected hoặc private là không cần thiết. Protected thường được sử dụng trong các lớp để bảo vệ dữ liệu và phương thức khỏi sự truy cập từ bên ngoài, nhưng interface không có dữ liệu để bảo vệ.
Private cũng có nguyên nhân tương tự, interface không phải là một lớp hoàn chỉnh, nó chỉ cung cấp một bản thiết kế. Việc khai báo một phương thức là private sẽ đi ngược lại với mục đích này, vì phương thức private chỉ có thể được truy cập từ bên trong lớp.