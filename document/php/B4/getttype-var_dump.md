### Giới thiệu về hai hàm gettype() và var_dump trong PHP

Trong PHP, việc xác định kiểu dữ liệu của một biến là vô cùng quan trọng, đặc biệt khi bạn làm việc với các dữ liệu phức tạp. Hai hàm `gettype()` và `var_dump()` chính là những công cụ hữu ích giúp bạn thực hiện việc này.

### Hàm gettype()

`Chức năng:`

- Trả về kiểu dữ liệu của một biến dưới dạng một chuỗi.

`Cú pháp:`

```php
gettype($variable)
```

`Ví dụ:`

```php
$number = 10;
$string = "Hello";
$array = [1, 2, 3];

echo gettype($number);  // Output: integer
echo gettype($string);  // Output: string
echo gettype($array);   // Output: array
```

`Các kiểu dữ liệu có thể trả về:`

- `integer:` Số nguyên
- `double:` Số thực
- `string:` Chuỗi ký tự
- `array:` Mảng
- `object:` Đối tượng
- `boolean:` Giá trị logic (true hoặc false)
- `NULL:` Giá trị null
- `resource:` Tài nguyên (ví dụ: kết nối đến cơ sở dữ liệu)

### Hàm var_dump()

`Chức năng:`

- Hiển thị thông tin chi tiết về một hoặc nhiều biến, bao gồm cả kiểu dữ liệu và giá trị.

`Cú pháp:`

```php
var_dump(variable1, variable2, ...)
```

`Ví dụ:`

```php
$x = array(2, 5, 9, 6);
var_dump($x);
```

`Kết quả:`

```
array(4) {
  [0]=>
  int(2)
  [1]=>
  int(5)
  [2]=>
  int(9)
  [3]=>
  int(6)
}
```

`Sự khác biệt giữa gettype() và var_dump()`

- `gettype()` chỉ trả về kiểu dữ liệu, trong khi `var_dump()` cung cấp thông tin chi tiết hơn về biến, bao gồm cả giá trị và cấu trúc.
- Trong khi `gettype()` được dùng trong code bình thường như các hàm khác thì `var_dump()` thường được lập trình viên chèn vào code để xem chi tiết dữ liệu của biến rồi sau đó xóa đi (hỗ trợ `debug` nhiều hơn là `production`).

Ngoài ra ta còn có: `print_r()` là một hàm tương tự như `var_dump()`, nhưng nó hiển thị thông tin một cách ngắn gọn hơn.