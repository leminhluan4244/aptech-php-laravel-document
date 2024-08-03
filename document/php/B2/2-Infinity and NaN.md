## Kiểu Infinity và NaN trong PHP

### Kiểu Infinity (Vô cực)

- **Định nghĩa:** Infinity (vô cực) biểu diễn một giá trị số lớn vô hạn. Trong PHP, nó được đại diện bởi hằng số **INF**.
- **Khi nào xuất hiện:**
  - Kết quả của các phép chia một số cho 0 (ví dụ: 1 / 0).
  - Kết quả của các phép toán số học vượt quá giới hạn lớn nhất mà PHP có thể biểu diễn.
- **Ví dụ:**
  ```php
  $infinity = 1 / 0;
  echo $infinity; // Output: INF
  ```

### Kiểu NaN (Not a Number)

- **Định nghĩa:** NaN (Not a Number) biểu diễn một giá trị không phải là một số hợp lệ. Nó thường xuất hiện khi kết quả của một phép toán không xác định.
- **Khi nào xuất hiện:**
  - Kết quả của các phép toán không hợp lệ như: 0 / 0, sqrt(-1), atan2(0, 0).
  - Kết quả của các phép toán liên quan đến các giá trị Infinity.
- **Ví dụ:**
  ```php
  $nan = 0 / 0;
  echo $nan; // Output: NaN
  ```

### Kiểm tra Infinity và NaN

- **Hàm is_finite():** Kiểm tra xem một số có phải là hữu hạn (không phải Infinity hoặc NaN) hay không.
- **Hàm is_nan():** Kiểm tra xem một số có phải là NaN hay không.
- **Hàm is_infinite():** Kiểm tra xem một số có phải là Infinity hay không.

```php
$infinity = 1 / 0;
$nan = 0 / 0;
$number = 10;

echo is_finite($infinity); // false
echo is_nan($infinity);    // false
echo is_infinite($infinity); // true

echo is_finite($nan);     // false
echo is_nan($nan);        // true
echo is_infinite($nan);    // false

echo is_finite($number);  // true
echo is_nan($number);     // false
echo is_infinite($number); // false
```

### Ứng dụng

- **Xử lý lỗi:** Kiểm tra các kết quả tính toán để tránh các lỗi không mong muốn khi gặp Infinity hoặc NaN.
- **Kiểm soát luồng:** Sử dụng các giá trị này để điều khiển luồng chương trình của bạn.
- **So sánh:** So sánh các giá trị với Infinity hoặc NaN để thực hiện các hành động cụ thể.

### Lưu ý

- **Không thể so sánh trực tiếp:** Bạn không thể sử dụng các toán tử so sánh thông thường (>, <, ==) để so sánh Infinity hoặc NaN với các số khác.
- **Tính chất đặc biệt:** Infinity và NaN có một số tính chất đặc biệt, ví dụ:
  - Infinity + bất kỳ số hữu hạn nào = Infinity
  - Infinity - Infinity = NaN
  - Bất kỳ số nào nhân với NaN = NaN

**Tóm lại:**

Infinity và NaN là hai giá trị đặc biệt trong PHP, biểu diễn các tình huống không xác định trong các phép toán số học. Việc hiểu rõ về chúng giúp bạn viết các chương trình PHP một cách chính xác và hiệu quả hơn.

**Bạn có muốn tìm hiểu thêm về các khía cạnh khác của PHP liên quan đến các kiểu dữ liệu này không?**
