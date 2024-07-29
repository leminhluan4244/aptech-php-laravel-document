### Giới thiệu các hàm xử lý stream trong PHP

#### stream_bucket_append()
- **Chức năng:** Thêm dữ liệu vào cuối một bucket trong một stream.
- **Cú pháp:** `stream_bucket_append(resource $bucket, string $data)`
- **Trả về:** Không có giá trị trả về.
- **Ví dụ:** (Thông thường sử dụng trong các stream filter)

#### stream_bucket_make_writeable()
- **Chức năng:** Đánh dấu một bucket là có thể ghi.
- **Cú pháp:** `stream_bucket_make_writeable(resource $bucket)`
- **Trả về:** Không có giá trị trả về.
- **Ví dụ:** (Thông thường sử dụng trong các stream filter)

#### stream_socket_server()
- **Chức năng:** Tạo một socket server.
- **Cú pháp:** `stream_socket_server(string $address, int &$errno, string &$errstr, int $backlog = 128)`
- **Trả về:** Một resource đại diện cho socket server hoặc FALSE nếu thất bại.
- **Ví dụ:**
```php
$socket = stream_socket_server("tcp://127.0.0.1:8080", $errno, $errstr);
if (!$socket) {
    die("Could not listen on $address: errno=$errno, errstr=$errstr");
}
```

#### stream_supports_lock()
- **Chức năng:** Kiểm tra xem một stream có hỗ trợ khóa hay không.
- **Cú pháp:** `stream_supports_lock(resource $stream)`
- **Trả về:** TRUE nếu stream hỗ trợ khóa, FALSE nếu không.
- **Ví dụ:**
```php
if (stream_supports_lock($fp)) {
    // Sử dụng khóa trên stream
}
```

#### stream_wrapper_register()
- **Chức năng:** Đăng ký một wrapper stream mới.
- **Cú pháp:** `stream_wrapper_register(string $protocol, string $classname)`
- **Trả về:** TRUE nếu thành công, FALSE nếu thất bại.
- **Ví dụ:** (Phức tạp, thường sử dụng trong các thư viện chuyên dụng)

#### stream_socket_shutdown()
- **Chức năng:** Đóng một kết nối socket.
- **Cú pháp:** `stream_socket_shutdown(resource $stream, int $how)`
- **Trả về:** TRUE nếu thành công, FALSE nếu thất bại.
- **Ví dụ:**
```php
stream_socket_shutdown($socket, STREAM_SHUT_RDWR);
```

#### stream_wrapper_restore()
- **Chức năng:** Khôi phục wrapper stream mặc định.
- **Cú pháp:** `stream_wrapper_restore(string $protocol)`
- **Trả về:** Không có giá trị trả về.
- **Ví dụ:** (Phức tạp, thường sử dụng trong các thư viện chuyên dụng)

#### stream_wrapper_unregister()
- **Chức năng:** Hủy đăng ký một wrapper stream.
- **Cú pháp:** `stream_wrapper_unregister(string $protocol)`
- **Trả về:** TRUE nếu thành công, FALSE nếu thất bại.
- **Ví dụ:** (Phức tạp, thường sử dụng trong các thư viện chuyên dụng)

#### stream_copy_to_stream()
- **Chức năng:** Sao chép dữ liệu từ một stream sang một stream khác.
- **Cú pháp:** `stream_copy_to_stream(resource $source, resource $dest, int $maxlen = -1)`
- **Trả về:** Số byte được sao chép hoặc FALSE nếu thất bại.
- **Ví dụ:**
```php
stream_copy_to_stream($source_stream, $dest_stream);
```

#### stream_is_local()
- **Chức năng:** Kiểm tra xem một stream là local hay không.
- **Cú pháp:** `stream_is_local(resource $stream)`
- **Trả về:** TRUE nếu stream là local, FALSE nếu không.
- **Ví dụ:**
```php
if (stream_is_local($fp)) {
    // Xử lý stream local
}
```

**Lưu ý:** Các hàm liên quan đến stream thường phức tạp và thường được sử dụng trong các thư viện hoặc ứng dụng chuyên biệt. Việc sử dụng trực tiếp các hàm này không phổ biến trong các ứng dụng thông thường.