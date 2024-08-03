<?php

require 'vendor/autoload.php';

use Vietnam\Dog as DogInVietNam;
use Japan\Dog as DogInJapan;

$dog1 = new DogInVietNam();
$dog1->mostPopularDogDreed(); // Sẽ in ra: Giống chó phổ biến nhất là chó Cỏ

$dog2 = new DogInJapan();
$dog2->mostPopularDogDreed(); // Sẽ in ra: Giống chó phổ biến nhất là chó Shiba