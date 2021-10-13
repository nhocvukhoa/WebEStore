<?php
session_start();
include dirname(__DIR__) . '..\AdminLayout\aside.php';
include dirname(__DIR__) . '..\AdminLayout\header.php';

use App\Models\Category;

$cate = new Category();
$a =  $cate->getCategory();

?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Categories</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content : space-between; align-items: center;">
                        <strong class="card-title mb-0">Categories</strong>
                        <button type="button" name="add-category" class="btn btn-info" data-toggle="modal" data-target="#addCategory" style="border-radius: 10px; padding: 10px 20px;">THÊM</button>
                    </div>
                    <div class="card-body" style="position: relative;">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Mã danh mục</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả danh mục</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($a as $item) {
                                ?>
                                    <tr>
                                        <td><?= $item['id'] ?></td>
                                        <td><?= $item['cat_title'] ?></td>
                                        <td><?= $item['cat_description'] ?></td>
                                        <td>
                                            <a href="/BanHang/public/Admin/update-category.php/<?= $item['id'] ?>" class="btn btn-success" data-toggle="modal" data-target="#updateCategory<?= $item['id']?>" data-backdrop="false">SỬA</a>
                                        </td>
                                        <td>
                                            <a href="/Banhang/public/Admin/delete-category.php/<?= $item['id'] ?>" class="btn btn-danger" >XÓA</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="updateCategory<?= $item['id']?>" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Cập nhật danh mục</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="/BanHang/public/Admin/update-category.php/<?php echo $item['id']?>" method="post">
													<div class="modal-body">
														<div class="form-group">
															<label>Tên danh mục :</label>
															<input type="text" name="cat_title" class="form-control" placeholder="Nhập tên sản phẩm..." value="<?= $item['cat_title']?>">
														</div>
														<div class="form-group">
															<label>Mô tả danh mục :</label>
															<input type="text" name="cat_description" class="form-control" placeholder="Nhập giá sản phẩm..." value="<?= $item['cat_description']?>">
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="saveCategory-product" class="btn btn-primary">Lưu</button>
														<button type="button" name="destroy" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
													</div>
												</form>
											</div>
										</div>
									</div>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/BanHang/public/Admin/add-category.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tên danh mục: </label>
                        <input type="text" name="cat_title" class="form-control" placeholder="Nhập title:">
                    </div>
                    <div class="form-group">
                        <label>Mô tả danh mục</label>
                        <input type="text" name="cat_description" class="form-control" placeholder="Nhập description:">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" name="save-category" class="btn btn-primary">Lưu</button>
                    <button type="button" name="destroySave" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="updateCategory" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhật danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/BanHang/public/Admin/update-category.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="cat_title" class="form-control" placeholder="Nhập title:">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="cat_description" class="form-control" placeholder="Nhập description:">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="delete-category" class="btn btn-primary">Đồng ý</button>
                    <button type="submit" name="destroySave" class="btn btn-secondary">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Right Panel -->


<script src="/BanHang/public/Admin/vendors/jquery/dist/jquery.min.js"></script>
<script src="/BanHang/public/Admin/vendors/popper.js/dist/umd/popper.min.js"></script>
<script src="/BanHang/public/Admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/BanHang/public/Admin/assets/js/main.js"></script>


<script src="/BanHang/public/Admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/BanHang/public/Admin/vendors/jszip/dist/jszip.min.js"></script>
<script src="/BanHang/public/Admin/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="/BanHang/public/Admin/vendors/pdfmake/build/vfs_fonts.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/BanHang/public/Admin/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="/BanHang/public/Admin/assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>