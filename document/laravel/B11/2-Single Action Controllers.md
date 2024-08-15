### Controllers hành động đơn

Nếu một hành động của controller đặc biệt phức tạp, bạn có thể muốn dành toàn bộ một lớp controller cho hành động duy nhất đó. Để thực hiện điều này, bạn có thể định nghĩa một phương thức `__invoke` duy nhất bên trong controller:

```php
<?php

namespace App\Http\Controllers;

class ProvisionServer extends Controller
{
    /**
     * Cung cấp một máy chủ web mới.
     */
    public function __invoke()
    {
        // ...
    }
}
```

Khi đăng ký các route cho các controller hành động đơn, bạn không cần phải chỉ định một phương thức controller. Thay vào đó, bạn chỉ cần truyền tên của controller vào router:

```php
use App\Http\Controllers\ProvisionServer;

Route::post('/server', ProvisionServer::class);
```

Bạn có thể tạo một controller có thể gọi được bằng cách sử dụng tùy chọn `--invokable` của lệnh Artisan `make:controller`:

```shell
php artisan make:controller ProvisionServer --invokable
```

**Giải thích:**

- **Controller hành động đơn:** Là một controller chỉ chứa một phương thức duy nhất để xử lý một yêu cầu cụ thể.
- **Phương thức `__invoke`:** Một phương thức đặc biệt trong PHP, khi một đối tượng được gọi như một hàm, phương thức này sẽ tự động được gọi.
- **Stub:** Một template hoặc mẫu ban đầu để tạo ra các file mới.
