<?php
    // Mảng chỉ mục
	$mobile = array("HTC", "Nokia", "SungSung", "LG", "Blackberry");
	echo "Giá trị của phần tử mảng thứ 3 là: " . $mobile[2];

    echo "<hr>";

    // Mảng kết hợp
	$big_tech = array(
		'search' => 'Google',
		'video' => 'Youtube',
		'social' => 'Facebook',
		'software' => 'Microsoft'
	);
	echo "Ông lớn về lĩnh vực phần mềm là: " . $big_tech['software'];

    echo "<hr>";

    // Mảng đa chiều 
	$profile = array(
		'name' => 'Lê Minh Luân',
		'hobbies' => array(
			'xem phim',
			'nghe nhạc',
			'chăm sóc cây cảnh',
			array(
				'game_1' => 'Khủng long bắn trứng',
				'game_2' => 'Xếp gạch'
			)
		),
		'city' => 'Cần Thơ'
	);

    var_dump($profile);

?>
