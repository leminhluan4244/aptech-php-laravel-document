### Giới thiệu các hàm xử lý mảng trong PHP

#### 1. array_change_key_case(array $array, int $case)
- `Chức năng:` Thay đổi chữ hoa/thường của các khóa trong mảng.
- `Tham số:`
    - `$array`: Mảng cần thay đổi.
    - `$case`: CASE_LOWER để chuyển đổi thành chữ thường, CASE_UPPER để chuyển đổi thành chữ hoa.
- `Trả về:` Mảng mới với các khóa đã được thay đổi.
- `Ví dụ:`
```php
$array = ['Name' => 'John', 'Age' => 30];
$new_array = array_change_key_case($array, CASE_LOWER);
print_r($new_array); // Output: Array ( [name] => John [age] => 30 )
```

#### 2. array_chunk(array $array, int $length, bool $preserve_keys)
- `Chức năng:` Chia một mảng thành các mảng con với kích thước cho trước.
- `Tham số:`
    - `$array`: Mảng cần chia.
    - `$length`: Số phần tử trong mỗi mảng con.
    - `$preserve_keys`: Nếu là true, giữ nguyên khóa của các phần tử.
- `Trả về:` Một mảng chứa các mảng con.
- `Ví dụ:`
```php
$numbers = range(1, 10);
$chunks = array_chunk($numbers, 3);
print_r($chunks);
```

#### 3. array_column(array $array, int|string|null $column_key, int|string|null $index_key)
- `Chức năng:` Trả về một mảng cột từ một mảng đa chiều.
- `Tham số:`
    - `$array`: Mảng đa chiều.
    - `$column_key`: Tên cột hoặc chỉ số.
    - `$index_key`: Tên cột hoặc chỉ số để làm khóa của mảng kết quả.
- `Trả về:` Một mảng mới chứa các giá trị của cột được chỉ định.
- `Ví dụ:`
```php
$users = [
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane']
];
$names = array_column($users, 'name');
print_r($names); // Output: Array ( [0] => John [1] => Jane )
```

#### 4. array_combine(array $keys, array $values)
- `Chức năng:` Tạo một mảng kết hợp từ hai mảng, một mảng chứa khóa và một mảng chứa giá trị.
- `Tham số:`
    - `$keys`: Mảng chứa các khóa.
    - `$values`: Mảng chứa các giá trị.
- `Trả về:` Mảng kết hợp mới.
- `Ví dụ:`
```php
$keys = ['name', 'age'];
$values = ['John', 30];
$person = array_combine($keys, $values);
print_r($person); // Output: Array ( [name] => John [age] => 30 )
```

#### 5. array_count_values(array $array)
- `Chức năng:` Đếm số lần xuất hiện của mỗi giá trị trong một mảng.
- `Tham số:`
    - `$array`: Mảng cần đếm.
- `Trả về:` Một mảng kết hợp với khóa là giá trị và giá trị là số lần xuất hiện.
- `Ví dụ:`
```php
$numbers = [1, 2, 2, 3, 4, 1];
$counts = array_count_values($numbers);
print_r($counts); // Output: Array ( [1] => 2 [2] => 2 [3] => 1 [4] => 1 )
```

#### 6. array_diff(array $array, array ...$arrays)
- `Chức năng:` Tìm các phần tử chỉ có trong mảng đầu tiên mà không có trong các mảng còn lại.
- `Tham số:`
    - `$array`: Mảng chính để so sánh.
    - `...$arrays`: Các mảng còn lại để so sánh.
- `Trả về:` Một mảng chứa các phần tử khác biệt.
- `Ví dụ:`
```php
$array1 = [1, 2, 3];
$array2 = [2, 4, 5];
$result = array_diff($array1, $array2);
print_r($result); // Output: Array ( [0] => 1 [2] => 3 )
```

#### 7. array_diff_assoc(array $array, array ...$arrays)
- `Chức năng:` Tìm các phần tử khác biệt theo cả khóa và giá trị.
- `Tham số:` Tương tự như `array_diff`.
- `Trả về:` Một mảng chứa các phần tử khác biệt theo cả khóa và giá trị.
- `Ví dụ:`
```php
$array1 = ['a' => 1, 'b' => 2];
$array2 = ['a' => 1, 'c' => 3];
$result = array_diff_assoc($array1, $array2);
print_r($result); // Output: Array ( [b] => 2 )
```

#### 8. array_diff_key(array $array, array ...$arrays)
- `Chức năng:` Tìm các phần tử khác biệt theo khóa.
- `Tham số:` Tương tự như `array_diff`.
- `Trả về:` Một mảng chứa các phần tử khác biệt theo khóa.
- `Ví dụ:`
```php
$array1 = ['a' => 1, 'b' => 2];
$array2 = ['a' => 1, 'c' => 3];
$result = array_diff_key($array1, $array2);
print_r($result); // Output: Array ( [b] => 2 )
```

