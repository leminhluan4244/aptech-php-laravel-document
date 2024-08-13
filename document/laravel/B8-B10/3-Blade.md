## Blade trong Laravel

Laravel Blade là một template engine đơn giản nhưng mạnh mẽ, được tích hợp sẵn trong Laravel. Nó cung cấp một cú pháp trực quan và dễ sử dụng để tạo các view (giao diện người dùng) trong ứng dụng Laravel. Blade không hạn chế bạn sử dụng PHP thuần trong view, nhưng nó cung cấp một số cú pháp đặc biệt để làm cho việc tạo view trở nên hiệu quả hơn.

Tìm hiểu về Routing trong Laravel trên trang chủ: [View](https://laravel.com/docs/11.x/views) và [Blade Templates](https://laravel.com/docs/11.x/blade)

### Tại sao Blade lại quan trọng?

- **Cú pháp trực quan:** Dễ đọc và viết.
- **Hiệu suất cao:** Blade được biên dịch thành PHP thuần nên rất nhanh.
- **An toàn:** Blade tự động thoát các biến để ngăn chặn các cuộc tấn công XSS.
- **Mở rộng:** Bạn có thể tùy chỉnh Blade bằng các directive và component.

### Cách gửi dữ liệu từ `Controller` tới `view` đang sử dụng `blade template`

Trong Laravel, việc truyền dữ liệu từ Controller đến View là một quá trình khá đơn giản và thường xuyên được thực hiện. Dưới đây là các cách phổ biến nhất để làm điều đó:

#### 1. Sử dụng hàm `with()`

- **Cách thức:** Khi trả về một view từ một phương thức trong Controller, bạn sử dụng hàm `with()` để truyền các dữ liệu cần thiết.
- **Ví dụ:**
  ```php
  public function index()
  {
      $posts = Post::all();
      return view('posts.index')->with('posts', $posts);
      // Hoặc bạn có thể dùng mảng nếu muốn truyền nhiều biến
      return view('posts.index')->with(['posts' => $posts]);
  }
  ```
  Trong ví dụ trên, mảng `$posts` sẽ được truyền đến view `posts.index` và có thể truy cập trong view bằng biến `$posts`.

#### 2. Sử dụng `compact()`

- **Cách thức:** Hàm `compact()` tạo một mảng với các key là tên biến và value là giá trị của biến đó.
- **Ví dụ:**
  ```php
  public function index()
  {
      $posts = Post::all();
      return view('posts.index', compact('posts'));
  }
  ```

#### 3. Truyền dữ liệu trực tiếp vào view

- **Cách thức:** Bạn có thể truyền dữ liệu trực tiếp vào view bằng cách sử dụng mảng làm đối số thứ 2 cho hàm `view`.
- **Ví dụ:**
  ```php
  public function index()
  {
      $posts = Post::all();
      return view('posts.index', ['posts' => $posts]);
  }
  ```

### Cú pháp cơ bản

**1. Hiển thị dữ liệu:**

- **Dấu ngoặc nhọn kép:** Sử dụng để hiển thị giá trị của một biến:
  ```php
  <p>Tên của bạn là: {{ $name }}</p>
  ```
- **@echo:** Cũng dùng để hiển thị dữ liệu:
  ```php
  @echo $name;
  ```
- Nếu bạn muốn hiển thị nội dung không escape, bạn có thể sử dụng cú pháp `{!! !!}`:
  ```php
  {!! $rawHtml !!}
  ```

**2. Câu điều kiện:**

- **@if, @else, @elseif:** Sử dụng để kiểm tra điều kiện:
  ```php
  @if (count($users) > 0)
      <ul>
          @foreach ($users as $user)
              <li>{{ $user->name }}</li>
          @endforeach
      </ul>
  @else
      <p>Không có người dùng nào.</p>
  @endif
  ```

**3. Vòng lặp:**

- **@for:** Lặp một số lần xác định:
  ```php
  @for ($i = 0; $i < 10; $i++)
      <p>Lặp lần thứ {{ $i }}</p>
  @endfor
  ```
- **@foreach:** Lặp qua một mảng hoặc đối tượng:
  ```php
  @foreach ($posts as $post)
      <div>
          <h2>{{ $post->title }}</h2>
          <p>{{ $post->content }}</p>
      </div>
  @endforeach
  ```
- **@forelse:** Sử dụng `@forelse` để lặp qua một tập hợp và hiển thị một thông báo nếu tập hợp rỗng:

  ```php
  @forelse ($users as $user)
      <p>Người dùng: {{ $user->name }}</p>
  @empty
      <p>Không có người dùng nào.</p>
  @endforelse
  ```

- **@while:** Vòng lặp While
  ```php
  @while (true)
      <p>Vòng lặp vô hạn.</p>
  @endwhile
  ```

**4. Chỉ thị:**

- **@include:** Nhúng một view khác vào view hiện tại:

  ```php
  @include('header')

  <p>Nội dung chính của trang.</p>

  @include('footer')
  ```

- **@yield:** Định nghĩa một section để các view con có thể thay thế:
  ```php
  <!-- File: resources/views/layouts/app.blade.php -->
  <!DOCTYPE html>
  <html>
  <head>
    <title>Laravel App - @yield('title')</title>
  </head>
  <body>
    <div class="container">
        @yield('content')
    </div>
  </body>
  </html>
  ```
- **@section, @endsection:** Định nghĩa một section để các view cha có thể thay thế hoặc mở rộng:

  ```php
  <!-- File: resources/views/home.blade.php -->
  @extends('layouts.app')

  @section('title', 'Trang Chủ')

  @section('content')
      <h1>Chào mừng đến với trang chủ</h1>
  @endsection
  ```

- **@csrf:** Bảo vệ chống tấn công CSRF.

  ```php
  <form method="POST" action="/profile">
      @csrf
      <!-- Form fields -->
  </form>
  ```

- **@auth và @guest:** Kiểm tra nếu người dùng đã xác thực hoặc là khách.

  ```php
  @auth
      <p>Chào, {{ auth()->user()->name }}!</p>
  @endauth

  @guest
      <p>Vui lòng đăng nhập.</p>
  @endguest
  ```

- **Comment (Bình luận)**: Bạn có thể thêm bình luận vào template Blade mà không xuất hiện trong HTML đầu ra:
  ```php
  {{-- Đây là bình luận của Blade --}}
  ```
