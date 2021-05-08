<?php require_once __DIR__. "/autoload/autoload.php" ; 

$user = $db->fetchID("user",intval($_SESSION['name_id']));

  if($_SERVER['REQUEST_METHOD'] == "POST"){

  	$data = 
  	[
	'amount' => $_SESSION['total'],
  	'users_id' => $_SESSION['name_id'],
  	'note' => postInput("note") 
  	];
  	

  	$idtran =$db->insert("transaction",$data);
  	if ($idtran > 0) {
  		foreach ($_SESSION['cart'] as $key => $value) {
  			$data2 = 
  			[
  				'transaction_id' => $idtran,
  				'product_id' => $key ,
  				'qty' => $value['qty'],
  				'price' => $value['price']


  			];
  			$id_insert =$db->insert("orders",$data2);

  		}
  		unset($_SESSION['cart']);
unset($_SESSION['total']);
  		$_SESSION['success'] = "đơn hàng đã được lưu thành công";
  		header("location: thongbao.php");
  	}
  }



 ?>


    <?php require_once __DIR__. "/layouts/header.php" ; ?>
      <div class="col-md-9 bor">
                        

                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Thanh toán đơn hàng</a> </h3>
                            <form action="" class=" col-md-6 col-md-offset-3 " method="POST">
								  
								  <div class="form-group">
								    <label for="pwd">Tên thành viên:</label>
								    <input  readonly="" type="text" name="name" class="form-control" placeholder="Enter password"  value="<?php echo $user['name'] ?>">
								   
								  </div>
								  <div class="form-group">
								    <label for="email">Email:</label>
								    <input readonly=""  type="email" name="email" class="form-control" placeholder="Enter email" id="email" value="<?php echo $user['email'] ?>">
								  
								  </div>

								

								 <div class="form-group">
								    <label for="pwd">phone:</label>
								    <input readonly=""  type="text" name="phone" class="form-control" placeholder="Enter password"  value="<?php echo $user['phone'] ?>">
								  
								  </div>
								   <div class="form-group">
								    <label for="pwd">Địa chỉ:</label>
								    <input  readonly="" type="text" name="address" class="form-control" placeholder="Enter password"  value="<?php echo $user['address'] ?>">
								   
								  </div>
								   <div class="form-group">
								    <label for="pwd">Tổng tiển:</label>
								    <input  readonly="" type="text" name="address" class="form-control" placeholder="Enter password"  value="<?php echo $_SESSION['total'] ?>">
								   
								  </div>
								  <div class="form-group">
								    <label for="pwd">Ghi chú:</label>
								    <input  type="text" name="note" class="form-control" placeholder="Giao hàng tận nới"  value="">
								   
								  </div>
								
								  <button type="submit" class="btn btn-primary col-md-offset-3">Xác nhận</button>
								  
								</form>
                            
                            
                        </section>

      </div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                