#### 9. array_fill(int $start_index, int $count, mixed $value)
- `Chức năng:` Tạo một mảng mới với tất cả các phần tử có cùng giá trị.
- `Tham số:`
    - `$start_index`: Chỉ số bắt đầu của mảng.
    - `$count`: Số lượng phần tử.
    - `$value`: Giá trị của các phần tử.
- `Trả về:` Mảng mới.
- `Ví dụ:`
```php
$filled_array = array_fill(0, 5, 'hello');
print_r($filled_array); // Output: Array ( [0] => hello [1] => hello [2] => hello [3] => hello [4] => hello )
```

#### 10. array_filter(array $array, ?callable $callback, int $mode)
- `Chức năng:` Lọc các phần tử trong mảng dựa trên một hàm callback.
- `Tham số:`
    - `$array`: Mảng cần lọc.
    - `$callback`: Hàm callback để kiểm tra mỗi phần tử.
    - `$mode`: Kiểu lọc (ARRAY_FILTER_USE_KEY, ARRAY_FILTER_USE_BOTH).
- `Trả về:` Mảng mới chứa các phần tử thỏa mãn điều kiện.
- `Ví dụ:`
```php
$numbers = [1, 2, 3, 4, 5];
$even_numbers = array_filter($numbers, function($number) {
    return $number % 2 === 0;
});
print_r($even_numbers); // Output: Array ( [1] => 2 [3] => 4 )
```

#### 11. array_flip(array $array)
- `Chức năng:` Đảo ngược khóa và giá trị của một mảng.
- `Tham số:`
    - `$array`: Mảng cần đảo ngược.
- `Trả về:` Mảng mới với khóa và giá trị đổi chỗ.
- `Ví dụ:`
```php
$array = ['a' => 1, 'b' => 2];
$flipped = array_flip($array);
print_r($flipped); // Output: Array ( [1] => a [2] => b )
```

#### 12. array_intersect(array $array, array ...$arrays)
- `Chức năng:` Tìm các phần tử xuất hiện trong tất cả các mảng.
- `Tham số:` Tương tự như `array_diff`.
- `Trả về:` Một mảng chứa các phần tử chung.
- `Ví dụ:`
```php
$array1 = [1, 2, 3];
$array2 = [2, 4, 5];
$result = array_intersect($array1, $array2);
print_r($result); // Output: Array ( [0] => 2 )
```

#### 13. array_map(?callable $callback, array $array, array ...$arrays)
- `Chức năng:` Áp dụng một hàm lên từng phần tử của một hoặc nhiều mảng.
- `Tham số:`
    - `$callback`: Hàm callback để xử lý mỗi phần tử.
    - `$array`: Mảng đầu tiên.
    - `...$arrays`: Các mảng còn lại (nếu có).
- `Trả về:` Một mảng mới chứa kết quả của việc áp dụng hàm callback.
- `Ví dụ:`
```php
$numbers = [1, 2, 3];
$squares = array_map(function($number) {
    return $number - $number;
}, $numbers);
print_r($squares); // Output: Array ( [0] => 1 [1] => 4 [2] => 9 )
```

#### 14. array_key_exists(string|int $key, array $array)
- `Chức năng:` Kiểm tra xem một khóa có tồn tại trong mảng hay không.
- `Tham số:`
    - `$key`: Khóa cần kiểm tra.
    - `$array`: Mảng.
- `Trả về:` True nếu khóa tồn tại, false nếu không.
- `Ví dụ:`
```php
$array = ['name' => 'John'];
if (array_key_exists('name', $array)) {
    echo "Key 'name' exists";
}
```

#### 15. array_keys(array $array)
- `Chức năng:` Trả về một mảng chứa tất cả các khóa của một mảng.
- `Tham số:` `$array`: Mảng.
- `Trả về:` Mảng chứa các khóa.
- `Ví dụ:`
```php
$array = ['name' => 'John', 'age' => 30];
$keys = array_keys($array);
print_r($keys); // Output: Array ( [0] => name [1] => age )
```

#### 16. array_merge(array ...$arrays)
- `Chức năng:` Trộn nhiều mảng thành một mảng mới.
- `Tham số:` `...$arrays`: Các mảng cần trộn.
- `Trả về:` Mảng mới.
- `Ví dụ:`
```php
$array1 = [1, 2];
$array2 = [3, 4];
$result = array_merge($array1, $array2);
print_r($result); // Output: Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 )
```
