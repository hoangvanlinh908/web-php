<?php require_once __DIR__. "/autoload/autoload.php" ; 

		$data=
           [
            
            'email'=> postInput("email"),
            'password'=> (postInput("password"))
           
           
           ];
           $error = [];
          if($_SERVER['REQUEST_METHOD'] == "POST")

        {

        	if($data['email'] == ''){
        		$error['email'] ="email không được để trống !";

        	}
        	
        	if($data['password'] == ''){
        		$error['password'] ="password không được để trống !";

        	}	

        	if(empty($error))
        	{
        		$is_check = $db->fetchOne("user","email ='".$data['email']."' AND password = '".MD5($data['password'])."' ");
        	
        		
        		if ($is_check != NULL) {
        			$_SESSION['name_user'] = $is_check['name'];
        			$_SESSION['name_id'] = $is_check['id'];
        			echo "<script> alert('đăng nhập thành công');location.href='index.php' </script>";
        			
        		} else {
        			$_SESSION['error'] = "Đăng nhập thất bại";
        		}
        		
        			
        		
        	}
        	
        }
        	


 ?>


    <?php require_once __DIR__. "/layouts/header.php" ; ?>
      <div class="col-md-9 bor">
                        

                        <section class="box-main1">
                            <h3 class="title-main" style="text-align: center;"><a href="javascript:void(0)"> Đăng nhập </a> </h3>
                            <?php  if(isset($_SESSION['success'])) :?>
                            <div class="alert alert-success">
                            <strong>SUCCESS</strong><?php echo $_SESSION['success'] ; unset($_SESSION['success']) ?>
                       			 </div>	
                             <?php endif ?>
                             <?php  if(isset($_SESSION['error'])) :?>
                            <div class="alert alert-danger">
                            <strong>Error</strong><?php echo $_SESSION['error'] ; unset($_SESSION['error']) ?>
                       			 </div>	
                             <?php endif ?>
                             
                         
								  <form action="" class="col-md-6 " method="POST">
								  <div class="form-group">
								    <label for="email">Email address:</label>
								    <input type="email" name="email" class="form-control" placeholder="Enter email" id="email">
								    <?php if(isset($error['email'])): ?>
								    	<p class="text-danger"><?php echo $error['email'] ?></p>
								    <?php endif ?>
								  </div>
								  <div class="form-group">
								    <label for="pwd">Password:</label>
								    <input type="password" name="password" class="form-control" placeholder="Enter password" id="pwd">
								    <?php if(isset($error['password'])): ?>
								    	<p class="text-danger"><?php echo $error['password'] ?></p>
								    <?php endif ?>	
								  </div>
									
								  <button type="submit" class="btn btn-primary">Đăng nhập</button>
								    
								</form>
								
                            
                            
                        </section>

                       
      </div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                