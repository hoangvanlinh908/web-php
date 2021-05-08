
<?php  

        $open = "user";
        require_once __DIR__."/../../autoload/autoload.php";
        $id= intval(getInput('id'));



        $daleteuser = $db->fetchID("user",$id);
        if (empty($daleteuser)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("user");
        }




          $num = $db->delete("user",$id);
          if ($num > 0)
           {

          $_SESSION['success']="delete thanh công";
                      redirectAdmin("user");
          }
          else {
            $_SESSION['error']="delete thất bại";
                      redirectAdmin("user");
      
            }

  ?>



