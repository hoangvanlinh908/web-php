<?php require_once __DIR__. "/autoload/autoload.php" ; 

    if (isset($_SESSION['name_id']))
 {
    echo "<script> alert('đang đăng nhập');location.href='index.php' </script>";
    
}

                    

		$data=
           [
            'name' => postInput("name"),
            'email'=> postInput("email"),
            'password'=> (postInput("password")),
             'phone'=> postInput("phone"),
           'address'=> postInput("address")
           
           ];
		$error = [];

        if($_SERVER['REQUEST_METHOD'] == "POST")

        {

        	
        	if($data['name'] == ''){
        		$error['name'] ="tên không được để trống !";

        	}
        	
        	if($data['email'] == ''){
        		$error['email'] ="email không được để trống !";

        	}
            else{
                $is_check = $db->fetchOne("user","email ='".$data['email']."' ");
                if ($is_check != null) {
                    $error['email']=" đã tồn tại";
                  
            }
        }
        	
        	if($data['password'] == ''){
        		$error['password'] ="password không được để trống !";

        	}
        	else{
        		$data['password'] = MD5(postInput("password")); 
        	}
        	
        	if($data['phone'] == ''){
        		$error['phone'] ="phone không được để trống !";

        	}
        	
        	if($data['address'] == ''){
        		$error['address'] ="address không được để trống !";

        	}
        	if(empty($error))
        	{
        		$insert = $db->insert("user",$data);
        		if ($insert >0) {
        			$_SESSION['success'] = " đăng ký thành công mời bạn đăng nhập ";
        			header("location: dangnhap.php");
        			
        		}
        		else{

        			
        		}
        	}
        	

           
         }
      
 ?>

	 


    <?php require_once __DIR__. "/layouts/header.php" ; ?>
      <div class="col-md-9 bor">
                        

                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Đăng ký </a> </h3>
                            <div >
								   <form action="" class=" col-md-6 col-md-offset-3 " method="POST">
								  
								  <div class="form-group">
								    <label for="pwd">Tên thành viên:</label>
								    <input type="text" name="name" class="form-control" placeholder="Enter password"  value="<?php echo $data['name'] ?>">
								    <?php if(isset($error['name'])): ?>
								    	<p class="text-danger"><?php echo $error['name'] ?></p>
								    <?php endif ?>	
								  </div>
								  <div class="form-group">
								    <label for="email">Email:</label>
								    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email" value="<?php echo $data['email'] ?>">
								    <?php if(isset($error['email'])): ?>
								    	<p class="text-danger"><?php echo $error['email'] ?></p>
								    <?php endif ?>
								  </div>

								 <div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" name="password" class="form-control" placeholder="Enter password"  value="<?php echo $data['password'] ?>">
								  	<?php if(isset($error['password'])): ?>
								    	<p class="text-danger"><?php echo $error['password'] ?></p>
								    <?php endif ?>	
								  </div>

								 <div class="form-group">
								    <label for="pwd">phone:</label>
								    <input type="text" name="phone" class="form-control" placeholder="Enter password"  value="<?php echo $data['phone'] ?>">
								  	<?php if(isset($error['phone'])): ?>
								    	<p class="text-danger"><?php echo $error['phone'] ?></p>
								    <?php endif ?>	
								  </div>
								   <div class="form-group">
								    <label for="pwd">Địa chỉ:</label>
								    <input type="text" name="address" class="form-control" placeholder="Enter password"  value="<?php echo $data['address'] ?>">
								    <?php if(isset($error['address'])): ?>
								    	<p class="text-danger"><?php echo $error['address'] ?></p>
								    <?php endif ?>
								  </div>
								
								  <button type="submit" class="btn btn-primary col-md-offset-3">Đăng ký</button>
								  
								</form>
								 </div>
                            
                            
                        </section>
      </div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                