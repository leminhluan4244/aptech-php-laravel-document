## Giới thiệu về Validation trong Laravel

**Validation** trong Laravel là một cơ chế mạnh mẽ để kiểm tra và đảm bảo tính hợp lệ của dữ liệu đầu vào từ người dùng. Điều này rất quan trọng để bảo vệ ứng dụng của bạn khỏi các dữ liệu không hợp lệ, bảo mật và duy trì tính toàn vẹn của dữ liệu trong cơ sở dữ liệu.

### Tại sao cần Validation?

* **Bảo mật:** Ngăn chặn các cuộc tấn công tiêm SQL, XSS và các loại tấn công khác bằng cách lọc và xác thực dữ liệu đầu vào.
* **Tính toàn vẹn dữ liệu:** Đảm bảo rằng chỉ có dữ liệu hợp lệ được lưu vào cơ sở dữ liệu.
* **Cải thiện trải nghiệm người dùng:** Cung cấp thông báo lỗi rõ ràng và hữu ích khi người dùng nhập liệu sai.

### Cách thực hiện Validation trong Laravel

Laravel cung cấp nhiều cách để thực hiện validation, nhưng cách phổ biến nhất là sử dụng phương thức `validate()` của đối tượng request.

```php
use Illuminate\Http\Request;

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
    ]);

    // Nếu dữ liệu hợp lệ, lưu vào cơ sở dữ liệu
    User::create($request->all());
}
```

Trong ví dụ trên:

* `request->validate()` được sử dụng để kiểm tra dữ liệu gửi lên từ form.
* Các quy tắc validation được định nghĩa trong một mảng:
    * `required`: Trường bắt buộc phải có giá trị.
    * `string`: Giá trị phải là một chuỗi.
    * `max:255`: Độ dài tối đa của chuỗi là 255 ký tự.
    * `email`: Kiểm tra xem giá trị có phải là một địa chỉ email hợp lệ hay không.
    * `unique:users`: Kiểm tra xem giá trị có duy nhất trong bảng `users` hay không.
* Nếu dữ liệu không hợp lệ, một ngoại lệ `Illuminate\Validation\ValidationException` sẽ được ném ra và Laravel sẽ tự động chuyển hướng trở lại trang trước đó với các thông báo lỗi.

### Các quy tắc validation phổ biến

* **required:** Trường bắt buộc phải có giá trị.
* **string:** Giá trị phải là một chuỗi.
* **integer:** Giá trị phải là một số nguyên.
* **email:** Giá trị phải là một địa chỉ email hợp lệ.
* **min:n:** Độ dài tối thiểu của chuỗi hoặc số.
* **max:n:** Độ dài tối đa của chuỗi hoặc số.
* **between:min,max:** Giá trị phải nằm trong khoảng từ min đến max.
* **in:value1,value2,...:** Giá trị phải nằm trong danh sách các giá trị cho trước.
* **unique:table,column:** Kiểm tra xem giá trị có duy nhất trong một cột của bảng đã cho hay không.
* **confirmed:** Kiểm tra xem hai trường có giá trị giống nhau hay không (thường dùng để xác nhận mật khẩu).

**Ngoài ra, Laravel còn hỗ trợ các quy tắc validation tùy chỉnh để đáp ứng các yêu cầu đặc biệt của ứng dụng.**

### Custom Validation

Bạn có thể tạo các quy tắc validation tùy chỉnh bằng cách sử dụng class `Validator` và phương thức `make()`:

```php
use Illuminate\Support\Facades\Validator;

$validator = Validator::make($request->all(), [
    'field' => 'custom_rule',
]);

if ($validator->fails()) {
    // Xử lý lỗi
}
```

### Custom Validation Rules

Để tạo một quy tắc validation tùy chỉnh, bạn cần tạo một class và thực hiện interface `Illuminate\Contracts\Validation\Rule`.

### Tùy chỉnh thông báo lỗi

Bạn có thể tùy chỉnh thông báo lỗi bằng cách sử dụng mảng `$messages` trong phương thức `validate()`:

```php
$messages = [
    'name.required' => 'Vui lòng nhập tên.',
    'email.email' => 'Địa chỉ email không hợp lệ.',
];

$request->validate([
    // ...
], $messages);
```
