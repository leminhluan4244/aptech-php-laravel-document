### HTTP Request là gì ?
HTTP request là thông tin được gửi từ client lên server, để yêu cầu server tìm hoặc xử lý một số thông tin, dữ liệu mà client muốn. HTTP request có thể là một file text dưới dạng HTML Form Data, XML , JSON, hoặc bất kỳ dạng nào mà cả client và server đều có thể hiểu được. 

> Theo Wikipedia: `HTTP` (tiếng Anh: `HyperText Transfer Protocol` - Giao thức truyền tải siêu văn bản) là một giao thức lớp ứng dụng nằm trong bộ giao thức dành cho hệ thống thông tin siêu phương tiện phân tán, cộng tác.[1] Nó chính là nền tảng dùng để trao đổi và liên lạc dữ liệu với World Wide Web, nơi mà các tập tin tài liệu siêu văn bản có thể chứa các siêu liên kết dẫn đến các tài nguyên số khác mà người dùng có thể dễ dàng truy cập được bằng cách dùng chuột nhấp vào hoặc dùng ngón tay chạm vào màn hình cảm ứng lúc duyệt web. Nhờ đó, HTTP cho phép người sử dụng truy cập và tải về các tài nguyên như văn bản HTML, text, video, ảnh... của các trang web và hiển thị chúng trên trình duyệt.

Hiện nay HTTP đã ra mắt các phiên bản:
- `HTTP/0.9`: Ra mắt 1991 và Đã lỗi thời
- `HTTP/1.0`: Ra mắt 1996 và Đã lỗi thời
- `HTTP/1.1`: Ra mắt 1997 và Còn thông dụng
- `HTTP/2`: Ra mắt 2015 và Còn thông dụng
- `HTTP/3`: Ra mắt 2022 và Còn thông dụng

Dưới đây là một số ví dụ trong http khi về gửi `request` và nhận về `response`:

#### HTTP Request (Client gửi đến Server)

**GET request:**

```http
GET /users HTTP/1.1
Host: example.com
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36
Accept: text/html
Accept-Language: en-US,en;q=0.9
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
```

**POST request:**

```http
POST /users HTTP/1.1
Host: example.com
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36
Accept: text/html
Accept-Language: en-US,en;q=0.9
Accept-Encoding: gzip, deflate, br
Connection: keep-alive
Content-Length: 35

name=John+Doe&email=johndoe%40example.com
```

### HTTP Response (Server trả về Client)

**Response for GET request:**

```http
HTTP/1.1 200 OK
Date: Mon, 29 Jul 2024 14:30:00 GMT
Content-Type: text/html
Content-Length: 345
Connection: keep-alive

<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <ul>
        <li>ID: 1, Name: John Doe, Email: johndoe@example.com</li>
        <li>ID: 2, Name: Jane Smith, Email: janesmith@example.com</li>
    </ul>
</body>
</html>
```

**Response for POST request:**

```http
HTTP/1.1 201 Created
Date: Mon, 29 Jul 2024 14:30:00 GMT
Content-Type: text/html
Content-Length: 200
Connection: keep-alive

<!DOCTYPE html>
<html>
<head>
    <title>User Created</title>
</head>
<body>
    <h1>User Created</h1>
    <p>ID: 3, Name: John Doe, Email: johndoe@example.com</p>
    <p>Created at: 2024-07-29T14:30:00Z</p>
</body>
</html>
```

Trong ví dụ này:

- **GET request:** Yêu cầu danh sách người dùng từ server.
- **POST request:** Gửi dữ liệu của người dùng mới để tạo tài khoản trên server.
- **Response cho GET request:** Server trả về danh sách người dùng dưới dạng HTML.
- **Response cho POST request:** server trả về thông tin của người dùng mới được tạo kèm theo trạng thái 201 Created, dưới dạng HTML.

Cả hai request và response đều tuân thủ chuẩn HTTP/1.1 và sử dụng HTML để trao đổi dữ liệu.

Theo như cấu trúc ở trên bạn thấy rằng một HTTP Request và response của nó sẽ luôn có cấu trúc theo kiểu sau:

**Request:**

```http
<###Method###> <###URL###> HTTP/<###Version###>
<###Headers###>

<###Body###>
```

**Response:**

```http
HTTP/<###Version###> <###Message Status###>
<###Headers###>

<###Body###>
```
### HTTP Request Headers
`HTTP request headers` là một phần không thể thiếu trong giao tiếp giữa client (ví dụ: trình duyệt) và server. Nó đóng vai trò như một tập hợp các cặp tên-giá trị, cung cấp thông tin chi tiết về yêu cầu được gửi đi. Thông qua các headers này, server có thể hiểu rõ hơn về yêu cầu của client và trả về kết quả phù hợp.

