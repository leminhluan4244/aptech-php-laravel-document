#### Interface

> Để khai báo interface trong PHP chúng ta dùng cú pháp:

```php
interface InterfaceName
{

}
```

Tính chất của `interface`:

- `Interface` không phải là một đối tượng.
- Trong `interface` chúng ta chỉ được khai báo phương thức chứ không được định nghĩa chúng.
- Trong `interface` chúng ta có thể khai báo được hằng nhưng không thể khai báo biến.
- Một `interface` không thể khởi tạo được (vì nó không phải là một đối tượng).
- Các lớp implement `interface` thì phải khai báo và định nghĩa lại các phương thức có trong `interface` đó.
- Một class có thể `implements` nhiều `interface`.
- Các `interface` có thể kế thừa lẫn nhau.

#### `Abstract class`

Lớp Abstract sẽ định nghĩa các phương thức (hàm) mà từ đó các lớp con sẽ kế thừa nó và Overwrite lại (tính đa hình).

Tính chất của `abstract`:

- Các phương thức (hàm) khi được khai báo là `abstract` thì chỉ được định nghĩa chứ không được phép viết code xử lý trong phương thức.
- Trong `abstract class` nếu không phải là phương thức `abstract` thì vẫn khai báo và viết code được như bình thường.
- Phương thức abstract chỉ có thể khai báo trong `abstract class`.
- Các thuộc tính trong `abstract class` thì không được khai báo là `abstract`.
- Không thể khởi tạo một `abstract class`.
- Vì không thể khởi tạo được `abstract class` nên các phương thức được khai báo là abstract chỉ được khai báo ở mức độ `protected` và `public`.
- Các lớp kế thừa một `abstract class` phải định nghĩa lại tất cả các phương thức trong abstract class đó ( nếu không sẽ bị lỗi).

> Để khai báo một `abstract class` ta dùng cú pháp sau:

```php
abstract class ClassName
{

}
```

> Cú pháp khai báo một phương thức abstract:

```php
abstract visibility function methodName();

```

Trong đó: visibility là một trong 2 từ khóa `public`, `protected` hoặc có thể bỏ trống (bỏ trống thì mặc định là `public`), methodName là tên của phương thức chúng ta cần khai báo.

`Ví dụ 1: khai báo một phương thức abstract trong abstract class`

```php
abstract class ConNguoi
{
    //khai báo một abstract method đúng
    abstract public function getName();

    //Sai vì abstract class không thể viết code xử lý được
    abstract public function getHeight()
    {
        //
    }
}
```

Ví dụ 2: Phải định nghĩa lại các phương thức abstract của abstract class đó khi kế thừa.

```php
abstract class ConNguoi
{
    protected $name;
    abstract protected function getName();
}

//class này sai vì chưa định nghĩa lại phương thức abstracs getName
class NguoiLon extends ConNguoi
{
    //
}

//class này đúng vì đã định nghĩa lại đầy đủ các phương thức abstract
class TreTrau extends ConNguoi
{
    public function getName()
    {
        return $this->name;
    }
}

```

### So sánh giữa interface và abstract class

Những điểm giống nhau giữa interface và abstract class:

- Đều không thể khởi tạo đối tượng.
- Đều có thể chứa phương thức abstract.

Trong lập trình hướng đối tượng (OOP) với PHP, **interface** và **abstract class** là hai khái niệm quan trọng giúp bạn xây dựng các cấu trúc linh hoạt và dễ bảo trì cho ứng dụng của mình. Để giúp học sinh của bạn dễ hiểu hơn, chúng ta sẽ liên hệ các khái niệm này với những ví dụ thực tế.
