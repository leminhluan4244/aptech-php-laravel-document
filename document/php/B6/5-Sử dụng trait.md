## Trait trong PHP

### Định nghĩa

- Tương tự như các lớp, `trait` cũng có các thuộc tính, phương thức, phương thức trừu tượng. Chúng ta có thể dùng các từ khóa `public`, `protected`, `private` để chỉ định phạm vi truy cập của các thuộc tính, phương thức.

- Cách thức khai báo một `trait` cũng giống như cách khai báo một lớp, nhưng thay vì sử dụng từ khóa class thì ta đổi lại thành từ khóa `trait`.
- Để sử dụng một Trait trong lớp thì ta dùng từ khóa `use` với cú pháp như sau: `use TraitName;`

### Liên hệ thực tế

- Đối với lập trình hướng đối tượng trong PHP, một lớp chỉ được phép kế thừa từ một lớp duy nhất, bạn không thể cho một lớp kế thừa nhiều lớp được.

- Tuy nhiên, trong trường hợp các bạn muốn kế thừa các thuộc tính & phương thức từ nhiều lớp khác nhau để sử dụng thì chúng ta có một giải pháp, đó là sử dụng Trait.

### Ví Dụ thực tế

```php
trait Info
{
    public $name;
    public $year;
    function __construct($input_name, $input_year)
    {
        $this->name = $input_name;
        $this->year = $input_year;
    }
}

class User
{
    use Info;
    function intro()
    {
        echo "Tôi tên {$this->name}, sinh năm {$this->year} !";
    }
}
$me = new User("Tèo", 2000);
$me->intro();
```

- Để sử dụng nhiều Trait trong một lớp thì ta ngăn cách giữa mỗi hai tên Trait bởi một dấu phẩy.

```php
trait Info
{
    public $name;
    public $year;
    function __construct($input_name, $input_year)
    {
        $this->name = $input_name;
        $this->year = $input_year;
    }
}

trait Contact
{
    public $phone;
    public $email;
    function set_contact($input_phone, $input_email)
    {
        $this->phone = $input_phone;
        $this->email = $input_email;
    }
}

class User
{
    use Info, Contact;
    function intro()
    {
        echo "Tôi tên {$this->name}, sinh năm {$this->year}<br>";
        echo "Thông tin liên hệ:<br>";
        echo "- Phone: {$this->phone}<br>";
        echo "- Email: {$this->email}";
    }
}
$me = new User("Tèo", 2000);
$me->set_contact("0123456789", "123@gmail.com");
$me->intro();
```