Không có ràng buộc cụ thể nào về việc đặt tên cho các `key` trong HTTP request headers ngoài việc chúng phân biệt hoa thường. Người ta thường sử dụng cách viết hoa chữ cái đầu mỗi từ, các từ nối nhau bằng dấu gạch nối `-`.

#### Các loại key HTTP Request Headers phổ biến:

- **General Headers:**
  - **Cache-Control:** Điều khiển cách các bộ nhớ cache xử lý yêu cầu.
  - **Connection:** Xác định loại kết nối (keep-alive, close).
  - **Date:** Thời gian tạo yêu cầu.
  - **Pragma:** Chỉ thị chung cho các máy proxy/cache.

- **Request Headers:**
  - **Accept:** Các kiểu nội dung mà client có thể chấp nhận.
  - **Accept-Charset:** Bộ ký tự mà client có thể hiểu.
  - **Accept-Encoding:** Các phương thức nén mà client hỗ trợ.
  - **Accept-Language:** Ngôn ngữ mà client ưu tiên.
  - **Authorization:** Thông tin xác thực (username, password, token).
  - **Content-Length:** Kích thước của request body.
  - **Content-Type:** Kiểu nội dung của request body.
  - **Cookie:** Cookie được gửi từ client đến server.
  - **Host:** Tên miền hoặc địa chỉ IP của máy chủ.
  - **Referer:** URL của trang web trước đó mà người dùng truy cập.
  - **User-Agent:** Thông tin về trình duyệt hoặc ứng dụng client.

- **Entity Headers:**
  - **Content-Encoding:** Phương thức nén được sử dụng cho request body.
  - **Content-Language:** Ngôn ngữ của request body.

Ví dụ:

```
GET /products HTTP/1.1
Host: www.example.com
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8
Cookie: PHPSESSID=123456789
```

Trong ví dụ trên:

- **GET:** Phương thức yêu cầu.
- **/products:** Tài nguyên được yêu cầu.
- **Host:** Tên miền của máy chủ.
- **User-Agent:** Thông tin về trình duyệt.
- **Accept:** Các kiểu nội dung mà client chấp nhận.
- **Cookie:** Cookie được gửi kèm theo yêu cầu.

### HTTP Request Body

`HTTP request body` là phần chứa dữ liệu thực tế mà client muốn gửi đến server. Nó thường đi kèm với các phương thức như POST, PUT, PATCH để thực hiện các hành động.

**Đặc điểm của HTTP request body:**

- **Nội dung tùy biến:** Bạn có thể gửi bất kỳ loại dữ liệu nào mà server có thể hiểu, chẳng hạn như:
    - **Dữ liệu form:** Dữ liệu từ các form HTML.
    - **Dữ liệu JSON:** Dữ liệu được định dạng theo JSON.
    - **Dữ liệu XML:** Dữ liệu được định dạng theo XML.
    - **Dữ liệu nhị phân:** Hình ảnh, file, v.v.
    - **... Một số kiểu khác nửa**
- **Kích thước:** Kích thước của body không bị giới hạn nghiêm ngặt, nhưng thực tế thường bị giới hạn bởi các cấu hình của server và client.
- **Mã hóa:** Dữ liệu trong body thường được mã hóa để đảm bảo bảo mật, đặc biệt khi gửi thông tin nhạy cảm.

**Header `Content-Type`:**

Để server hiểu được định dạng của dữ liệu trong body, bạn cần sử dụng headers `Content-Type`. Ví dụ:

- `Content-Type: application/json` cho dữ liệu JSON
- `Content-Type: application/x-www-form-urlencoded` cho dữ liệu form
- `Content-Type: multipart/form-data` cho việc gửi file

Ví dụ:

Giả sử bạn muốn gửi một yêu cầu POST để tạo một người dùng mới, với dữ liệu sau:

```json
{
    "name": "John Doe",
    "email": "johndoe@example.com"
}
```

Yêu cầu HTTP sẽ có dạng:

```
POST /users HTTP/1.1
Host: www.example.com
Content-Type: application/json

{
    "name": "John Doe",
    "email": "johndoe@example.com"
}
```

### HTTP Response (Headers và Body)

