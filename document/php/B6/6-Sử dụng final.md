## Final trong PHP

### Định nghĩa

Final dịch ra tiếng việt có nghĩa là `sau cùng` và trong lập trình hướng đối tượng thì `final` được ứng dụng vào class và phương thức.

- **Final class**: Khi một class được khai báo là final thì không lớp nào có thể kế thừa nó và nó chỉ có thể khởi tạo được thôi.

Cú pháp: Khai báo final class.

```php
final class ClassName
{
    //
}
```

VD: final class không thể kế thừa.

```php
final class ConNguoi
{
    //
}

//Sai vì không thể kế thừa final class
class NguoiLon extends ConNguoi
{

}
//Fatal error: Class NguoiLon may not inherit from final class (ConNguoi)
```

- **Final phương thức**: Khi chúng ta khai báo một phương thức là final thì không có một phương thức nào có thể override (ghi đè lại được).

Cú pháp: khai báo một phương thức final.

```php
class ClassName
{
    final public function methodName()
    {
        echo "Tôi là phương thức final, không ai có thể ghi đè tôi";
    }
}
```

VD: không thể override lại phương thức final.

```php
class ConNguoi
{
    private $soChan = 2;

    final public function getSoChan()
    {
        return $this->soChan;
    }
}

//Sai vì không thể override lại final phương thức
class NguoiLon extends ConNguoi
{
    public function getSoChan()
    {
        return 4;
    }
}
//Fatal error: Cannot override final method ConNguoi::getSoChan()
```

- **Final thuộc tính**: Không có final thuộc tính, vì một thuộc tính đưọc tạo ra nhằm mục đích được cập nhật giá trị liên tục khi sử dụng. Nếu ta dùng final thì việc sử dụng một thuộc tính không thay đổi được không còn ý nghĩa nửa. Thay vào đó người ta sẽ sử dụng const chứ không ai sử dụng final.
