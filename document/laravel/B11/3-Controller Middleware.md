## Controller Middleware

**Middleware** là một khái niệm quan trọng trong Laravel, nó là một lớp phần mềm nằm giữa yêu cầu (request) và phản hồi (response) của ứng dụng. Middleware cho phép bạn thực hiện một số logic trước khi xử lý yêu cầu hoặc sau khi tạo ra phản hồi. 

### Gán middleware cho route

Bạn có thể gán middleware cho các route trong file định nghĩa route của bạn:

```php
Route::get('/profile', [UserController::class, 'show'])->middleware('auth');
```

Trong ví dụ trên, middleware `auth` sẽ được áp dụng cho route `/profile`. Điều này có nghĩa là trước khi thực thi phương thức `show` của controller `UserController`, người dùng phải được xác thực bằng middleware auth trước.

### Gán middleware cho controller

Bạn cũng có thể gán middleware cho toàn bộ controller bằng cách sử dụng interface `HasMiddleware`. Controller của bạn cần implement interface này và định nghĩa một phương thức tĩnh `middleware` để trả về một mảng các middleware cần áp dụng:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controllers\HasMiddleware;

class UserController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return ['auth'];
    }
}
```

Trong ví dụ trên, middleware `auth` sẽ được áp dụng cho tất cả các phương thức của controller `UserController`.

### Định nghĩa middleware inline

Bạn cũng có thể định nghĩa middleware trực tiếp trong phương thức `middleware` của controller bằng cách sử dụng closure:

```php
use Closure;
use Illuminate\Http\Request;

public static function middleware(): array
{
    return [
        function (Request $request, Closure $next) {
            return $next($request);
        },
    ];
}
```