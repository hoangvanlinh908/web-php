<?php  

        $open = "admin";
        require_once __DIR__."/../../autoload/autoload.php";

   
$data=
           [
            "name" => postInput("name"),
            "email"=> (postInput("email")),
            "phone"=> postInput("phone"),
            "password"=> postInput("password"),
            "address"=> postInput("address"),
            "level"=> postInput("level")
           ];

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
           

           $error =[];
           
           if(postInput('name') == '')
           {
              $error['name'] ="Mời bạn nhập đầy đủ tên danh mục";

           }
           if(postInput('email') == '')
           {
              $error['email'] ="Mời bạn nhập email";

           }
           else{
            $is_check = $db->fetchOne("admin"," email= '".$data['email']."' ");

                if ($is_check != NULL) {
                     $error['email'] =" email đã tồn tại";
                   
                }
           }
           if(postInput('phone') == '')
           {
              $error['phone'] ="Mời bạn nhập phone";

           }
           if(postInput('password') == '')
           {
              $error['password'] ="Mời bạn nhập password";

           }
           if(postInput('address') == '')
           {
              $error['address'] ="Mời bạn nhập address";

           }
           if(postInput('level') == '')
           {
              $error['level'] ="Mời bạn nhập level";

           }
           if($data['password'] != postInput('re_password'))
           {
              $error['password'] ="mật khẩu không khớp";

           }









           //error trong co nghia khong loi 
    if(empty($error))

        {
            
            $id_insert = $db -> insert("admin",$data);
            if($id_insert)
            { 
                        $_SESSION['success']="thêm mới thành công";
                         redirectAdmin("admin");
                 }
                 else {
                    $_SESSION['error']="thêm mới thất bại";
                   
                 }
            }


        
    } 
     
  ?>
    }

<?php require_once __DIR__. "/../../layouts/header.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm mới admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
<li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix"></div>
                         <?php require_once __DIR__. "/../../../partials/notification.php" ; ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                                   
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Họ Và tên</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value="<?php echo $data['name'] ?>">
                                            <?php 
                                             if (isset($error['name'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['name'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="email" name="email"  value="<?php echo $data['email']?>">
                                            <?php 
                                             if (isset($error['email'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['email'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">phone</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="inputEmail3" placeholder="phone" name="phone"  value="<?php echo $data['phone']?>">
                                            <?php 
                                             if (isset($error['phone'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['phone'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputEmail3" placeholder="phone" name="password" >
                                            <?php 
                                             if (isset($error['password'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['password'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">ConfigPassword</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control" id="inputEmail3" placeholder="phone" name="re_password" required="">
                                            <?php 
                                             if (isset($error['re_password'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['re_password'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="xóm 3" name="address" value="<?php echo $data['address']?>">
                                            <?php 
                                             if (isset($error['address'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['address'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Level</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="level">
                                                <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected = 'selected'" : '' ?>>CTV</option>
                                                <option value="2" <?php echo isset($data['level']) && $data['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>
                                            </select>
                                            <?php 
                                             if (isset($error['level'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['level'] ?> </p>


                                             <?php endif ?>
                                           
                                        </div>
                                    </div>
                                    
                                    
                                     
                                    
                                    
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-info">Lưu</button>
                                        </div>
                                    </div>
                            </form>

                        </div>
                        
                    </div>
                </main>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>