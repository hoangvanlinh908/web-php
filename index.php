<?php 
require_once __DIR__. "/autoload/autoload.php" ; 
$sqlhomecate = "SELECT name , id FROM category WHERE home = 1 ORDER BY updated_at";
$categoryhome = $db->fetchsql($sqlhomecate);
$data = [];
foreach ($categoryhome as $item) {
   $cateId = intval($item['id']);

   $sql = "SELECT * FROM product WHERE category_id = $cateId";
   $producthome = $db->fetchsql($sql);
   $data[$item['name']] = $producthome;

}


 ?>


    <?php require_once __DIR__. "/layouts/header.php" ; ?>
     <div class="col-md-9 bor">
    <section id="slide" class="text-center">
        <img src="<?php echo base_url() ?>/public/frontend/images/slide/banner.jpg?>" width="100%" height="250">
    </section>
    <section class="box-main1">
            <?php foreach($data as $key => $value ) : ?>    
              <h3 class="title-main" style="text-align: center;"><a href=""><?php echo $key ?> </a> </h3>
             <div class="showitem">
            <?php foreach ($value as  $item) : ?>
            <div class="col-md-3 item-product bor" >
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
                    <p><a href="themhang.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                </div>
            </div>
             <?php endforeach ?>
        </div>
         <?php endforeach ?>
    </section>
</div>
    <?php require_once __DIR__. "/layouts/footer.php" ; ?>        
              

                