`HTTP response` là câu trả lời của server gửi về cho client sau khi nhận được một request. Giống như request, response cũng bao gồm headers và body, mỗi phần đóng vai trò quan trọng trong việc truyền tải thông tin từ server về client. Về mặt cấu trúc thì `HTTP Request` và `HTTP Response`. Tuy nhiên sẽ khác ở chỗ nếu client có gửi `Methods` để xác định loại yêu cầu mà nó mong muốn cho server, thì ở server response trả về sẽ chứa `Status Message` để thông báo trạng thái của request có được chấp nhận hay không, nếu gặp lỗi thì lỗi thuộc loại nào. Ta sẽ tìm hiểu về `Methods` và `Status Message` ở phần sau.

#### HTTP Response Headers

`Response headers` cung cấp thông tin chi tiết về phản hồi của server. Vể cấu trúc nó cũng tương tự như `Request headers`. 

**Một số response s phổ biến:**

- **Content-Type:** Chỉ định kiểu nội dung của response body (ví dụ: text/html, application/json).
- **Content-Length:** Kích thước của response body.
- **Location:** Chỉ định URL mới để client chuyển hướng đến.
- **Set-Cookie:** Gửi cookie đến client để lưu trữ thông tin trên máy của người dùng.
- **Cache-Control:** Điều khiển cách các bộ nhớ cache xử lý response.
- **Last-Modified:** Thời điểm tài nguyên được sửa đổi lần cuối.
- **ETag:** Một chuỗi duy nhất xác định phiên bản của tài nguyên.

Ví dụ:

```
HTTP/1.1 200 OK
Content-Type: text/html
Content-Length: 1234
Date: Thu, 01 Dec 2023 16:29:51 GMT

<!DOCTYPE html>
<html>
<head>
  <title>Example Page</title>
</head>
<body>
  Hello, world!
</body>
</html>
```

Trong ví dụ trên:

- **200 OK:** Yêu cầu đã được xử lý thành công.
- **Content-Type:** Dữ liệu trả về là HTML.
- **Content-Length:** Kích thước của nội dung HTML là 1234 byte.
- **Body:** Chứa mã HTML hiển thị trên trang web.

#### HTTP Response Body

`Response body` chứa dữ liệu thực tế mà server gửi về cho client. Vể cấu trúc nó cũng tương tự như `Request body`. Nó có thể là:

- **HTML:** Mã HTML để hiển thị trang web.
- **JSON:** Dữ liệu được định dạng theo JSON.
- **XML:** Dữ liệu được định dạng theo XML.
- **Hình ảnh:** File ảnh (JPEG, PNG, v.v.).
- **File:** Bất kỳ loại file nào khác.

### HTTP Methods

`HTTP methods` (hay còn gọi là **HTTP verbs**) là các từ động từ được sử dụng trong yêu cầu HTTP để chỉ định hành động mà client muốn thực hiện trên một tài nguyên. Mỗi phương thức có một ý nghĩa và cách sử dụng khác nhau.

#### Các HTTP Method phổ biến

- `GET`: Dùng để yêu cầu truy xuất một tài nguyên. Đây là phương thức an toàn nhất và thường được sử dụng để lấy dữ liệu.
- `POST`: Dùng để tạo một tài nguyên mới. Phương thức này thường được sử dụng để gửi dữ liệu từ các form HTML đến server.
- `PUT`: Dùng để cập nhật toàn bộ một tài nguyên.
- `PATCH`: Dùng để cập nhật một phần của một tài nguyên.
- `DELETE`: Dùng để xóa một tài nguyên.
- `HEAD`: Tương tự như GET, nhưng chỉ trả về header mà không có body, thường được dùng để kiểm tra xem một tài nguyên có tồn tại hay không, kích thước, loại nội dung, v.v.
- `OPTIONS`: Dùng để yêu cầu server trả về các phương thức HTTP mà server hỗ trợ cho một tài nguyên cụ thể.

