
<?php 
require_once __DIR__. "/autoload/autoload.php" ; 


$category = $db->fetchAll("category") ;

?>

<?php require_once __DIR__. "/layouts/header.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">xin chao den voi trang chu admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Static Navigation</li>
                        </ol>
                        
                        
                    </div>
                </main>
 <?php require_once __DIR__. "/layouts/footer.php" ; ?>          
