### Thao tác với tệp trong PHP: Một cái nhìn tổng quan

PHP cung cấp một bộ hàm phong phú để làm việc với các tệp, từ việc tạo, mở, đọc, ghi đến xóa. Việc thao tác với tệp là một kỹ năng không thể thiếu trong phát triển web bằng PHP, đặc biệt khi bạn cần lưu trữ dữ liệu, tạo file log, xử lý file upload, v.v.

#### Các hàm cơ bản để làm việc với tệp
- `Mở tệp:`
   - `fopen($filename, $mode)`: Mở một tệp.
     - `$filename`: Đường dẫn đến tệp.
     - `$mode`: Chế độ mở tệp (r: đọc, w: ghi đè, a: nối thêm, x: tạo mới, ...).
- `Đọc tệp:`
   - `fread($handle, $length)`: Đọc một số lượng byte nhất định từ tệp.
   - `fgets($handle)`: Đọc một dòng từ tệp.
   - `file_get_contents($filename)`: Đọc toàn bộ nội dung của tệp vào một chuỗi.
- `Ghi tệp:`
   - `fwrite($handle, $string)`: Ghi một chuỗi vào tệp.
   - `file_put_contents($filename, $data)`: Ghi dữ liệu vào tệp.
- `Đóng tệp:`
   - `fclose($handle)`: Đóng tệp đã mở.
- `Kiểm tra tệp:`
   - `file_exists($filename)`: Kiểm tra xem tệp có tồn tại hay không.
   - `is_readable($filename)`: Kiểm tra xem tệp có quyền đọc hay không.
   - `is_writable($filename)`: Kiểm tra xem tệp có quyền ghi hay không.

#### Ví dụ 1: Đọc và ghi nội dung tệp với `fopen`, `feof`, `fgets`, `fclose` và `file_put_contents`
Chuẩn bị sẵn tệp data.txt bên cạnh tệp php của ví dụ này
```txt
Dòng 1
Dòng 2
Dòng 3

Tên tôi là Luân
```

```php
// Mở tệp để đọc
$file = fopen("data.txt", "r");

// Đọc từng dòng
while(!feof($file)) {
  $line = fgets($file);
  echo $line . "<br>";
}

// Đóng tệp
fclose($file);

// Ghi nội dung mới vào tệp, đè lên nội dung cũ
$data = "Đây là nội dung mới được ghi vào tệp.";
file_put_contents("data.txt", $data);
```

#### Ví dụ 2: Đọc một số lượng byte nhất định từ tệp với `fread`
Chuẩn bị sẵn tệp data.txt bên cạnh tệp php của ví dụ này
```txt
Line 1
Line 2
Linee 3
```
```php
$handle = fopen("data.txt", "r");
if ($handle) {
    $contents = fread($handle, filesize("data.txt"));
    echo $contents;
    fclose($handle);
} else {
    echo "Không thể mở tệp";
}

echo "<hr>";

$handle = fopen("data.txt", "r");
if ($handle) {
    $contents = fread($handle, 8); // Kiểu xuống dòng là LF thì sẽ in `Line 1 L` còn CRLF thì chỉ in `Line 1`
    echo $contents;
    fclose($handle);
} else {
    echo "Không thể mở tệp";
}
```

#### Ví dụ 3: Đọc toàn bộ nội dung của tệp vào một chuỗi bằng `file_get_contents`
Chuẩn bị sẵn tệp data.txt bên cạnh tệp php của ví dụ này
```txt
Line 1
Line 2
Linee 3
```
```php
$contents = file_get_contents("data.txt");
echo $contents;
```

#### Ví dụ 4: Ghi một chuỗi vào tệp bằng `fwrite`
Chuẩn bị sẵn tệp data.txt bên cạnh tệp php của ví dụ này
```txt
Line 1
Line 2
Linee 3
```
```php
$handle = fopen("data.txt", "w");
if ($handle) {
    fwrite($handle, "Đây là nội dung mới");
    fclose($handle);
} else {
    echo "Không thể mở tệp để ghi";
}
```

