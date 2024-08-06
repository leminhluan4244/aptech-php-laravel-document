## Composer

### Composer là gì? Composer PHP là gì?

Composer là một công cụ Dependency Management (quản lý phụ thuộc) được sử dụng để quản lý các thư viện mà dự án (project) PHP của người dùng. Nói đúng hơn thì Composer sẽ quản lý sự phụ thuộc của các tài nguyên trong dự án – tức là các thư viện và gói mã nguồn mà project của họ phụ thuộc vào đó.

Với Composer, bạn có thể khai báo và chỉ định các thư viện cần thiết cho project của mình. Sau đó, công cụ này sẽ tự động tải mã code của thư viện, đồng thời tạo ra các file cần thiết để project liên quan có thể truy cập và sử dụng chúng. Không chỉ thế, Composer còn có khả năng cập nhật các thư viện đã cài đặt ngay khi có phiên bản mới được phát hành để đảm bảo rằng thư viện của project luôn hoạt động một cách tối ưu và hiệu quả nhất.

Các pagekage được cài đặt bởi composer được giới thiệu trên trang web: https://packagist.org/

### Lợi ích của Composer

Composer được lấy cảm hứng từ các công cụ quản lý gói mã nguồn mở khác như npm của Node. Composer sẽ chủ yếu tập trung vào việc quản lý các thư viện của dự án PHP trong project.

Trước khi Composer ra đời, các nhà phát triển phải đối mặt với nhiều vấn đề khác nhau khi quản lý thư viện project, bao gồm:

- Bạn phải tải các thư viện nếu sử dụng từ nguồn bên ngoài và đưa chúng vào trong thư mục của project. Quá trình tốn khá nhiều thời gian và đôi khi còn dẫn đến một số lỗi phức tạp.
- Nếu một thư viện sử dụng hoặc phụ thuộc vào một thư viện khác, bạn sẽ gặp khó khăn trong việc quản lý và cập nhật các phiên bản của thư viện. Chẳng hạn như thư viện A sử dụng thư viện B, và thư viện B lại sử dụng thư viện C, khi một trong ba có update, bạn phải mất nhiều thời gian để xác định và cập nhật các thay đổi một cách đồng nhất.

Tuy nhiên, từ khi có sự hỗ trợ của Composer, mọi việc đã được tối ưu hóa với khả năng:

- Khai báo các thư viện mà project sử dụng.
- Quản lý tập trung các thư viện và phiên bản tương ứng tại file composer.json.
- Tìm và cài đặt các phiên bản của thư viện đã được khai báo trong file composer.json.

### Các yếu tố quan trọng đối với Composer

#### Composer hoạt động như thế nào?

- **Tạo file `composer.json`**: File này chứa thông tin về các thư viện mà dự án của bạn cần.
- **Cài đặt**: Bạn chạy lệnh composer install để Composer tải về và cài đặt các thư viện vào thư mục vendor.
- **Quản lý**: Bạn có thể sử dụng các lệnh như `composer update` để cập nhật các thư viện, `composer require` để thêm thư viện mới và `composer remove` để xóa thư viện.

```json
{
  "require": {
    "laravel/framework": "^8.0"
  }
}
```

#### composer.json và composer.lock

`composer.json` và `composer.lock` là 2 file rất quan trọng đối với các dự án sử dụng composer. Cụ thể, bạn sẽ khai báo các phụ thuộc của dự án (hay còn được gọi là dependencies) vào file `composer.json`, bao gồm các thông tin liên quan như tên, phiên bản, source, licenses… và các nội dung sẽ được viết với định dạng JSON.

Dưới đây là một ví dụ mà bạn có thể tham khảo:

```json
{
  "name": "test/test",
  "type": "project",
  "description": "A small library which implement some features to phalcon",
  "license": "GPL-3.0",
  "authors": [
    {
      "name": "Tran Duc Thang",
      "email": "thangtd90@gmail.com"
    }
  ],
  "require": {
    "php": ">=8.2"
  }
}
```

Trong khi đó, file `composer.lock` sẽ lưu trữ thông tin về các dependencies đã được cài đặt. Chẳng hạn như khi bạn cài đặt lần đầu bằng lệnh install, Composer sẽ đọc thông tin về dependencies đó trong `composer.json` để cài đặt và tạo ra hoặc cập nhật file `composer.lock`.

