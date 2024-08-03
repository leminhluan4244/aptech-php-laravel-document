## Namespace

### Namespace là gì ?

Namespace trong PHP là một cơ chế giúp chúng ta tổ chức code một cách logic và tránh xung đột tên giữa các lớp, hàm, hằng số... khi làm việc với các dự án lớn hoặc khi sử dụng các thư viện của bên thứ ba.

### Tại sao cần Namespace?

- **Tránh xung đột tên**: Khi dự án của bạn ngày càng lớn, việc đặt tên cho các lớp, hàm, hằng số trở nên khó khăn hơn. Namespace giúp tạo ra các không gian tên riêng biệt, tránh tình trạng hai phần tử khác nhau có cùng tên.
- **Tổ chức code**: Namespace giúp bạn sắp xếp mã một cách hợp lý, theo cấu trúc dự án, tạo nên một hệ thống mã rõ ràng và dễ quản lý.
- **Tương thích với các thư viện**: Các thư viện của bên thứ ba thường sử dụng namespace để tránh xung đột tên với các lớp, hàm của bạn.

### Liên hệ thực tế

Giả sử chúng ta có hai file PHP: thư mục `vn/Dog.php` và thư mục `jp/Dog.php`. Trong mỗi file, chúng ta đều định nghĩa một lớp có tên là Dog:

File `vn/Dog.php`:

```php
class Dog
{
    public function mostPopularDogDreed()
    {
        echo "Giống chó phổ biến nhất là chó Cỏ";
    }
}

```

File `jp/Dog.php`:

```php
class Dog {
    public function mostPopularDogDreed() {
        echo "Giống chó phổ biến nhất là chó Shiba";
    }
}
```

Vấn đề: Khi chúng ta include cả hai file này vào một file khác và cố gắng tạo một đối tượng của lớp Dog, PHP sẽ không biết nên sử dụng lớp Dog nào vì có hai lớp cùng tên. Điều này sẽ dẫn đến lỗi.

### Ví Dụ thực tế với trường hợp trên

Để giải quyết vấn đề này, chúng ta sẽ sử dụng namespace để phân biệt hai lớp Dog:

File `vn/Dog.php`:

```php
namespace Vietnam;

class Dog
{
    public function mostPopularDogDreed()
    {
        echo "Giống chó phổ biến nhất là chó Cỏ";
    }
}
```

File `jp/Dog.php`:

```php
namespace Japan;

class Dog
{
    public function mostPopularDogDreed()
    {
        echo "Giống chó phổ biến nhất là chó Shiba";
    }
}

```

File index.php

```php
require 'vendor/autoload.php';

use Vietnam\Dog as DogInVietNam;
use Japan\Dog as DogInJapan;

$dog1 = new DogInVietNam();
$dog1->mostPopularDogDreed(); // Sẽ in ra: Giống chó phổ biến nhất là chó Cỏ

$dog2 = new DogInJapan();
$dog2->mostPopularDogDreed(); // Sẽ in ra: Giống chó phổ biến nhất là chó Shiba
```
