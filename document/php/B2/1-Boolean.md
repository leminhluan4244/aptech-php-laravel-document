Boolean chỉ có hai giá trị: **true** (đúng) và **false** (sai). Kiểu dữ liệu này rất quan trọng trong việc điều khiển luồng chương trình thông qua các câu lệnh điều kiện (if, else, while, for...).

**Ví dụ về kiểu Boolean và ép kiểu:**

```php
<?php
// Khai báo trực tiếp
$isTrue = true;
$isFalse = false;

// Ép kiểu từ các kiểu dữ liệu khác sang Boolean

// Từ số nguyên (int)
$number = 10;
$bool_from_int = (bool)$number; // true vì số khác 0
$zero = 0;
$bool_from_zero = (bool)$zero; // false vì bằng 0

// Từ số thực (float)
$float_number = 3.14;
$bool_from_float = (bool)$float_number; // true vì khác 0
$zero_float = 0.0;
$bool_from_zero_float = (bool)$zero_float; // false vì bằng 0

// Từ chuỗi (string)
$non_empty_string = "hello";
$bool_from_non_empty_string = (bool)$non_empty_string; // true vì chuỗi không rỗng
$empty_string = "";
$bool_from_empty_string = (bool)$empty_string; // false vì chuỗi rỗng

// Từ mảng (array)
$non_empty_array = [1, 2, 3];
$bool_from_non_empty_array = (bool)$non_empty_array; // true vì mảng không rỗng
$empty_array = [];
$bool_from_empty_array = (bool)$empty_array; // false vì mảng rỗng

// Từ đối tượng (object)
$object = new stdClass();
$bool_from_object = (bool)$object; // true vì đối tượng tồn tại
$null_object = null;
$bool_from_null_object = (bool)$null_object; // false vì đối tượng là null

// Từ null
$null_value = null;
$bool_from_null = (bool)$null_value; // false
?>
```

**Giải thích:**

- **Các giá trị được coi là false khi ép kiểu sang Boolean:**
  - 0 (số không)
  - 0.0 (số thập phân bằng 0)
  - "" (chuỗi rỗng)
  - [] (mảng rỗng)
  - null
- **Các giá trị khác đều được coi là true khi ép kiểu sang Boolean.**

**Quy tắc chung:**

- **Số:** Số khác 0 được coi là true, số 0 được coi là false.
- **Chuỗi:** Chuỗi không rỗng được coi là true, chuỗi rỗng được coi là false.
- **Mảng:** Mảng không rỗng được coi là true, mảng rỗng được coi là false.
- **Đối tượng:** Đối tượng tồn tại được coi là true, null được coi là false.

**Ứng dụng của Boolean:**

- **Điều kiện:** Sử dụng trong các câu lệnh điều kiện (if, else, while, for) để kiểm tra điều kiện và thực hiện các hành động tương ứng.
- **So sánh:** Sử dụng trong các phép so sánh để kiểm tra sự bằng nhau, lớn hơn, nhỏ hơn, v.v.
- **Logic:** Sử dụng các toán tử logic (&&, ||, !) để kết hợp các điều kiện.

**Ví dụ về sử dụng Boolean trong điều kiện:**

```php
if ($age >= 18) {
    echo "Bạn đã đủ tuổi để lái xe.";
}
```

**Lưu ý:**

- Khi ép kiểu sang Boolean, PHP sẽ cố gắng chuyển đổi giá trị thành một trong hai giá trị logic: true hoặc false.
- Việc hiểu rõ cách PHP chuyển đổi các kiểu dữ liệu sang Boolean rất quan trọng để viết các chương trình PHP hiệu quả.

**Bài tập:**

- Viết một chương trình kiểm tra xem một số có phải là số chẵn hay không.
- Viết một chương trình kiểm tra xem một chuỗi có chứa chữ cái `a` nào không.
- Viết một chương trình kiểm tra xem một mảng có phần tử nào không.

Hy vọng ví dụ và giải thích trên sẽ giúp bạn hiểu rõ hơn về kiểu dữ liệu Boolean trong PHP. Nếu có bất kỳ câu hỏi nào, đừng ngần ngại hỏi nhé!
