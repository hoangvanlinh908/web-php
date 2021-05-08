<?php 
  require_once __DIR__."/../../autoload/autoload.php";

 $id= intval(getInput('id'));
        $Edittran = $db->fetchID("transaction",$id);
        if (empty($Edittran)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("transaction");
        }

        if ($Edittran['status'] == 1 ) {
        	 $_SESSION['error'] =" Đơn hàng đã được xử lý";
        	   redirectAdmin("transaction");
        }
		$status=1;
 
       $update = $db->update("transaction",array("status" => $status),array("id" => $id));
       if($update >0)
               {
               	 $_SESSION['success']="cập nhập thành công";
               	$sql =" SELECT product_id, qty FROM orders where transaction_id = $id ";
               	$order = $db->fetchsql($sql);
               
                
             foreach ($order as $item) {
             	$idproduct = intval($item['product_id']);
             	$product =$db->fetchID("product",$idproduct);
             	$number = $product['number'] - $item['qty'];
             	$up_pro = $db->update("product",array("number"=>$number,"pay"=>$product['pay']+1),array("id"=>$idproduct));
             }
           
                redirectAdmin("transaction");
               }
               else{
                $_SESSION['error']="dữ liệu không thay đổi";
                redirectAdmin("transaction");
     
               }	










?>