### Xử lý ngoại lệ (Exception Handling) trong PHP

Trong lập trình, ngoại lệ (exception) là những sự kiện bất thường xảy ra trong quá trình thực thi chương trình, ví dụ như:

- `Lỗi chia cho 0:` Khi bạn cố gắng chia một số cho 0.
- `Tệp không tồn tại:` Khi bạn cố gắng mở một tệp không tồn tại.
- `Lỗi cú pháp:` Khi có lỗi trong cú pháp code.

`Xử lý ngoại lệ` là một cơ chế giúp chương trình của bạn có thể xử lý những sự kiện bất thường này một cách graceful, tránh việc chương trình bị dừng đột ngột và gây ra lỗi nghiêm trọng.

### Cơ chế try-catch-finally trong PHP
PHP cung cấp cơ chế `try-catch-finally` để xử lý ngoại lệ:

- `try:` Khối lệnh này chứa các code có thể gây ra ngoại lệ.
- `catch:` Khối lệnh này sẽ được thực thi nếu có ngoại lệ xảy ra trong khối try. Bạn có thể sử dụng đối tượng exception để lấy thông tin về ngoại lệ.
- `finally:` Khối lệnh này sẽ luôn được thực thi, dù có ngoại lệ xảy ra hay không. Thường được dùng để giải phóng tài nguyên (ví dụ: đóng kết nối database).

`Ví dụ:`

```php
try {
    $file = fopen("file.txt", "r");
    if (!$file) {
        throw new Exception("Không thể mở tệp"); // Sau khi throw mọi dòng code sau đó sẽ bị bở qua và tới thẳng catch.
    }
    // ... code đọc tệp
    fclose($file);
} catch (Exception $e) {
    echo "Đã xảy ra lỗi: " . $e->getMessage();
    echo "<br>";
} finally {
    echo "Khối finally luôn được thực thi";
}
```

### Các hàm xử lý ngoại lệ
Khi một ngoại lệ xảy ra, một đối tượng `Exception` được tạo và bạn có thể truy xuất các thông tin về ngoại lệ thông qua các phương thức của đối tượng này:

- `getMessage():` Trả về thông điệp mô tả ngoại lệ.
- `getCode():` Trả về mã lỗi của ngoại lệ.
- `getFile():` Trả về tên tệp nơi ngoại lệ xảy ra.
- `getLine():` Trả về số dòng nơi ngoại lệ xảy ra.
- `getTrace():` Trả về một mảng chứa thông tin về các hàm được gọi trước khi ngoại lệ xảy ra (stack trace).
- `getPrevious():` Trả về ngoại lệ gốc nếu ngoại lệ hiện tại được ném ra từ một ngoại lệ khác.

`Ví dụ:`

```php
try {
  $file = fopen("file.txt", "r");
  if (!$file) {
      throw new Exception("Không thể mở tệp"); // Sau khi throw mọi dòng code sau đó sẽ bị bở qua và tới thẳng catch.
  }
} catch (Exception $e) {
  echo "Lỗi xảy ra tại: <b>" . $e->getFile() . "</b> ở dòng <b>" . $e->getLine() . "</b><br>";
  echo "Thông báo lỗi: <b>" . $e->getMessage(). "</b>";
}
```

### Tại sao nên sử dụng exception handling?
- `Tăng độ tin cậy của ứng dụng:` Giúp chương trình không bị dừng đột ngột khi xảy ra lỗi.
- `Dễ dàng debug:` Thông tin về ngoại lệ giúp bạn dễ dàng tìm và sửa lỗi.
- `Cải thiện khả năng đọc code:` Code trở nên rõ ràng hơn khi bạn tách biệt phần xử lý lỗi ra khỏi luồng chính của chương trình.
- `Quản lý lỗi tốt hơn:` Bạn có thể tùy chỉnh cách xử lý các loại lỗi khác nhau.
