<?php require_once __DIR__. "/autoload/autoload.php" ; 
$id= intval(getInput('id')); 
    	

 $product = $db->fetchID("product",$id);
    
 		
 		 $cate = intval($product['category_id']);

 		 $sql = "SELECT * FROM product WHERE category_id = $cate ORDER BY ID DESC LIMIT 4 ";
 		 $sanphamkemtheo = $db->fetchsql($sql);
        ?>

    <?php require_once __DIR__. "/layouts/header.php" ; ?>
      <div class="col-md-9 bor">
                        

                       
                        <section class="box-main1" >
                            <div class="col-md-6 text-center">
                                <img src="<?php echo uploads() ?>product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" data-zoom-image="images/16-270x270.png">
                                
                                <ul class="text-center bor clearfix" id="imgdetail">
                                    <li>
                                        <img src="<?php echo base_url() ?>/public/frontend/images/2.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                       <img src="<?php echo base_url() ?>/public/frontend/images/2.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url() ?>/public/frontend/images/3.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url() ?>/public/frontend/images/4.png" class="img-responsive pull-left" width="80" height="80">
                                    </li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
                               <ul id="right">
                                    <li><h3><?php echo $product['name'] ?></h3></li>
                                    <li><p> sale <?php echo $product['sale'] ?></p></li>
                                    <li><p> Sile L</p></li>
                                    <li><p> màu nâu</p></li>


                                    <li><p><strike class="sale">19.000.000 đ</strike> <b class="price"><?php echo $product['price'] ?></b</li>
                                    <li><a href="" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></li>
                               </ul>
                            </div>

                        </section>
                        <div class="col-md-12">
							                        	 <div class="showitem">
							            <?php foreach ($sanphamkemtheo as  $item) : ?>
							            <div class="col-md-3 item-product bor">
							                <a href="chitiet.php?id=<?php echo $item['id'] ?>">
							                <img src="<?php echo uploads() ?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
							                </a>
							                <div class="info-item">
							                    <a href=""><?php echo $item['name'] ?></a>
							                    <p><strike class="sale"><?php echo $item['sale'] ?> đ</strike> <b class="price"><?php echo $item['price'] ?> đ</b></p>
							                </div>
							                <div class="hidenitem" style="display: none;">
							                    <p><a href="chitiet.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
							                    <p><a href=""><i class="fa fa-heart"></i></a></p>
							                    <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
							                </div>
							            </div>
							             <?php endforeach ?>
      										  </div>
                        </div>



      </div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                