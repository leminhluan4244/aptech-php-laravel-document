### Giới thiệu về Dynamic Function Calls trong PHP

`Dynamic Function Calls` (Gọi hàm động) là một tính năng mạnh mẽ trong PHP cho phép bạn gọi tên một hàm dưới dạng một biến tại thời điểm thực thi. Điều này mang lại sự linh hoạt cao trong việc xây dựng các ứng dụng PHP, đặc biệt là khi bạn muốn thực hiện các hành động khác nhau dựa trên các điều kiện khác nhau mà không cần viết quá nhiều câu lệnh điều kiện if-else lồng nhau.

#### Cách thức hoạt động
1. `Tạo biến chứa tên hàm:` Bạn gán tên của hàm cần gọi vào một biến.
2. `Gọi hàm:` Sử dụng cấu trúc `call_user_func()` hoặc `call_user_func_array()` hoặc thêm phần cặp ngoặc `()` với các đối số bên trong như một hàm bình thường để gọi hàm dựa trên giá trị của biến đó.

#### Ưu điểm của Dynamic Function Calls
* `Linh hoạt:` Cho phép bạn xây dựng các ứng dụng có cấu trúc động hơn.
* `Tái sử dụng mã:` Tránh lặp lại mã bằng cách sử dụng một hàm để gọi các hàm khác.
* `Dễ đọc:` Mã trở nên rõ ràng hơn khi bạn tách logic ra các hàm khác nhau.

#### Các hàm hỗ trợ
* `call_user_func($callback, $parameter1, $parameter2, ...):` Gọi một hàm callback với các tham số truyền vào.
* `call_user_func_array($callback, $parameter_arr):` Gọi một hàm callback với một mảng chứa các tham số.


Ví dụ đơn giản:

```php
function hello() {
  echo "Hello, world!";
}

function goodbye() {
  echo "Goodbye!";
}

function youPhone(string $phone) {
  echo "You phone?: $phone";
}

function youJob(string $job1, string $job2, string $job3) {
  echo "You job?: $job1, $job2, $job3";
}

$functionName1 = "hello"; // Hoặc $functionName = "goodbye";
call_user_func($functionName1);
echo "<hr>";

$functionName2 = "goodbye"; // Hoặc $functionName = "goodbye";
$functionName2();
echo "<hr>";

$functionName3 = "youPhone"; // Hoặc $functionName = "goodbye";
call_user_func($functionName3, "Luân");
echo "<hr>";

$functionName4 = "youJob"; // Hoặc $functionName = "goodbye";
call_user_func_array($functionName4, array("Webdev", "Mobiledev", "Teacher"));
echo "<hr>";
```

Ví dụ nâng cao: Xử lý các sự kiện khác nhaus
```php
function handleEvent($event) {
  $handler = "handle_$event";
  if (function_exists($handler)) {
      call_user_func($handler);
  } else {
      echo "Event not handled: $event";
  }
}

function handle_click() {
  echo "Button clicked!";
}

function handle_submit() {
  echo "Form submitted!";
}

$event = "click"; // Hoặc "submit"
handleEvent($event);
echo "<hr>";

$event = "submit"; // Hoặc "submit"
handleEvent($event);
echo "<hr>";

$event = "change"; // Hoặc "submit"
handleEvent($event);
echo "<hr>";
```

Trong ví dụ này, hàm `handleEvent()` nhận một sự kiện và gọi hàm xử lý tương ứng. Nếu hàm xử lý không tồn tại, một thông báo sẽ được hiển thị.
