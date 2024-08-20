Quay lại hàm `store` trong `StudentController` trong source ví dụ của tài liệu buổi B8-B10. Chúng ta sẽ giả thích cách hoạt động của `withErrors`, `withInput` và cách thành phần liên quan:

**Controller: `app\Http\Controllers\StudentController.php`**:

```php
public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'student_name' => 'required|string|max:100',
        'birth_date' => 'required|date',
        'gender' => 'required|in:Nam,Nữ',
        'class_id' => 'required|exists:classes,class_id',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $student = Student::create($request->all());

    return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm thành công');
}
```

**View: `resources\views\students\create.blade.php`**

```php
<!DOCTYPE html>
<html>

<head>
    <title>Thêm mới sinh viên</title>
    <style>
        .error,
        .required {
            color: red;
        }
    </style>
</head>

<body>
    <h2>Thêm mới sinh viên</h2>
    <form method="post" action="{{ route('students.store') }}">
        @csrf
        <table>
            <tr>
                <td>Tên sinh viên <span class="required">*</span>:</td>
                <td>
                    <input type="text" name="student_name">
                    @error('student_name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Ngày sinh <span class="required">*</span>:</td>
                <td>
                    <input type="date" name="birth_date">
                    @error('birth_date')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Giới tính <span class="required">*</span>:</td>
                <td>
                    <select name="gender">
                        <option value="Nam" selected>Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                    @error('gender')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>Lớp <span class="required">*</span>:</td>
                <td>
                    <select name="class_id">
                        <option value="">Chọn lớp</option>
                        @foreach ($classes as $class)
                            <option value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" value="Thêm"></td>
            </tr>
        </table>
    </form>
</body>

</html>
```

### withErrors và withInput

Giải thích `return redirect()->back()->withErrors($validator)->withInput()`

Cú pháp này thường được sử dụng trong Laravel để xử lý trường hợp validation thất bại. Nó thực hiện các bước sau:

**`redirect()->back()`**: Điều này sẽ tạo một đối tượng redirect và hướng người dùng quay trở lại trang trước đó (trang mà form được submit).
**`withErrors($validator)`**: Thêm các thông báo lỗi từ đối tượng `validator` vào `session`. Những thông báo này sẽ được hiển thị trên trang đích để thông báo cho người dùng về các lỗi nhập liệu.
Cấu trúc chung của mảng:

```php
[
    'field_name' => [
        0 => 'Lỗi thứ nhất cho field_name',
        1 => 'Lỗi thứ hai cho field_name',
        // ...
    ],
    'another_field_name' => [
        0 => 'Lỗi duy nhất cho another_field_name',
        // ...
    ],
    // ...
]
```

**`withInput()`**: Giữ nguyên dữ liệu cũ của form trong `session`. Điều này giúp tự động điền lại các trường dữ liệu khi người dùng quay trở lại trang, thuận tiện cho việc sửa lỗi. Các giữ liệu cũ được giữ lại sẽ có cấu trúc sau:

```php
session('_old_input', [
    'name' => 'Nguyen Van A',
    'email' => 'nguyenvana@example.com',
    // ...
]);
```

Để lấy được data cũ ta có thể dùng hàm `old(<tên trường>)` trong blade template với cú pháp sau:

```php
<input type="text" name="name" value="{{ old('name') }}">
```

Trong trường hợp bạn vừa mở form (đi từ màn hình khác sang chứ không phải bị lỗi nhập dữ liệu). Giá trị không có thì hàm `old` sẽ trả về rỗng.

> Tip: Nếu bạn muốn đặt một giá trị mặc định khi không có giá trị old thì có thể thêm đối số mặc định trong hàm old(): `<input type="text" name="name" value="{{ old('name', 'Nguyễn Văn A') }}">`

### **Truy xuất và hiển thị lỗi trong view**

Bạn có thể sử dụng các hàm hỗ trợ sẵn của của Laravel (thường được gọi là helper) để dễ dàng truy xuất và hiển thị các lỗi này trong view của bạn.

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```
