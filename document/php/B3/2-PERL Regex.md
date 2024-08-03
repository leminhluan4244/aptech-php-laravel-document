**Lưu ý:** Để sử dụng các biểu thức chính quy trong PHP, chúng ta sử dụng hàm `preg_match()`.

**Ví dụ cụ thể:**

1. **. (Một ký tự đơn):** Kiểm tra xem một chuỗi có ít nhất 3 ký tự bất kỳ hay không.

   ```php
   $string = "abc";
   if (preg_match("/.{3}/", $string)) {
       echo "Chuỗi có ít nhất 3 ký tự";
   }
   ```

   - **Ý nghĩa:** `.` sẽ khớp với bất kỳ ký tự nào (trừ dấu xuống dòng). `.{3}` có nghĩa là tìm một chuỗi gồm 3 ký tự bất kỳ liên tiếp.

2. **\s (Một ký tự khoảng trắng):** Đếm số lượng khoảng trắng trong một chuỗi.

   ```php
   $text = "  Hello, world!  ";
   preg_match_all("/\s+/", $text, $matches);
   echo "Số lượng khoảng trắng: " . count($matches[0]);
   ```

   - **Ý nghĩa:** `\s+` sẽ khớp với một hoặc nhiều khoảng trắng liên tiếp.

3. **\S (Không phải là khoảng trắng):** Kiểm tra xem một chuỗi có chứa ít nhất một ký tự không phải khoảng trắng hay không.

   ```php
   $string = "  ";
   if (preg_match("/\S/", $string)) {
       echo "Chuỗi có ít nhất một ký tự không phải khoảng trắng";
   }
   ```

   - **Ý nghĩa:** `\S` sẽ khớp với bất kỳ ký tự nào không phải là khoảng trắng.

4. **\d (Một chữ số):** Kiểm tra xem một chuỗi có phải là một số nguyên dương hay không.

   ```php
   $number = "12345";
   if (preg_match("/^\d+$/", $number)) {
       echo "Đây là một số nguyên dương";
   }
   ```

   - **Ý nghĩa:** `^\d+$` sẽ khớp với các chuỗi bắt đầu và kết thúc bằng một hoặc nhiều chữ số.

5. **\D (Không phải là chữ số):** Loại bỏ tất cả các chữ số khỏi một chuỗi.

   ```php
   $text = "Hello, world! This is 123.";
   $cleanedText = preg_replace("/\d/", "", $text);
   echo $cleanedText;
   ```

   - **Ý nghĩa:** `\d` sẽ khớp với bất kỳ chữ số nào và `preg_replace()` sẽ thay thế tất cả các chữ số bằng chuỗi rỗng.

6. **\w (Một ký tự từ):** Kiểm tra xem một chuỗi có chỉ chứa các chữ cái, số và dấu gạch dưới hay không.

   ```php
   $word = "hello_world123";
   if (preg_match("/^\w+$/", $word)) {
       echo "Chuỗi chỉ chứa các chữ cái, số và dấu gạch dưới";
   }
   ```

   - **Ý nghĩa:** `\w` sẽ khớp với bất kỳ chữ cái, số hoặc dấu gạch dưới nào.

7. **\W (Không phải là ký tự từ):** Loại bỏ tất cả các ký tự không phải là chữ cái, số hoặc dấu gạch dưới.

   ```php
   $text = "Hello, world! This is a sample text.";
   $cleanedText = preg_replace("/\W/", "", $text);
   echo $cleanedText;
   ```

   - **Ý nghĩa:** `\W` sẽ khớp với bất kỳ ký tự nào không phải là chữ cái, số hoặc dấu gạch dưới.

8. **[aeiou]:** Kiểm tra xem một chuỗi có chứa ít nhất một nguyên âm (a, e, i, o, u) hay không.

   ```php
   $string = "hello";
   if (preg_match("/[aeiou]/", $string)) {
       echo "Chuỗi chứa ít nhất một nguyên âm";
   }
   ```

   - **Ý nghĩa:** `[aeiou]` sẽ khớp với bất kỳ ký tự nào trong tập hợp {a, e, i, o, u}.

9. **[^aeiou]:** Kiểm tra xem một chuỗi có chứa ít nhất một phụ âm hay không.

   ```php
   $string = "hello";
   if (preg_match("/[^aeiou]/", $string)) {
       echo "Chuỗi chứa ít nhất một phụ âm";
   }
   ```

   - **Ý nghĩa:** `[^aeiou]` sẽ khớp với bất kỳ ký tự nào không nằm trong tập hợp {a, e, i, o, u}.

10. **(foo|bar|baz):** Kiểm tra xem một chuỗi có chứa từ "foo", "bar" hoặc "baz" hay không.

    ```php
    $string = "foobar";
    if (preg_match("/(foo|bar|baz)/", $string)) {
        echo "Chuỗi chứa từ foo, bar hoặc baz";
    }
    ```

    - **Ý nghĩa:** `(foo|bar|baz)` sẽ khớp với bất kỳ từ nào trong nhóm "foo", "bar" hoặc "baz".

**Giải thích chung:**

- `^`: Bắt đầu chuỗi.
- `$`: Kết thúc chuỗi.
- `+`: Một hoặc nhiều lần.
- `preg_match_all()`: Tìm tất cả các sự khớp trong một chuỗi.
- `preg_replace()`: Thay thế tất cả các phần tử khớp với mẫu bằng một chuỗi khác.
