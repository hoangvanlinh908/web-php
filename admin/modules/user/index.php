
<?php 
   $open = "user";
require_once __DIR__. "/../../autoload/autoload.php" ; 
if (isset($_GET['page'])) 
{
    $p = $_GET['page'];
}
else{
    $p = 1;
}
$sql = "SELECT user.* FROM user ORDER BY id DESC ";
$user = $db->fetchJone('user',$sql,$p,4,true);

if(isset($user['page']))
{
    $sotrang = $user['page'];
    unset($user['page']);
}



?>

<?php require_once __DIR__. "/../../layouts/header.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh sách thành viên </h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh sách thành viên</li>
                        </ol>
                        <div class="clearfix"></div>
                        <?php require_once __DIR__. "/../../../partials/notification.php" ; ?>
                  
                        <div class="card mb-4">
                          <div class="col-sm-12">
                          

                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                       
                                       
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $stt = 1;foreach ($user as $item) : ?>
                                    <tr>
                                        <td ><?php echo $stt ?></td>
                                        <td><?php echo $item['name'] ?></td>
                                        <td><?php echo $item['email'] ?></td>
                                         <td><?php echo $item['phone'] ?></td>
                                       
                                     
                                       

                                       
                                          
                                        
                                      <td>
                                          
                                         <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id']?>"><i class="fa fa-times"></i> xóa</a>
                                      </td>
                                       
                                    </tr>
                                    <?php $stt++ ;endforeach ?>
                                </tbody>
                            </table>
    <div class="pull-right">
        <nav aria-label="Page navigation" class="clearfix">
                            <ul class="pagination">
                                <li >
                                    <a class="page-link" href="" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php for ($i = 1; $i <= $sotrang ; $i++) : ?>
                                    <?php 
                                    if (isset($_GET['page']))
                                     {
                                       $p = $_GET['page'];
                                    } 
                                    else
                                    {
                                        $p=1;
                                    }
                                    ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : ''  ?>">
                                        <a class="page-link" href="?page=<?php echo $i ;?>"><?php echo $i; ?></a>
                                        
                                    </li>
                                <?php endfor; ?>
                                <li >
                                    <a class="page-link" href="" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
        
    </div>
                            

</div>
                        </div>
                        
                    </div>
                </main>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>          
