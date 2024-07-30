Trong PHP, `isset()` và `empty()` là hai hàm thường được sử dụng để kiểm tra sự tồn tại và giá trị của một biến. Mặc dù cả hai hàm đều liên quan đến việc kiểm tra biến, nhưng chúng có những cách hoạt động và mục đích sử dụng khác nhau.

### Hàm isset()

- `Chức năng:` Kiểm tra xem một biến đã được khai báo và có giá trị khác null hay chưa.
- `Trả về:`
  - `TRUE:` Nếu biến đã được khai báo và không phải null.
  - `FALSE:` Nếu biến chưa được khai báo hoặc có giá trị null.
- `Sử dụng:`
  - Kiểm tra xem một biến có tồn tại trước khi sử dụng để tránh lỗi "undefined variable".
  - Kiểm tra sự tồn tại của các phần tử trong mảng.
  - Kiểm tra sự tồn tại của các biến được truyền qua phương thức POST hoặc GET.

`Ví dụ:`

```php
$name = "John Doe";

if (isset($name)) {
  echo "Biến $name đã được khai báo và có giá trị.";
} else {
  echo "Biến $name chưa được khai báo hoặc có giá trị null.";
}
```

### Hàm empty()

- `Chức năng:` Kiểm tra xem một biến có coi là rỗng hay không.
- `Trả về:`
  - `TRUE:` Nếu biến không tồn tại, có giá trị null, 0, false, "" (chuỗi rỗng), mảng rỗng hoặc đối tượng không có thuộc tính.
  - `FALSE:` Trong tất cả các trường hợp khác.
- `Sử dụng:`
  - Kiểm tra xem một biến có chứa giá trị hữu ích hay không.
  - Kiểm tra xem một trường trong form có được điền giá trị hay không.

`Ví dụ:`

```php
$age = 0;

if (empty($age)) {
  echo "Biến $age không có giá trị hoặc có giá trị được coi là rỗng.";
} else {
  echo "Biến $age có giá trị.";
}
```

### Sự khác biệt giữa isset() và empty()

| Đặc điểm           | isset()                                        | empty()                                             |
| ------------------ | ---------------------------------------------- | --------------------------------------------------- |
| `Kiểm tra`         | Kiểm tra sự tồn tại và giá trị khác null       | Kiểm tra giá trị có được coi là rỗng hay không      |
| `Trả về TRUE khi:` | Biến đã được khai báo và không phải null       | Khi giá trị đầu vào là `truthy`                     |
| `Sử dụng`          | Kiểm tra sự tồn tại của biến trước khi sử dụng | Kiểm tra xem biến có chứa giá trị hữu ích hay không |

### Khi nào nên sử dụng hàm nào?

- `isset():` Sử dụng khi bạn muốn kiểm tra xem một biến đã được khai báo và có giá trị hay chưa.
- `empty():` Sử dụng khi bạn muốn kiểm tra xem một biến có chứa giá trị hữu ích hay không, bao gồm cả việc kiểm tra xem một biến có được định nghĩa hay chưa.

Ví dụ:

```php
if (isset($_POST['username']) && !empty($_POST['username'])) {
  // Xử lý khi người dùng nhập username
} else {
  echo "Vui lòng nhập username.";
}
```

Trong ví dụ trên, ta kết hợp cả hai hàm để đảm bảo rằng biến `$_POST['username']` đã được truyền từ form và có giá trị không rỗng.
