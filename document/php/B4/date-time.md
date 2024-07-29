### Hàm time()
- `Tham số:` Không có tham số nào.
- `Trả về:` Một số nguyên biểu diễn số giây kể từ 1/1/1970 (giờ GMT).

### Hàm date(string $format, ?int $timestamp = null)
- `Tham số:`
    - `format`: Một chuỗi chứa các mã định dạng để chỉ định cách hiển thị ngày giờ.
    - `timestamp` (tùy chọn): Một số nguyên biểu diễn timestamp (mặc định là thời gian hiện tại).
- `Trả về:` Một chuỗi chứa ngày giờ được định dạng theo `format`.

Ví dụ minh họa:

| Hàm | Tham số | Trả về | Giải thích |
|---|---|---|---|
| `time()` |  | 1687256321 | Trả về timestamp hiện tại |
| `date("Y-m-d")` | "Y-m-d" | 2023-10-20 | Trả về ngày hôm nay theo định dạng năm-tháng-ngày |
| `date("H:i:s", time() + 3600)` | "H:i:s", time() + 3600 | 15:32:01 | Trả về giờ hiện tại cộng thêm 1 giờ |

`Bảng các mã định dạng thường dùng trong hàm date():`

| Mã | Ý nghĩa | Ví dụ |
|---|---|---|
| Y | Năm bốn chữ số | 2023 |
| m | Tháng (01-12) | 10 |
| d | Ngày (01-31) | 20 |
| H | Giờ 24h (00-23) | 14 |
| i | Phút (00-59) | 32 |
| s | Giây (00-59) | 01 |
| A | AM hoặc PM | AM |
| a | am hoặc pm | am |
| l | Tên đầy đủ của ngày trong tuần | Sunday |
| D | Tên viết tắt của ngày trong tuần | Sun |
| M | Tên viết tắt của tháng | Jan |
| F | Tên đầy đủ của tháng | January |

`Ví dụ khác:`

```php
$birthday = strtotime("1990-01-01");
echo date("d/m/Y", $birthday); // Output: 01/01/1990
echo "<hr>";
// Tính số ngày từ ngày sinh đến nay
$today = time();
$diff = $today - $birthday;
echo "Bạn đã sống được " . floor($diff / 86400) . " ngày";
```

`Lưu ý:`

- `Timestamp:` Là một số nguyên biểu diễn một điểm cụ thể trong thời gian, thường được tính bằng số giây kể từ 1/1/1970.
- `Múi giờ:` Các hàm `date()` và `time()` mặc định sử dụng múi giờ của hệ thống. Bạn có thể sử dụng hàm `date_default_timezone_set()` để thay đổi múi giờ.
