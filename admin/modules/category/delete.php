
<?php  

        $open = "category";
        require_once __DIR__."/../../autoload/autoload.php";
        $id= intval(getInput('id'));



        $EditCategory = $db->fetchID("category",$id);
        if (empty($EditCategory)) {
          $_SESSION['error'] =" dữ liệu không tồn tại";
          redirectAdmin("category");
        }


        $is_product = $db->fetchOne("product","category_id = $id  ");
        if ($is_product == NULL) {

          $num = $db->delete("category",$id);
          if ($num > 0)
           {

          $_SESSION['success']="delete thanh công";
                      redirectAdmin("category");
          }
          else {
            $_SESSION['error']="delete thất bại";
                      redirectAdmin("category");
      
            }
            
          }  

         else {
            $_SESSION['error']="danh mục có sản phẩm";
                      redirectAdmin("category");
      
            }


  ?>



