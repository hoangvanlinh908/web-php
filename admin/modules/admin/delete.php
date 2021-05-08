
<?php  

        $open = "admin";
        require_once __DIR__."/../../autoload/autoload.php";
        $id= intval(getInput('id'));



        $daleteAdmin = $db->fetchID("admin",$id);
        if (empty($daleteAdmin)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("admin");
        }




          $num = $db->delete("admin",$id);
          if ($num > 0)
           {

          $_SESSION['success']="delete thanh công";
                      redirectAdmin("admin");
          }
          else {
            $_SESSION['error']="delete thất bại";
                      redirectAdmin("admin");
      
            }

  ?>



