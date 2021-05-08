<?php 

  require_once __DIR__. "/autoload/autoload.php" ;



if ( ! isset($_SESSION['cart']) ||	 count($_SESSION['cart']) == 0) {
	 echo "<script> alert('không có sản phẩm trong giỏ hàng');location.href='index.php'</script>";
}

?>


    <?php require_once __DIR__. "/layouts/header.php" ; 
    $sum= 0; ?>
      <div class="col-md-9 bor">
                        
      					 <?php  if(isset($_SESSION['success'])) :?>
                            <div class="alert alert-success">
                            <strong>SUCCESS</strong><?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                       			 </div>	
                             <?php endif ?>
                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Giỏ hàng của bạn </a> </h3>
                             <table class="table table-hover">
								    <thead>
								      <tr>
								        <th>STT</th>
								        <th>Tên sản phẩm</th>
								        <th>Hình ảnh</th>
								        <th>Số lượng</th>
								        <th>Giá</th>
								        <th>Tổng tiền</th>
								         <th>Thao tác</th>

								      </tr>
								    </thead>
								    <tbody id="tbody">
								    		<?php $stt =1 ;foreach ($_SESSION['cart'] as $key => $item): ?>
								    			
								    		<tr>
                                    	 	 <td><?php echo $stt ?></td>
                                    	   	<td><?php echo $item['name'] ?></td>
                                    	    <td><img src="<?php echo uploads()?>product/<?php echo $item['thunbar'] ?>" width="80px" height="80px"></td>	
                                    	     <td>
                                    	     	<input type="number" id="qty" class="from-control qty" name="qty" value="<?php echo $item['qty'] ?>"  min="0">
                                    	     </td>
                                    	     <td><?php echo $item['price'] ?></td>
                                    	     <td><?php echo $item['price'] * $item['qty']?></td>

                                      <td>
                                          <a class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>><i class="fa fa-refresh"></i> Update</a>
                                         <a class="btn btn-xs btn-danger" href="xoa.php?key=<?php echo $key ?>"><i class="fa fa-remove"></i> Remove</a>
                                      </td>
								     		 </tr>
								     		 <?php $sum = $sum + $item['price'] * $item['qty'] ; $_SESSION['tongtien'] = $sum ;?>
								     
								        <?php $stt++; endforeach ?>

								      
								    </tbody>
								  </table>
								  <div class="col-md-5 pull-right">
								  	<ul class="list-group">
								  		<li class="list-group-item">
								  			<h3>Thông tin đơn hàng</h3>
								  			
								  		</li>
								  		<li class="list-group-item">
								  			<span class="badge"><?php echo $_SESSION['tongtien'] ?></span>
								  			Số tiền
								  			
								  		</li>
								  		<li class="list-group-item">
								  			<span class="badge">10%</span>
								  			Thuế VAT
								  			
								  		</li>
								  		
								  		<li class="list-group-item">
								  			<span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien']*110/100; echo $_SESSION['total']?></span>
								  			tổng tiền thanh toán
								  			
								  		</li>
								  		<li class="list-group-item">
								  			<a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a>
								  			<a href="thanhtoan.php"class="btn btn-success">Thanh toán</a>
								  			
								  		</li>

								  	</ul>
								  </div>
                        </section>

      </div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                