### Giới thiệu các hàm xử lý chuỗi trong PHP

#### strtolower()
- `Chức năng:` Chuyển đổi tất cả các chữ cái trong một chuỗi thành chữ thường.
- `Cú pháp:` `strtolower(string $string)`
- `Ví dụ:`
```php
$str = "HELLO WORLD";
$lower = strtolower($str);
echo $lower; // Output: hello world
```

#### str_repeat()
- `Chức năng:` Lặp lại một chuỗi một số lần.
- `Cú pháp:` `str_repeat(string $string, int $repeat)`
- `Ví dụ:`
```php
$str = "-";
$repeated = str_repeat($str, 10);
echo $repeated; // Output: ----------
```

#### sprintf()
- `Chức năng:` Định dạng một chuỗi theo một mẫu nhất định.
- `Cú pháp:` `sprintf(string $format, mixed $arg1, mixed $arg2, ...)`
- `Ví dụ:`
```php
$name = "John Doe";
$age = 30;
$formatted = sprintf("Hello, %s. You are %d years old.", $name, $age);
echo $formatted; // Output: Hello, John Doe. You are 30 years old.
```

#### sscanf()
- `Chức năng:` Phân tích một chuỗi theo một mẫu nhất định và gán các giá trị vào các biến.
- `Cú pháp:` `sscanf(string $str, string $format, mixed &$var1, mixed &$var2, ...)`
- `Ví dụ:`
```php
$str = "Hello, John Doe! You are 30 years old.";
sscanf($str, "Hello, %s! You are %d years old.", $name, $age);
echo $name . " is " . $age . " years old."; // Output: John Doe is 30 years old.
```

#### strcasecmp()
- `Chức năng:` So sánh hai chuỗi không phân biệt chữ hoa/thường.
- `Cú pháp:` `strcasecmp(string $str1, string $str2)`
- `Trả về:`
    - 0 nếu hai chuỗi bằng nhau
    - Một số âm nếu $str1 nhỏ hơn $str2
    - Một số dương nếu $str1 lớn hơn $str2
- `Ví dụ:`
```php
$str1 = "hello";
$str2 = "HELLO";
if (strcasecmp($str1, $str2) === 0) {
    echo "Hai chuỗi bằng nhau";
}
```

#### strchr()
- `Chức năng:` Tìm kiếm một ký tự trong một chuỗi và trả về phần còn lại của chuỗi từ vị trí tìm thấy.
- `Cú pháp:` `strchr(string $haystack, string $needle)`
- `Ví dụ:`
```php
$str = "Hello world!";
$result = strchr($str, "o");
echo $result; // Output: o world!
```

#### strcmp()
- `Chức năng:` So sánh hai chuỗi phân biệt chữ hoa/thường.
- `Cú pháp:` `strcmp(string $str1, string $str2)`
- `Trả về:`
    - 0 nếu hai chuỗi bằng nhau
    - Một số âm nếu $str1 nhỏ hơn $str2
    - Một số dương nếu $str1 lớn hơn $str2
- `Ví dụ:`
```php
$str1 = "hello";
$str2 = "HELLO";
if (strcmp($str1, $str2) === 0) {
    echo "Hai chuỗi bằng nhau";
} else {
    echo "Hai chuỗi khác nhau";
}
```
Tuyệt vời! Tôi sẽ định dạng lại các hàm còn lại theo đúng yêu cầu của bạn:

#### strcoll()
- `Chức năng:` So sánh hai chuỗi dựa trên locale (ngôn ngữ và vùng).
- `Cú pháp:` `strcoll(string $str1, string $str2)`
- `Trả về:`
    - 0 nếu hai chuỗi bằng nhau theo quy tắc so sánh của locale
    - Một số âm nếu $str1 nhỏ hơn $str2 theo quy tắc so sánh của locale
    - Một số dương nếu $str1 lớn hơn $str2 theo quy tắc so sánh của locale
- `Ví dụ:`
```php
setlocale(LC_ALL, 'de_DE'); // Đặt locale thành tiếng Đức
$str1 = "Straße";
$str2 = "strasse";
if (strcoll($str1, $str2) === 0) {
    echo "Hai chuỗi bằng nhau theo quy tắc so sánh của tiếng Đức";
}
```

#### stripos()
- `Chức năng:` Tìm vị trí xuất hiện đầu tiên của một chuỗi con trong một chuỗi, không phân biệt chữ hoa/thường.
- `Cú pháp:` `stripos(string $haystack, string $needle, int $offset = 0)`
- `Trả về:`
    - Vị trí số của ký tự đầu tiên của $needle trong $haystack, hoặc FALSE nếu không tìm thấy.
- `Ví dụ:`
```php
$str = "Hello world!";
$position = stripos($str, "WORLD");
echo $position; // Output: 6
```

#### stristr()
- `Chức năng:` Tìm và trả về phần còn lại của chuỗi từ vị trí xuất hiện đầu tiên của một chuỗi con, không phân biệt chữ hoa/thường.
- `Cú pháp:` `stristr(string $haystack, string $needle, bool $before_needle = false)`
- `Trả về:` Phần còn lại của chuỗi, bắt đầu từ vị trí tìm thấy $needle.
- `Ví dụ:`
```php
$str = "Hello world!";
$result = stristr($str, "world");
echo $result; // Output: world!
```

#### strlen()
- `Chức năng:` Trả về độ dài của một chuỗi.
- `Cú pháp:` `strlen(string $string)`
- `Trả về:` Số lượng ký tự trong chuỗi.
- `Ví dụ:`
```php
$str = "Hello, world!";
echo strlen($str); // Output: 12
```

#### strpbrk()
- `Chức năng:` Tìm vị trí của ký tự đầu tiên trong một chuỗi mà cũng xuất hiện trong một tập hợp các ký tự khác.
- `Cú pháp:` `strpbrk(string $haystack, string $char_list)`
- `Trả về:` Phần còn lại của chuỗi, bắt đầu từ vị trí tìm thấy ký tự đầu tiên khớp.
- `Ví dụ:`
```php
$str = "Hello world!";
$result = strpbrk($str, "aeiou");
echo $result; // Output: ello world!
```

#### strpos()
- `Chức năng:` Tìm vị trí xuất hiện đầu tiên của một chuỗi con trong một chuỗi, phân biệt chữ hoa/thường.
- `Cú pháp:` `strpos(string $haystack, string $needle, int $offset = 0)`
- `Trả về:`
    - Vị trí số của ký tự đầu tiên của $needle trong $haystack, hoặc FALSE nếu không tìm thấy.
- `Ví dụ:`
```php
$str = "Hello world!";
$position = strpos($str, "world");
echo $position; // Output: 6
```

#### strrev()
- `Chức năng:` Đảo ngược một chuỗi.
- `Cú pháp:` `strrev(string $string)`
- `Trả về:` Chuỗi đã đảo ngược.
- `Ví dụ:`
```php
$str = "hello";
$reversed = strrev($str);
echo $reversed; // Output: olleh
```