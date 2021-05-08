
<?php 
   $open = "category";
require_once __DIR__. "/../../autoload/autoload.php" ; 
$category =$db->fetchAll("category");
?>

<?php require_once __DIR__. "/../../layouts/header.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Danh sách danh mục <a href="add.php" class="btn btn-info">thêm mới</a></h1>

                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Danh Mục</li>
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
                                        <th>Slug</th>
                                        <th>Home</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php $stt = 1;foreach ($category as $item) : ?>
                                    <tr>
                                        <td ><?php echo $stt ?></td>
                                        <td><?php echo $item['name'] ?></td>
                                          <td><?php echo $item['slug'] ?></td>
                                          <td>
                                              <a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-danger' ?>">
                                                <?php echo $item['home'] == 1 ? 'hiển thị' : 'không' ?>
                                                    
                                                </a>
                                          </td>
                                            <td><?php echo $item['created_at'] ?></td>
                                      <td>
                                          <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id']?>"><i class="fa fa-edit"></i> sửa</a>
                                         <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id']?>"><i class="fa fa-times"></i> xóa</a>
                                      </td>
                                       
                                    </tr>
                                    <?php $stt++ ;endforeach ?>
                                </tbody>
                            </table>
    
                            <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>

</div>
                        </div>
                        
                    </div>
                </main>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>          
