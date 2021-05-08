<?php 
 require_once __DIR__. "/autoload/autoload.php" ; 
_debug($_SESSION['cart']);

 if ( !isset($_SESSION['name_id']))
 {
    echo "<script> alert('bạn phải đăng nhập mới thực hiện chức năng này');location.href='index.php' </script>";
    
}
 $id= intval(getInput('id')); 
    	

 $product = $db->fetchID("product",$id);
 if (!isset($_SESSION['cart'][$id])) {
 	$_SESSION['cart'][$id]['name'] = $product['name'];
 	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
 
 	$_SESSION['cart'][$id]['qty'] = 1;
 		$_SESSION['cart'][$id]['price'] = ((100- $product['sale'])* $product['price'])/100;

 }	
 else{

 	$_SESSION['cart'][$id]['qty'] += 1;
 }
 echo "<script> alert('thêm giỏ hàng thành công');location.href='giohang.php'</script>";


?>