Lúc này, file `composer.lock` có nhiệm vụ lưu trữ thông tin cụ thể của các dependencies đã được cài đặt, bao gồm những phiên bản cụ thể và các phụ thuộc của chúng. Điều này đảm bảo rằng sau khi bạn commit `composer.json` và `composer.lock` lên version control, tất cả mọi người đều sẽ nhận được cùng một bản cài đặt của các dependencies với phiên bản giống nhau.

Để hiểu rõ hơn về nguyên lý trên, chúng ta sẽ đến với một ví dụ chi tiết hơn. Chẳng hạn như trong file `composer.json` có ghi yêu cầu rằng package/A phải có phiên bản >=3.4.5. Khi người dùng cài đặt lần đầu tiên, Composer sẽ tìm và cài đặt phiên bản mới nhất của package/A thỏa mãn yêu cầu – tương đương với phiên bản 3.4.5. Lúc này, thông tin chi tiết về phiên bản đó sẽ được ghi vào file `composer.lock`.

Sau đó, trong những lần cài đặt tiếp theo, mặc dù package/A đã có phiên bản mới hơn – 3.4.6 chẳng hạn, thì Composer vẫn chỉ cài đặt phiên bản 3.4.5 vì thông tin đó đã được lưu lại trong file `composer.lock`. Như vậy, Composer sẽ sử dụng thông tin từ file `composer.lock` để cài đặt các dependencies thay vì file `composer.json`. Thông qua đó, bạn có thể tạo nên sự đồng nhất trong môi trường phát triển của dự án.

#### Packagist

Packagist là kho lưu trữ (repository) chính được sử dụng để lưu trữ các thông tin quan trọng về gói phần mềm (package) được phân phối bởi Composer. Cụ thể, packagist cho phép người dùng truy cập vào trang web để tìm kiếm các thư viện và gói phần mềm mà họ cần. Sau đó, thông qua composer, người dùng có thể cài đặt chúng một cách nhanh chóng, hoặc tự tạo ra một package cho riêng mình và chia sẻ chúng cho những người dùng khác tại https://packagist.org.

### Cách sử dụng Composer

Trước tiên, bạn cần có một file `composer.json` để sử dụng Composter. Như đã chia sẻ ở trên, file này sẽ lưu trữ thông tin mô tả về các dependencies mà project cần, cụ thể là:

```json
{
    "name": "laravel/laravel",
    "description": "The Laravel Framework.",
    "keywords": [
        "framework",
        "laravel"
    ],
    "license": "MIT",
    "require": {
        "laravel/framework": "5.8.*",
    },
    ....
}
```

Bạn sẽ nhìn thấy các yêu cầu về dependencies tại mục require. Bên trên là ví dụ về một file `composer.json` mặc định của Laravel framework, phần dấu sao (`*`) được hiểu là chúng ta chấp nhận cả những phiên bản được cập nhật mới hơn.

Thông qua terminal, bạn có thể thực hiện một lệnh composer install trong thư mục project của mình. Khi lệnh được thực thi, máy tính sẽ tự động tìm trong thư mục đó có chứa file `composer.json` không, sau đó thực hiện đúng với các yêu cầu của file, bao gồm việc cài đặt các dependencies cho project cùng một số công việc liên quan.

#### Autoloading

Trong file chính của project, bạn sử dụng dòng lệnh sau để thêm tất cả các package cần thiết vào project:

```php
include_once './vendor/autoload.php';
```

Đối với Laravel, bạn cũng có thể tham khảo dòng lệnh dưới đây:

```sh
composer dump-autoload
```

Ngay sau đó, tất cả các thư viện và package mà bạn đã cài đặt trong Composer đều sẽ sẵn sàng để sử dụng trong toàn bộ project của bạn.

#### Cập nhật package

Để cập nhật package, bạn chỉ cần gõ dòng lệnh `composer update`, ngay sau đó, Composer sẽ tự động update các package đang sử dụng. Trong trường hợp bạn cần cập nhật lên các version mới hơn hoặc version release, bạn có thể chỉnh sửa trong file `composer.json`.

#### Xoá một package composer

Để xoá một package khỏi dự án bằng composer ta sử dụng lệnh: `composer remove <packagename>`

### Cách cài đặt Composer

Trên thiết bị chạy hệ điều hành Windows:

Đây là cách đơn giản và dễ thực hiện nhất. Đầu tiên, bạn tải Composer-Setup.exe tại https://getcomposer.org/ về rồi cài đặt như một phần mềm thông thường.

Composer Installer sẽ tự động cài đặt và thêm vào PATH sẵn để người dùng có thể thực thi lệnh Composter trên CMD (Command Prompt).