#### Ví dụ 5: Kiểm tra xem tệp có tồn tại hay không bằng `file_exists`
```php
if (file_exists("data.txt")) {
    echo "Tệp data.txt tồn tại";
} else {
    echo "Tệp data.txt không tồn tại";
}

echo "<hr>";

if (file_exists("dataaa.txt")) {
    echo "Tệp dataaa.txt tồn tại";
} else {
    echo "Tệp dataaa.txt không tồn tại";
}
```

#### Ví dụ 6s: Kiểm tra xem tệp có quyền đọc hay không bằng `is_readable`
```php
if (is_readable("data.txt")) {
    echo "Tệp có thể đọc được";
} else {
    echo "Tệp không thể đọc được";
}
```

#### Ví dụ 7: Kiểm tra xem tệp có quyền ghi hay không bằng `is_writable`
```php
if (is_writable("data.txt")) {
    echo "Tệp có thể ghi được";
} else {
    echo "Tệp không thể ghi được";
}
```

### Các thao tác khác với tệp
- `Xóa tệp:` `unlink($filename)`
- `Đổi tên tệp:` `rename($oldname, $newname)`
- `Tạo thư mục:` `mkdir($dirname, $permissions)`
- `Xóa thư mục:` `rmdir($dirname)`
- `Sao chép tệp:` `copy($source, $destination)`

Ví dụ: Lưu ý cần chuẩn bị trước các tệp để thao tác
```php
unlink("temp.txt"); // Xóa tệp temp.txt
rename("old_file.txt", "new_file.txt"); // Đổi tên tệp
mkdir("data", 0755); // Tạo thư mục data với quyền 755
rmdir("temp"); // Xóa thư mục temp
copy("source.txt", "destination.txt"); // Sao chép tệp

// Kiểm tra loại tệp:
if (is_file("data.txt")) {
    echo "Là một tệp";
} elseif (is_dir("data")) {
    echo "Là một thư mục";
} else {
    echo "Không phải tệp hoặc thư mục";
}

echo "<hr>";

// Lấy kích thước tệp
$size = filesize("image.jpg");
echo "Kích thước tệp: " . $size . " bytes";
echo "<hr>";

// Lấy thời gian sửa đổi cuối cùng của tệp
$mtime = filemtime("log.txt");
echo "Tệp được sửa đổi lần cuối vào: " . date("Y-m-d H:i:s", $mtime);
echo "<hr>";

// Duyệt qua các tệp trong một thư mục:
$files = scandir("images");
foreach ($files as $file) {
    if ($file != "." && $file != "..") {
        echo $file . "<br>";
    }
}

```

### Lưu ý khi làm việc với tệp
- `Quyền truy cập:` Đảm bảo PHP có đủ quyền để đọc và ghi vào các thư mục và tệp.
- `Đường dẫn:` Sử dụng đường dẫn tuyệt đối hoặc tương đối chính xác.
- `Đóng tệp:` Luôn đóng tệp sau khi sử dụng để giải phóng tài nguyên.
- `Xử lý lỗi:` Sử dụng các hàm như `error_reporting()` để phát hiện và xử lý lỗi.
- `Bảo mật:` Khi làm việc với các tệp tải lên, cần kiểm tra kỹ loại tệp và kích thước để tránh các lỗ hổng bảo mật.

### Ứng dụng thực tế
- `Lưu trữ dữ liệu:` Lưu trữ thông tin người dùng, cấu hình hệ thống, dữ liệu tạm thời.
- `Xử lý file upload:` Xử lý các tệp được người dùng tải lên.
- `Tạo file log:` Ghi lại các hoạt động của hệ thống để giúp tìm kiếm và khắc phục lỗi.
- `Xây dựng các hệ thống quản lý nội dung:` Cho phép người dùng tải lên, chỉnh sửa và xóa các tệp.