Ngoài ra còn có `CONNECT` và `TRACE` tuy nhiên hai phương thức này ít được sử dụng hơn, bạn có thể tìm hiểu đầy đủ về các phương thức này ở các trang như: 
- [W3School](https://www.w3schools.com/tags/ref_httpmethods.asp)
- [MDN Web Docs](https://developer.mozilla.org/en-US/docs/Web/HTTP/Methods)

#### Bảng so sánh các HTTP method

| Method | Mô tả | An toàn | Idempotent |
|---|---|---|---|
| GET | Lấy tài nguyên | Có | Có |
| POST | Tạo tài nguyên mới | Không | Không |
| PUT | Cập nhật toàn bộ tài nguyên | Không | Có |
| PATCH | Cập nhật một phần tài nguyên | Không | Không |
| DELETE | Xóa tài nguyên | Không | Có |
| HEAD | Lấy header của tài nguyên | Có | Có |
| OPTIONS | Lấy các phương thức HTTP được hỗ trợ | Có | Có |
- **An toàn:** Một phương thức được coi là an toàn nếu nó không gây ra bất kỳ thay đổi nào trên server.
- **Idempotent:** Một phương thức được coi là idempotent nếu việc gọi nó nhiều lần sẽ cho kết quả giống như gọi nó một lần.

Ví dụ:

- **GET /users:** Lấy danh sách tất cả người dùng.
- **POST /users:** Tạo một người dùng mới.
- **PUT /users/1:** Cập nhật toàn bộ thông tin của người dùng có ID là 1.
- **PATCH /users/1/name:** Cập nhật tên của người dùng có ID là 1.
- **DELETE /users/1:** Xóa người dùng có ID là 1.
- **HEAD /images/logo.png:** Kiểm tra xem file ảnh logo.png có tồn tại và kích thước của nó.
- **OPTIONS /api:** Lấy danh sách các phương thức HTTP mà API hỗ trợ.

> Lưu ý

- HTTP Request không bắt buộc người dùng sử dụng GET, POST, PUT hay bất kỳ loại Method này cho request gửi lên server. Vì vậy bạn hoàn toàn có thể dùng GET cho việc cập nhật thông tin, POST cho việc lấy danh sách thông tin. Tuy nhiên, việc chọn phương thức HTTP phù hợp là rất quan trọng để đảm bảo tính đúng đắn và hiệu quả của ứng dụng, cũng như đảm bảo hiệu quả làm việc giữa các lập trình viên trong 1 nhóm hoặc cho hoạt động bảo trì sau này.

- Một số framework và thư viện cung cấp các helper để thực hiện các yêu cầu HTTP với các phương thức khác nhau một cách dễ dàng.

### HTTP Status Message

`HTTP status message` là một phần quan trọng trong giao thức HTTP, cung cấp thông tin chi tiết về kết quả của một yêu cầu HTTP. Nó đi kèm với một mã trạng thái HTTP (HTTP status code) để cho biết cụ thể tình trạng của yêu cầu đó được phản hồi thế nào bởi server.

Một HTTP status message thường có dạng:

```
HTTP/1.1 <mã trạng thái> <mô tả>
```

Trong đó: 
- `HTTP/1.1`: Phiên bản giao thức HTTP.
- `<mã trạng thái>`:s Một số nguyên ba chữ số biểu thị trạng thái của yêu cầu.
- `<mô tả>`: Một đoạn văn bản mô tả ngắn gọn về trạng thái.

Ví dụ:

```
HTTP/1.1 200 OK
```

Trong ví dụ trên:

* **200:** Mã trạng thái cho biết yêu cầu đã được xử lý thành công.
* **OK:** Mô tả chi tiết hơn về trạng thái.

#### Các nhóm mã trạng thái HTTP

Các mã trạng thái HTTP được chia thành các nhóm để dễ dàng phân loại:

* **1xx (Thông tin):** Yêu cầu đã được nhận và đang được xử lý.
* **2xx (Thành công):** Yêu cầu đã được xử lý thành công.
* **3xx (Chuyển hướng):** Client cần thực hiện hành động bổ sung để hoàn thành yêu cầu.
* **4xx (Lỗi của client):** Yêu cầu có lỗi do phía client gây ra.
* **5xx (Lỗi của server):** Yêu cầu không thể được xử lý do lỗi phía server.

Bạn có thể tìm hiểu đầy đủ về các message status ở các trang như: 
- [W3School](https://www.w3schools.com/tags/ref_httpmessages.asp)
- [MDN Web Docs](https://developer.mozilla.org/en-US/docs/Web/HTTP/Status)

#### Một số mã trạng thái thường gặp

* **200 OK:** Yêu cầu đã được xử lý thành công.
* **404 Not Found:** Tài nguyên không tìm thấy.
* **500 Internal Server Error:** Xảy ra lỗi nghiêm trọng trên server.
* **301 Moved Permanently:** Tài nguyên đã được chuyển đến một URL mới.
* **401 Unauthorized:** Truy cập bị từ chối do không được phép.

#### Tầm quan trọng của HTTP status message

* **Thông báo cho client:** Giúp client hiểu được tình trạng của yêu cầu và thực hiện các hành động tiếp theo phù hợp.
* **Gỡ lỗi:** Giúp các nhà phát triển xác định và khắc phục lỗi trong ứng dụng.
* **SEO:** Các công cụ tìm kiếm sử dụng mã trạng thái để đánh giá chất lượng của website.
