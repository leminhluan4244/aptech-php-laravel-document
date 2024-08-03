<?php
// Biến global để lưu trữ tổng số lượng sản phẩm trong giỏ hàng
$globalCartQuantity = 0;

function addToCart($product_id, $quantity) {
  // Biến local để lưu trữ số lượng sản phẩm được thêm vào giỏ hàng
  $localQuantity = $quantity;

  // Cập nhật số lượng sản phẩm trong giỏ hàng global
  global $globalCartQuantity;
  $globalCartQuantity = $globalCartQuantity + $localQuantity;
}

// Thêm 2 sản phẩm A1 vào giỏ hàng
addToCart('A1', 2);
echo $globalCartQuantity;
echo '<hr>';

// Thêm 3 sản phẩm B2 vào giỏ hàng
addToCart('B2', 3);
echo $globalCartQuantity;