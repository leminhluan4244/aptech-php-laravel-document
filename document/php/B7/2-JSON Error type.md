**Bảng tổng hợp các loại lỗi JSON trong PHP**

| Constant | Loại lỗi | Ý nghĩa |
|---|---|---|
| JSON_ERROR_NONE | Không có lỗi | Quá trình mã hóa hoặc giải mã JSON thành công. |
| JSON_ERROR_DEPTH | Vượt quá độ sâu tối đa của cấu trúc dữ liệu | Cấu trúc dữ liệu JSON quá phức tạp hoặc lồng nhau quá nhiều cấp. | 
| JSON_ERROR_STATE_MISMATCH | Lỗi trạng thái không khớp | Lỗi xảy ra trong quá trình mã hóa hoặc giải mã, thường liên quan đến lỗi cú pháp. |
| JSON_ERROR_CTRL_CHAR | Ký tự điều khiển không hợp lệ | Gặp ký tự điều khiển không được phép trong chuỗi JSON. |
| JSON_ERROR_SYNTAX | Lỗi cú pháp | Cú pháp JSON không đúng, thiếu dấu ngoặc, dấu phẩy hoặc các ký tự đặc biệt khác. |
| JSON_ERROR_UTF8 | Lỗi mã hóa UTF-8 | Dữ liệu không phải là mã hóa UTF-8 hợp lệ. |
| JSON_ERROR_RECURSION | Đệ quy quá sâu | Cấu trúc dữ liệu có tham chiếu vòng tròn hoặc đệ quy quá nhiều lần. |
| JSON_ERROR_INF_OR_NAN | Giá trị vô cực hoặc NaN | Gặp giá trị vô cực (Infinity) hoặc không phải là số (NaN) trong dữ liệu. |
| JSON_ERROR_UNEXPECTED_UNION | Kiểu dữ liệu không hợp lệ | Gặp kiểu dữ liệu không được phép trong JSON (ví dụ: resource). |
| JSON_ERROR_INVALID_PROPERTY_NAME | Tên thuộc tính không hợp lệ | Tên thuộc tính không phải là chuỗi hợp lệ. |
| JSON_ERROR_INVALID_VALUE | Giá trị không hợp lệ | Giá trị của một thuộc tính không hợp lệ. |

**Ví dụ sử dụng:**

#### `JSON_ERROR_NONE`
```php
$data = ['name' => 'John', 'age' => 30];
$json = json_encode($data);
if (json_last_error() === JSON_ERROR_NONE) {
    echo $json; // {"name":"John","age":30}
} else {
    echo 'Lỗi khi mã hóa JSON: ' . json_last_error_msg();
}
```

Theo dõi thêm các ví dụ về lỗi json ở đây: [JSON Eror](https://www.php.net/manual/en/function.json-last-error.php)