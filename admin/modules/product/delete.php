
<?php  

        $open = "product";
        require_once __DIR__."/../../autoload/autoload.php";
        $id= intval(getInput('id'));



        $Editproduct = $db->fetchID("product",$id);
        if (empty($Editproduct)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("product");
        }




          $num = $db->delete("product",$id);
          if ($num > 0)
           {

          $_SESSION['success']="delete thanh công";
                      redirectAdmin("product");
          }
          else {
            $_SESSION['error']="delete thất bại";
                      redirectAdmin("product");
      
            }

  ?>



