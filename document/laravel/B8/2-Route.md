## Route trong Laravel

Trong Laravel, routing (định tuyến) là một tính năng quan trọng giúp bạn định nghĩa các URL và hành vi của chúng trong ứng dụng web. Routing trong Laravel rất linh hoạt và mạnh mẽ, cho phép bạn dễ dàng quản lý các đường dẫn và ánh xạ chúng tới các controller hoặc hành động cụ thể. Nói cách khác, khi người dùng nhập một URL vào trình duyệt, Laravel sẽ tìm kiếm route phù hợp và thực thi đoạn code tương ứng.

Tìm hiểu về Routing trong Laravel trên trang chủ: [Routing](https://laravel.com/docs/11.x/routing)

### Tại sao Route lại quan trọng?

- **Tổ chức ứng dụng:** Route giúp bạn phân chia ứng dụng thành các phần nhỏ, dễ quản lý hơn.
- **Định nghĩa logic:** Mỗi route sẽ liên kết với một đoạn logic cụ thể, giúp bạn dễ dàng hiểu và bảo trì code.
- **Tạo các URL đẹp:** Bạn có thể tạo ra các URL thân thiện với SEO và dễ nhớ cho người dùng.
- **Bảo mật:** Route cho phép bạn kiểm soát quyền truy cập vào các phần khác nhau của ứng dụng.

### Cấu trúc cơ bản của một Route

```php
Route::get('/home', function () {
    return 'Xin chào, bạn đang ở trang chủ!';
});
```

- **Route::get():** Định nghĩa một route nhận yêu cầu GET.
- **'/home':** URL mà route này sẽ xử lý.
- **function():** Một hàm vô danh chứa logic xử lý yêu cầu.

### Các loại Route thường dùng

- **Route GET:** Xử lý các yêu cầu GET (để lấy dữ liệu).
- **Route POST:** Xử lý các yêu cầu POST (để gửi dữ liệu).
- **Route PUT:** Xử lý các yêu cầu PUT (để cập nhật dữ liệu).
- **Route DELETE:** Xử lý các yêu cầu DELETE (để xóa dữ liệu).
- **Route ANY:** Xử lý tất cả các loại yêu cầu.

### Route parameters

Bạn có thể định nghĩa các tham số trong route để làm cho route trở nên linh hoạt hơn.

```php
Route::get('/users/{id}', function ($id) {
    // Lấy thông tin người dùng có ID là $id
});
```

Bạn cũng có thể xác định các tham số tùy chọn.

```php
Route::get('/user/{name?}', function ($name = 'Guest') {
    return "User Name: " . $name;
});
```

### Route với Controller

Thay vì định nghĩa logic trực tiếp trong route, bạn có thể ánh xạ route đến một phương thức của controller.

```php
// File: routes/web.php

use App\Http\Controllers\HomeController;

Route::get('/home', [HomeController::class, 'index']);
```

### Route groups

Bạn có thể nhóm các route lại để dễ quản lý và áp dụng các middleware chung.

```php
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/settings', function () {
        return 'Admin Settings';
    });
});
```

### Route name

Bạn có thể đặt tên cho route để dễ dàng tham chiếu trong các view hoặc khi định nghĩa redirect.

```php
Route::get('/home', function () {
    //TODO
})->name('home');
```

### Route model binding

Laravel hỗ trợ tự động tiêm model vào controller dựa trên route parameter.

```php
Route::get('/posts/{post}', function (App\Models\Post $post) {
    // $post là một instance của model Post
});
```

### Route với Middleware

Middleware là các lớp lọc mà các yêu cầu HTTP phải đi qua trước khi đến controller. Bạn có thể áp dụng middleware cho route.

```php
Route::get('/profile', function () {
    // Chỉ những người dùng đã xác thực mới có thể truy cập
    return 'User Profile';
})->middleware('auth');
```

### Ví dụ sử dụng route trong Laravel

**Giả sử chúng ta có một ứng dụng blog đơn giản.**

> Tạo một database tên là B8_01

```sql
CREATE DATABASE IF NOT EXISTS B8_01;

USE B8_01;

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO posts (title, content)
VALUES
    ('Bài viết đầu tiên', 'Nội dung bài viết đầu tiên'),
    ('Bài viết thứ hai', 'Nội dung bài viết thứ hai'),
    ('Bài viết thứ ba', 'Nội dung bài viết thứ ba'),
    ('Bài viết thứ tư', 'Nội dung bài viết thứ tư'),
    ('Bài viết thứ năm', 'Nội dung bài viết thứ năm'),
    ('Bài viết thứ sáu', 'Nội dung bài viết thứ sáu'),
    ('Bài viết thứ bảy', 'Nội dung bài viết thứ bảy'),
    ('Bài viết thứ tám', 'Nội dung bài viết thứ tám'),
    ('Bài viết thứ chín', 'Nội dung bài viết thứ chín'),
    ('Bài viết thứ mười', 'Nội dung bài viết thứ mười');
```

> Thay đổi file `.env` thành cấu hình sau để kết nối database

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=B8_01
DB_USERNAME=root
DB_PASSWORD=
```

> Chạy lệnh sau để laravel tạo thêm các bảng quản lý cache và session vào database của bạn: `php artisan migrate`

**1. Tạo model:**
Tạo một controller mới tên là `Post` trong thư mục `app/Model`.

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'published_at'];
}
```

**2. Tạo các route:**

Trong file `routes/web.php`, chúng ta sẽ định nghĩa hai route:

- **Route để hiển thị danh sách bài viết:**

  ```php
  Route::get('/', [PostController::class, 'index'])->name('posts.index');
  ```

- **Route để hiển thị chi tiết một bài viết:**
  ```php
  Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
  ```

Nội dung `routes/web.php` đầy đủ:

```php
<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
```

**3. Tạo controller:**

Tạo một controller mới tên là `PostController` trong thư mục `app/Http/Controllers`.

```php
<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
```

**4. Tạo view:**

Tạo hai view tương ứng với hai route ở trên trong thư mục `resources/views/posts`.

- **posts/index.blade.php:**
  ```php
  @foreach ($posts as $post)
  <div>
      <h2>{{ $post->title }}</h2>
      <p>{{ $post->content }}</p>
      <a href="{{ route('posts.show', $post) }}">Xem chi tiết</a>
  </div>
  <hr>
  @endforeach
  ```
- **posts/show.blade.php:**
  ```php
  <h1>{{ $post->title }}</h1>
  <p>{{ $post->content }}</p>
  ```

**Giải thích:**

- **Route:** Hai route được định nghĩa để xử lý yêu cầu hiển thị danh sách bài viết và chi tiết một bài viết.
- **Controller:**
  - Phương thức `index()` lấy tất cả các bài viết từ cơ sở dữ liệu và truyền dữ liệu đó cho view `posts.index`.
  - Phương thức `show()` nhận một đối tượng `Post` và truyền nó cho view `posts.show`.
- **View:**
  - `posts.index` hiển thị danh sách các bài viết, mỗi bài viết có một link dẫn đến trang chi tiết.
  - `posts.show` hiển thị chi tiết một bài viết.

**Cách hoạt động:**

- Khi người dùng truy cập vào trang chủ (URL: /), Laravel sẽ tìm thấy route `posts.index` và gọi phương thức `index()` trong `PostController`.
- Phương thức `index()` sẽ lấy danh sách các bài viết và truyền cho view `posts.index` để hiển thị.
- Khi người dùng click vào link "Xem chi tiết" của một bài viết, Laravel sẽ tìm thấy route `posts.show` và gọi phương thức `show()` trong `PostController`, truyền vào đối tượng `Post` tương ứng.
- Phương thức `show()` sẽ truyền đối tượng `Post` cho view `posts.show` để hiển thị chi tiết bài viết đó.
