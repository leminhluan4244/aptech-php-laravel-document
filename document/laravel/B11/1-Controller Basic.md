## Giới thiệu về Controllers trong Laravel

**Controllers** là một cách để tổ chức logic xử lý request của bạn trong các lớp riêng lẻ. Chúng có thể nhóm các logic xử lý request có liên quan với nhau thành một lớp duy nhất. Ví dụ, lớp `UserController` có thể xử lý tất cả các request đến liên quan đến người dùng, bao gồm hiển thị, tạo, cập nhật và xóa người dùng. Theo mặc định, các controller được lưu trữ trong thư mục `app/Http/Controllers`.
Tuyệt vời, chúng ta tiếp tục dịch phần **Basic Controllers** nhé.

### Controllers cơ bản

Để tạo nhanh một controller mới, bạn có thể chạy lệnh Artisan `make:controller`. Theo mặc định, tất cả các controller của ứng dụng sẽ được lưu vào thư mục `app/Http/Controllers`:

```shell
php artisan make:controller UserController
```

Hãy xem ví dụ về một controller cơ bản. Để đáp ứng với từng request thì controller sẽ tạo các phương thức `public` ứng với mỗi request thì sẽ tạo một phương thức tương ứng:

```php
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Hiển thị hồ sơ của một người dùng cụ thể.
     */
    public function show(string $id): View
    {
        return view('user.profile', [
            'user' => User::findOrFail($id)
        ]);
    }
}
```

Sau khi bạn đã viết một lớp và phương thức controller, bạn có thể định nghĩa một route đến phương thức controller như sau:

```php
use App\Http\Controllers\UserController;

Route::get('/user/{id}', [UserController::class, 'show']);
```

Khi một request đến khớp với URI route được chỉ định, phương thức `show` trong lớp `App\Http\Controllers\UserController` sẽ được gọi và các tham số route sẽ được truyền vào phương thức.

> **Lưu ý:** Controllers **không bắt buộc** phải kế thừa một lớp cơ sở `App\Http\Controllers\Controller.php`. Tuy nhiên, đôi khi việc kế thừa một lớp controller cơ sở chứa các phương thức nên được chia sẻ trên tất cả các controller của bạn là tiện lợi.

**Giải thích các thuật ngữ:**

- **Artisan:** Một công cụ dòng lệnh được cung cấp bởi Laravel để thực hiện các tác vụ như tạo controller, model, migration, v.v.
- **Route:** Một quy tắc ánh xạ một URL cụ thể đến một controller và action cụ thể.
- **Controller:** Một lớp PHP chứa các logic xử lý request của người dùng.
- **Action:** Một phương thức trong controller, thực hiện một hành động cụ thể để đáp ứng request.
- **View:** Một template HTML được sử dụng để hiển thị dữ liệu.
