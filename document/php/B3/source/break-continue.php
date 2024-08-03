<?php
for ($i = 1; $i <= 10; $i++) {
    if ($i == 5) {
        echo "Tôi đã lặp đến lần thứ 5, tôi sẽ ngưng vòng lặp";
        break;
    }
    echo $i . " <br>";
}

echo "<hr>";

for ($i = 1; $i <= 10; $i++) {
    if ($i % 2 == 0) {
        echo "#i chia hết cho 2, tôi sẽ bỏ qua các thao tác còn lại và tiếp tục với #i mới <br>";
        continue;
    }
    echo "Đây là số : $i <br>";
}
