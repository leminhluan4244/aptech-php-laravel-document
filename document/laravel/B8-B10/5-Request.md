## Đối tượng Request trong Laravel

**Đối tượng Request trong Laravel** là một đại diện cho yêu cầu HTTP mà người dùng gửi đến ứng dụng của bạn. Nó chứa tất cả các thông tin liên quan đến yêu cầu đó, bao gồm:

* **Dữ liệu từ form:** Thông tin mà người dùng nhập vào các trường form.
* **Các tham số trong URL:** Các giá trị truyền qua URL.
* **File được upload:** Các file mà người dùng tải lên.
* **Cookie:** Dữ liệu được lưu trữ trên trình duyệt của người dùng.
* **Header:** Các thông tin về yêu cầu như phương thức HTTP (GET, POST, PUT, DELETE...), loại nội dung, v.v.

**Tại sao đối tượng Request lại quan trọng?**

* **Truy xuất dữ liệu:** Bạn có thể dễ dàng truy xuất các thông tin từ yêu cầu để xử lý và lưu trữ.
* **Validation:** Kiểm tra tính hợp lệ của dữ liệu đầu vào trước khi xử lý.
* **Tương tác với các thành phần khác:** Dựa trên thông tin trong request, bạn có thể quyết định thực hiện các hành động khác nhau, chẳng hạn như định tuyến, gọi các hàm trong controller, v.v.

**Cách sử dụng đối tượng Request trong Laravel:**

* **Injection tự động:** Laravel sẽ tự động inject đối tượng `Request` vào controller của bạn. Bạn chỉ cần khai báo nó trong phương thức của controller:

```php
public function store(Request $request)
{
    // Sử dụng $request để truy xuất dữ liệu
    $name = $request->input('name');
    $email = $request->email;
}
```

* **Truy xuất dữ liệu:**
  * **Dữ liệu form:** `$request->input('name')` hoặc `$request->name`
  * **Tham số URL:** `$request->query('page')`
  * **File upload:** `$request->file('avatar')`
  * **Cookie:** `$request->cookie('remember_token')`
  * **Header:** `$request->header('User-Agent')`

* **Các phương thức hữu ích:**
  * `isMethod()`: Kiểm tra phương thức HTTP (GET, POST, ...)
    ```php
        public function store(Request $request)
        {
            if ($request->isMethod('post')) {
                // Xử lý khi phương thức là POST
                // ...
            } else {
                return redirect()->back()->with('error', 'Phương thức không hợp lệ');
            }
        }
    ```
  * `isAjax()`: Kiểm tra xem yêu cầu có phải là AJAX không
    ```php
        public function search(Request $request)
        {
            if ($request->isAjax()) {
                // Trả về kết quả dưới dạng JSON cho yêu cầu AJAX
                return response()->json(['results' => $results]);
            } else {
                // Xử lý yêu cầu bình thường
                return view('search', compact('results'));
            }
        }
        
    ```
  * `has()`: Kiểm tra xem một trường có tồn tại trong request hay không
    ```php
        public function update(Request $request, $id)
        {
            if ($request->has('password')) {
                // Cập nhật mật khẩu nếu có
                // ...
            }
            // Cập nhật các trường khác
            // ...
        }
    ```
  * `filled()`: Kiểm tra xem một trường có chứa giá trị không
    ```php
    public function store(Request $request)
    {
        if ($request->filled('email')) {
            // Gửi email xác thực
            // ...
        }
    }
    ```
  * `except()`: Lấy ra một mảng chứa tất cả các trường trừ những trường đã chỉ định
    ```php
    public function store(Request $request)
    {
        $data = $request->except('_token');
        User::create($data);
    }
    ```
    
  * `only()`: Lấy ra một mảng chứa chỉ các trường đã chỉ định
    ```php
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->only(['name', 'email']));
    }
    ```
  * `Lấy tất cả các tham số trong URL`
    ```php
    $queryParams = $request->query();
    ```
  * `Kiểm tra xem yêu cầu có gửi file lên không`
    ```php
    if ($request->hasFile('avatar')) {
        // Xử lý file upload
    }
    ```