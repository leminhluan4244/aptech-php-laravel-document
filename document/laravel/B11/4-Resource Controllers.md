## Resource Controllers

Nếu bạn coi mỗi model Eloquent trong ứng dụng của mình là một "tài nguyên", thì thông thường bạn sẽ thực hiện cùng một tập các hành động đối với mỗi tài nguyên trong ứng dụng của mình. Ví dụ, hãy tưởng tượng ứng dụng của bạn chứa một model `Photo` và một model `Movie`. Rất có thể người dùng có thể tạo, đọc, cập nhật hoặc xóa các tài nguyên này.

Do trường hợp sử dụng phổ biến này, resource routing của Laravel gán các route như create, read, update, và delete ("CRUD") điển hình cho một bộ điều khiển chỉ với một dòng code. Để bắt đầu, chúng ta có thể sử dụng tùy chọn `--resource` của lệnh Artisan `make:controller` để nhanh chóng tạo một bộ điều khiển xử lý các hành động này:

```shell
php artisan make:controller PhotoController --resource
```

Lệnh này sẽ tạo ra một bộ điều khiển tại `app/Http/Controllers/PhotoController.php`. Bộ điều khiển sẽ chứa một method cho mỗi thao tác tài nguyên có sẵn. Tiếp theo, bạn có thể đăng ký một route tài nguyên trỏ đến bộ điều khiển:

```php
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);
```

Tuyên bố route đơn lẻ này tạo ra nhiều route để xử lý nhiều hành động khác nhau đối với tài nguyên. Bộ điều khiển được tạo ra sẽ có sẵn các method cho mỗi hành động này. Hãy nhớ rằng, bạn luôn có thể xem nhanh các route của ứng dụng của mình bằng cách chạy lệnh Artisan `route:list`.

Bạn thậm chí có thể đăng ký nhiều bộ điều khiển tài nguyên cùng một lúc bằng cách truyền một mảng vào method `resources`:

```php
Route::resources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
```

#### Các hành động được xử lý bởi bộ điều khiển tài nguyên

| Verb      | URI                    | Action  | Route Name     |
| --------- | ---------------------- | ------- | -------------- |
| GET       | `/photos`              | index   | photos.index   |
| GET       | `/photos/create`       | create  | photos.create  |
| POST      | `/photos`              | store   | photos.store   |
| GET       | `/photos/{photo}`      | show    | photos.show    |
| GET       | `/photos/{photo}/edit` | edit    | photos.edit    |
| PUT/PATCH | `/photos/{photo}`      | update  | photos.update  |
| DELETE    | `/photos/{photo}`      | destroy | photos.destroy |

#### Tùy chỉnh hành vi khi model bị thiếu

Thông thường, phản hồi HTTP 404 sẽ được tạo ra nếu model tài nguyên được ràng buộc ngầm không được tìm thấy. Tuy nhiên, bạn có thể tùy chỉnh hành vi này bằng cách gọi method `missing` khi định nghĩa route tài nguyên của bạn. Method `missing` chấp nhận một closure sẽ được gọi nếu một model được ràng buộc ngầm không thể được tìm thấy cho bất kỳ route nào của tài nguyên:

```php
use App\Http\Controllers\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

Route::resource('photos', PhotoController::class)
        ->missing(function (Request $request) {
            return Redirect::route('photos.index');
        });
```

#### Các model bị xóa mềm

