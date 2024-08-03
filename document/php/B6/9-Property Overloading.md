## Property Overloading trong PHP

### Định nghĩa

**Property Overloading** là một tính năng trong PHP cho phép bạn tùy chỉnh hành vi khi truy cập vào các thuộc tính của một đối tượng, ngay cả khi các thuộc tính đó chưa được khai báo trước. Thay vì báo lỗi khi truy cập một thuộc tính không tồn tại, bạn có thể định nghĩa các phương thức đặc biệt để xử lý các trường hợp này.

**Các phương thức magic liên quan đến Property Overloading:**

- **`__get($name)`:** Được gọi khi bạn cố gắng đọc một thuộc tính không tồn tại.
- **`__set($name, $value)`:** Được gọi khi bạn cố gắng gán giá trị cho một thuộc tính không tồn tại.
- **`__isset($name)`:** Được gọi khi bạn sử dụng `isset()` trên một thuộc tính.
- **`__unset($name)`:** Được gọi khi bạn sử dụng `unset()` trên một thuộc tính.

Ví dụ:

```php
<?php

class Person
{
    public $firstName;
    public $lastName;

    public function __get($name)
    {
        if ($name === 'fullName') {
            return $this->firstName . ' ' . $this->lastName;
        } else {
            trigger_error("Undefined property: $name", E_USER_NOTICE);
            return null;
        }
    }

    public function __set($name, $value)
    {
        if ($name === 'fullName') {
            $parts = explode(' ', $value);
            $this->firstName = $parts[0];
            $this->lastName = $parts[1];
        } else {
            trigger_error("Undefined property: $name", E_USER_WARNING);
        }
    }

    public function __isset($name)
    {
        if ($name === 'fullName') {
            return isset($this->firstName) && isset($this->lastName);
        }
        return false;
    }

    public function __unset($name)
    {
        if ($name === 'fullName') {
            unset($this->firstName, $this->lastName);
        }
    }
}

$person = new Person();
$person->firstName = 'John';
$person->lastName = 'Doe';

echo $person->fullName; // In ra: John Doe
echo "<br>";

if (isset($person->fullName)) {
    echo "- Tồn tại fullName";
    echo "<br>";
};

unset($person->fullName);

if (!isset($person->fullName)) {
    echo "- fullName đã bị unset";
    echo "<br>";
};

echo "- Đây là firstName sau khi fullName bị unset: $person->firstName";
echo "<br>";
echo " - Đây là lastName sau khi fullName bị unset: $person->lastName";
echo "<br>";

var_dump($person);
```

**Giải thích:**

- Trong ví dụ trên, lớp `Person` không có thuộc tính `fullName`.
- Khi bạn truy cập `$person->fullName`, phương thức `__get` sẽ được gọi.
- Phương thức này kiểm tra xem tên thuộc tính có phải là `fullName` không. Nếu đúng, nó sẽ trả về kết quả ghép từ `name` và `lastName`.
- Tương tự, khi bạn gán giá trị cho `$person->fullName`, phương thức `__set` sẽ được gọi và chia giá trị thành hai phần: `name` và `lastName`.
- Phương thức `__isset` được sử dụng để kiểm tra xem thuộc tính `fullName` có tồn tại hay không.

**Ứng dụng của Property Overloading:**

- **Tạo các thuộc tính ảo:** Bạn có thể tạo các thuộc tính không tồn tại trong lớp, nhưng vẫn có thể truy cập và gán giá trị cho chúng.
- **Kiểm soát truy cập:** Bạn có thể kiểm tra và xác thực dữ liệu trước khi lưu vào thuộc tính.
- **Thực hiện các logic phức tạp:** Bạn có thể thực hiện các tính toán hoặc gọi các phương thức khác khi truy cập hoặc gán giá trị cho thuộc tính.
