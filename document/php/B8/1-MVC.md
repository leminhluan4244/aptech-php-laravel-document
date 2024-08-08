## Giới thiệu mô hình MVC

### MVC là gì?

**Mô hình MVC** (Model-View-Controller) là một kiến trúc phần mềm phổ biến, được sử dụng rộng rãi trong phát triển ứng dụng web, đặc biệt là trong các framework như Laravel. Nó giúp tách biệt các thành phần của ứng dụng thành ba phần chính, giúp cho việc phát triển, bảo trì và mở rộng ứng dụng trở nên dễ dàng hơn.

3 thành phần chính của mô hình MVC:

1. Model
   Model đại diện cho dữ liệu và logic nghiệp vụ của ứng dụng. Nó chịu trách nhiệm quản lý dữ liệu, thực hiện các phép tính và quy tắc nghiệp vụ. Model cũng có thể tương tác với cơ sở dữ liệu để lưu trữ và truy xuất dữ liệu. Nhiệm vụ:

   - Truy xuất, cập nhật, xóa dữ liệu.
   - Thực hiện các quy tắc nghiệp vụ liên quan đến dữ liệu.

2. View
   View là thành phần giao diện người dùng của ứng dụng. Nó hiển thị dữ liệu từ Model cho người dùng và gửi các yêu cầu của người dùng đến Controller. View không chứa logic nghiệp vụ mà chỉ tập trung vào việc hiển thị. Nhiệm vụ:

   - Nhận dữ liệu từ Controller và hiển thị ra màn hình.
   - Không chứa bất kỳ logic nghiệp vụ nào.

3. Controller
   Controller là cầu nối giữa Model và View. Nó xử lý các yêu cầu từ người dùng, tương tác với Model để thực hiện các hành động cần thiết và lựa chọn View thích hợp để hiển thị kết quả cho người dùng. Nhiệm vụ:
   - Nhận dữ liệu từ View.
   - Gọi các phương thức trong Model để xử lý dữ liệu.
   - Chọn View phù hợp để hiển thị kết quả.

### Tại sao nên sử dụng MVC?

- **Tách biệt mối quan tâm**: Mỗi phần có nhiệm vụ rõ ràng, giúp code dễ đọc, dễ hiểu và dễ bảo trì hơn.
- **Tái sử dụng code**: Các View có thể được tái sử dụng cho nhiều Controller khác nhau.
- **Dễ dàng mở rộng**: Việc thêm các tính năng mới trở nên đơn giản hơn.
- **Cộng tác tốt hơn**: Các thành viên trong nhóm phát triển có thể làm việc độc lập trên các phần khác nhau của ứng dụng.
- **Kiểm thử dễ dàng**: Logic nghiệp vụ trong Model và logic điều khiển trong Controller có thể kiểm thử độc lập, giúp phát hiện và sửa lỗi nhanh chóng.

### Luồng làm việc trong mô hình MVC

1. Người dùng tương tác với View (ví dụ: gửi một biểu mẫu).
2. View gửi yêu cầu đến Controller.
3. Controller xử lý yêu cầu, tương tác với Model nếu cần thiết (ví dụ: truy xuất hoặc cập nhật dữ liệu).
4. Model thực hiện các tác vụ nghiệp vụ và trả dữ liệu về Controller.
5. Controller chọn View thích hợp để hiển thị dữ liệu cho người dùng.
6. View hiển thị dữ liệu và kết quả cho người dùng.

**Ví dụ minh họa**

`Model`

```php
// File: models/Book.php
class Book {
    public $title;
    public $author;
    public $price;

    public function __construct($title, $author, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    public static function getAllBooks() {
        // Giả lập dữ liệu sách từ cơ sở dữ liệu
        return [
            new Book("1984", "George Orwell", 10.99),
            new Book("To Kill a Mockingbird", "Harper Lee", 7.99),
            new Book("The Great Gatsby", "F. Scott Fitzgerald", 8.99)
        ];
    }
}
```

`View`

```php
<!-- File: views/bookList.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sách</title>
</head>
<body>
    <h1>Danh sách sách</h1>
    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <strong><?php echo $book->title; ?></strong> by <?php echo $book->author; ?>
                - $<?php echo $book->price; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>

```

`Controller`

```php
// File: controllers/BookController.php
class BookController {
    public function list() {
        // Lấy dữ liệu từ Model
        $books = Book::getAllBooks();
        // Bao gồm file View và truyền dữ liệu vào View
        include 'views/bookList.php';
    }
}
```

`Kết nối các thành phần với nhau`

```php
// File: index.php
require 'models/Book.php';
require 'controllers/BookController.php';

// Tạo một đối tượng Controller
$controller = new BookController();
// Gọi phương thức để hiển thị danh sách sách
$controller->list();
```

### MVC trong Laravel

Laravel là một framework PHP sử dụng mô hình MVC một cách rất hiệu quả. Nó cung cấp các công cụ và cấu trúc sẵn để bạn dễ dàng xây dựng các ứng dụng web theo kiến trúc MVC.

**Các khái niệm tương ứng trong Laravel:**

- **Model:** Các lớp nằm trong thư mục `app/Models`.
- **View:** Các file `.blade.php` nằm trong thư mục `resources/views`.
- **Controller:** Các lớp nằm trong thư mục `app/Http/Controllers`.
