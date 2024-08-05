## Phương thức tĩnh

### Phương thức tĩnh (static method) là gì ?

- Đối với lập trình hướng đối tượng trong PHP, "phương thức tĩnh" là loại phương thức có thể được gọi trực tiếp mà không cần phải tạo một đối tượng từ lớp chứa phương thức đó.
- Trong một lớp, phương thức tĩnh được khai báo bởi từ khóa `static`.
- Khi muốn truy cập một phương thức tĩnh chúng ta sử dụng tên lớp, theo sau là cặp dấu hai chấm `::` và tên phương thức tĩnh.

```php
class ClassDefault
{
    public function hello()
    {
        echo "Xin chào tôi là phương thức bình thường <br>";
    }
}


class ClassStatic
{
    public static function hello()
    {
        echo "Xin chào tôi là phương thức tĩnh <br>";
    }
}

// Cách gọi thông thường và gọi thông qua phương thức tĩnh
// Gọi thông thường
$classDefault = new ClassDefault();
$classDefault->hello();
// Gọi phương thức tĩnh
ClassStatic::hello();
```

- Trong một lớp có thể có cả phương thức tĩnh & phương thức không tĩnh (tức là các phương thức thông thường), một phương thức tĩnh có thể được truy cập từ một phương thức khác trong cùng lớp bằng cách sử dụng từ khóa `self` và dấu hai chấm `::`

```php
class Greeting
{
    public static function welcome()
    {
        echo "Xin chào, đây là một phương thức tĩnh <br>";
    }
    public function __construct()
    {
        self::welcome();
    }
}
$a = new Greeting();
```

- Các phương thức tĩnh cũng có thể được truy cập từ các phương thức trong các lớp khác, để thực hiện được điều đó thì các phương thức tĩnh phải có phạm vi truy cập là `public`.

```php
class Greeting
{
    public static function welcome()
    {
        echo "Xin chào, đây là một phương thức tĩnh <br>";
    }
}

class SayWelcome
{
    public function __construct()
    {
        Greeting::welcome();
    }
}
$a = new SayWelcome();
```

- Để truy cập một phương thức tĩnh từ lớp con, các bạn hãy sử dụng tử khóa `parent` bên trong lớp con. Nhưng các bạn cần phải lưu ý ở trường hợp này, phương thức tĩnh phải có phạm vi truy cập là `public` hoặc `protected`.

```php
class Greeting
{
    public static function welcome()
    {
        echo "Xin chào, đây là một phương thức tĩnh <br>";
    }
}

class SayWelcome extends Greeting
{
    public function __construct()
    {
        parent::welcome();
        // hoặc là
        Greeting::welcome();
    }
}
$a = new SayWelcome();
```

## Thuộc tính tĩnh

### Thuộc tính tĩnh (static property) là gì ?

- Đối với lập trình hướng đối tượng trong PHP, "thuộc tính tĩnh" là loại thuộc tính có thể được gọi trực tiếp mà không cần phải tạo một đối tượng từ lớp chứa thuộc tính đó.

- Trong một lớp, thuộc tính tĩnh được khai báo bởi từ khóa static.
- Khi muốn truy cập một thuộc tính tĩnh thì chúng ta sử dụng tên lớp, theo sau là cặp dấu hai chấm `::` và tên thuộc tính tĩnh.

```php
class Pi
{
    public static $value = 3.14159;
}

echo Pi::$value;
```

- Một thuộc tính tĩnh có thể được truy cập từ một phương thức trong cùng lớp bằng cách sử dụng từ khóa `self` và dấu hai chấm `::`

```php
class Pi
{
    public static $value = 3.14159;
    public function staticValue()
    {
        return self::$value;
    }
}
$pi = new Pi();
echo $pi->staticValue();
```

- Để truy cập một thuộc tính tĩnh từ lớp con, các bạn hãy sử dụng tử khóa `parent` bên trong lớp con.

```php
class Pi
{
    public static $value = 3.14159;
}

class Circle extends Pi
{
    public function circleStatic()
    {
        return parent::$value;
    }
}

// Truy cập thông qua kế thừa
echo Circle::$value;
echo "<br>";

// Truy cập từ phương thức
$circle = new Circle();
echo $circle->circleStatic();
```

- Thuộc tính static được lưu ở class, không phải ở object. Vì lý do này nên khi truy cập static các object sẽ truy cập thông qua class, do đó thuộc tính static thay đổi thì ở tất cả các object của class khi truy cập thuộc tính static đều hiển thị giá trị mới sau khi thay đổi.

```php
class Pi
{
    public static $value = 3.14159;

    public function setPi($pi)
    {
        self::$value = $pi;
    }
}

// Trước khi thay đổi
echo Pi::$value;
echo "<br>";

// Sau khi thay đổi
$pi = new Pi();
$pi->setPi(3.1416);
echo $pi::$value;
echo "<br>";

echo Pi::$value;
echo "<br>";

$circle = new Pi();
echo $circle::$value;
echo "<br>";
```

- Lưu ý việc truy cập static không dùng dấu `::` hoặc từ khoá `self` sẽ tạo ra các thuộc tính thông thường mới thay vì tác động đến thuộc tính static đang có.

```php
class Pi
{
    public static $value = 3.14159;

    public function setPi($pi)
    {
        self::$value = $pi;
    }
}

// Trước khi thay đổi
echo Pi::$value;
echo "<br>";

// Sau khi thay đổi
$pi = new Pi();
$pi->value = 3.1416;

// Truy cập static
echo $pi::$value;
echo "<br>";
echo Pi::$value;
echo "<br>";

// Truy cập thuộc tính thông thường
echo $pi->value;
echo "<br>";
```