Thông thường, ràng buộc model ngầm sẽ không truy xuất các model đã bị [xóa mềm](https://laravel.com/docs/11.x/eloquent#soft-deleting) và sẽ trả về phản hồi HTTP 404. Tuy nhiên, bạn có thể yêu cầu framework cho phép truy xuất các model bị xóa mềm bằng cách gọi method `withTrashed` khi định nghĩa route tài nguyên của bạn:

```php
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class)->withTrashed();
```

Gọi `withTrashed` mà không có đối số sẽ cho phép truy xuất các model bị xóa mềm cho các route `show`, `edit`, và `update` của tài nguyên. Bạn có thể chỉ định một tập hợp các route này bằng cách truyền một mảng vào method `withTrashed`:

```php
Route::resource('photos', PhotoController::class)->withTrashed(['show']);
```

#### Chỉ định model tài nguyên

Nếu bạn đang sử dụng [ràng buộc model theo route](https://laravel.com/docs/11.x/routing#route-model-binding) và muốn các method của bộ điều khiển tài nguyên có khai báo kiểu đối số là một instance của model, bạn có thể sử dụng tùy chọn `--model` khi tạo bộ điều khiển:

```shell
php artisan make:controller PhotoController --model=Photo --resource
```

#### Tạo yêu cầu biểu mẫu

Bạn có thể cung cấp tùy chọn `--requests` khi tạo bộ điều khiển tài nguyên để yêu cầu Artisan tạo [các class yêu cầu biểu mẫu](https://laravel.com/docs/11.x/validation#form-request-validation) cho các method lưu trữ và cập nhật của bộ điều khiển:

```shell
php artisan make:controller PhotoController --model=Photo --resource --requests
```

#### route tài nguyên từng phần

Khi khai báo một route tài nguyên, bạn có thể chỉ định một tập hợp các hành động mà bộ điều khiển sẽ xử lý thay vì toàn bộ các hành động mặc định:

```php
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
```

#### route tài nguyên cho API

Khi khai báo các route tài nguyên sẽ được tiêu thụ bởi API, bạn thường muốn loại bỏ các route trình bày mẫu HTML như `create` và `edit`. Để thuận tiện, bạn có thể sử dụng method `apiResource` để tự động loại bỏ hai route này:

```php
use App\Http\Controllers\PhotoController;

Route::apiResource('photos', PhotoController::class);
```

Bạn có thể đăng ký nhiều bộ điều khiển tài nguyên API cùng một lúc bằng cách truyền một mảng vào method `apiResources`:

```php
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PostController;

Route::apiResources([
    'photos' => PhotoController::class,
    'posts' => PostController::class,
]);
```

Để nhanh chóng tạo một bộ điều khiển tài nguyên API không bao gồm các method `create` hoặc `edit`, sử dụng tùy chọn `--api` khi thực thi lệnh `make:controller`:

```shell
php artisan make:controller PhotoController --api
```

#### Tài nguyên lồng nhau

Đôi khi bạn có thể cần định nghĩa các route tới một tài nguyên lồng nhau. Ví dụ, một tài nguyên photo có thể có nhiều comment có thể đính kèm vào photo đó. Để lồng các bộ điều khiển tài nguyên, bạn có thể sử dụng cú pháp dấu chấm trong khai báo route của mình:

```php
use App\Http\Controllers\PhotoCommentController;

Route::resource('photos.comments', PhotoCommentController::class);
```

route này sẽ đăng ký một tài nguyên lồng nhau có thể truy cập với các URI như sau:

```shell
/photos/{photo}/comments/{comment}
```

#### Quy mô tài nguyên lồng nhau

Tính năng [ràng buộc model ngầm](https://laravel.com/docs/11.x/routing#implicit-model-binding-scoping) của Laravel có thể tự động mở rộng các ràng buộc lồng nhau để đảm bảo rằng model con được truy xuất thực sự thuộc về model cha. Bằng cách sử dụng method `scoped` khi định nghĩa route tài nguyên lồng nhau, bạn có thể bật tính năng mở rộng tự động cũng như hướng dẫn Laravel sử dụng trường nào để truy xuất tài nguyên con. Để biết thêm thông tin về cách thực hiện điều này, vui lòng xem tài liệu về [mở rộng các route tài nguyên](#restful-scoping-resource-routes).

#### Lồng nhau nông

Thường thì không cần thiết phải có cả ID của model cha và con trong một URI vì ID của model con đã là một định danh duy nhất. Khi sử dụng các định danh duy nhất như khóa chính tự động tăng để xác định model trong các đoạn URI, bạn có thể chọn sử dụng "lồng nhau nông":

```php
use App\Http\Controllers\CommentController;

Route::resource('photos.comments', CommentController::class)->shallow();
```

Định nghĩa route này sẽ tạo ra các route sau:

| Verb      | URI                               | Action  | Route Name             |
| --------- | --------------------------------- | ------- | ---------------------- |
| GET       | `/photos/{photo}/comments`        | index   | photos.comments.index  |
| GET       | `/

photos/{photo}/comments/create` | create  | photos.comments.create |
| POST      | `/photos/{photo}/comments`        | store   | photos.comments.store  |
| GET       | `/comments/{comment}`             | show    | comments.show          |
| GET       | `/comments/{comment}/edit`        | edit    | comments.edit          |
| PUT/PATCH | `/comments/{comment}`             | update  | comments.update        |
| DELETE    | `/comments/{comment}`             | destroy | comments.destroy       |

---

Nếu cần chỉnh sửa thêm nội dung hoặc câu cú, hãy cho mình biết nhé!