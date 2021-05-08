
<?php  

        $open = "category";
        require_once __DIR__."/../../autoload/autoload.php";
        $id= intval(getInput('id'));



        $EditCategory = $db->fetchID("category",$id);
        if (empty($EditCategory)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("category");
        }




        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
           $data=
           [
            "name" => postInput('name'),
            "slug"=> to_slug(postInput("name"))
          
           ];
           $error =[];
           if(postInput('name') == '')
           {
              $error['name'] ="Mời bạn nhập đầy đủ tên danh mục";

           }
           //error trong co nghia khong loi 
         if(empty($error))
         {
              if ($EditCategory['name'] != $data['name'])
               {
                        if (count($isset) > 0) 
                         {
                             $_SESSION['error'] = " tên danh mục đã tồn tại !";
                         }
                     
                        else
                        {
                               $id_update = $db ->update("category",$data,array("id"=> $id));
                           if($id_update >0)
                           {
                            $_SESSION['success']="cập nhập thành công";
                            redirectAdmin("category");
                           }
                           else{
                            $_SESSION['error']="dữ liệu không thay đổi";
                            redirectAdmin("category");
                         
                                }
                          }
              }
             else{
              }
                $id_update = $db ->update("category",$data,array("id"=> $id));
               if($id_update >0)
               {
                $_SESSION['success']="cập nhập thành công";
                redirectAdmin("category");
               }
               else{
                $_SESSION['error']="dữ liệu không thay đổi";
                redirectAdmin("category");
     
               }
         }
       }
     
  ?>

<?php require_once __DIR__. "/../../layouts/header.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Thêm mới</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh mục</li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ol>
                        <div class="clearfix"></div>
                         <?php require_once __DIR__. "/../../../partials/notification.php" ; ?>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="POST">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" placeholder="Tên danh mục" name="name" value="<?php echo $EditCategory['name'] ?>">
                                            <?php 
                                             if (isset($error['name'])): ?> 
                                               
                                              <p class="text-danger">  <?php  echo $error['name'] ?> </p>


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
