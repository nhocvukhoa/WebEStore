<?php
session_start();
include dirname(__DIR__) . '..\AdminLayout\aside.php';
include dirname(__DIR__) . '..\AdminLayout\header.php';

use App\Models\Product;

$pro = new Product();
$a =  $pro->getProduct();
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
					<li class="active">Product</li>
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
						<strong class="card-title mb-0">Product</strong>
						<a href="#" name="add-category" class="btn btn-info" data-toggle="modal" data-target="#addProduct" style="border-radius: 10px; padding: 10px 20px;">THÊM</a>
					</div>
					<div class="card-body" style="position: relative;">
						<table id="bootstrap-data-table-export" class="table table-striped table-bordered text-center">
							<thead>
								<tr>
									<th>Mã sản phẩm</th>
									<th>Tên sản phẩm</th>
									<th>Giá bán</th>
									<th>Số lượng</th>
									<th>Giá giảm</th>
									<th>Mô tả chi tiết sản phẩm</th>
									<th>Thông số kĩ thuật</th>
									<th>Hình ảnh</th>
									<th>Sửa</th>
									<th>Xóa</th>
								</tr>
							</thead>
							<tbody style="text-align:center;">
								<?php
								foreach ($a as $item) {
								?>
									<tr>
										<td><?= $item['id'] ?></td>
										<td><?= $item['pro_title'] ?></td>
										<td><?= $item['pro_price'] ?></td>
										<td><?= $item['pro_quantity'] ?></td>
										<td><?= $item['pro_discount'] ?></td>
										<td><?= $item['pro_description'] ?></td>
										<td><?= $item['pro_specification'] ?></td>
										<td><?= '<img src="/BanHang/public/assets/img/' . $item['pro_img'] . '" height="100px;">' ?></td>
										<td><a href="/BanHang/public/Admin/update-product.php/<?= $item['id'] ?>" class="btn btn-success" data-toggle="modal" data-target="#updateProduct<?= $item['id']?>" data-backdrop="false">SỬA</a></td>
										<td><a href="/Banhang/public/Admin/delete-product.php/<?= $item['id'] ?>" class="btn btn-danger" >XÓA</a></td>
									</tr>
									<div class="modal fade" id="updateProduct<?= $item['id']?>" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<form action="/BanHang/public/Admin/update-product.php/<?php echo $item['id']?>" method="post">
													<div class="modal-body">
														<div class="form-group">
															<label>Tên sản phẩm :</label>
															<input type="text" name="pro_title" class="form-control" placeholder="Nhập tên sản phẩm..." value="<?= $item['pro_title']?>">
														</div>
														<div class="form-group">
															<label>Giá sản phẩm :</label>
															<input type="text" name="pro_price" class="form-control" placeholder="Nhập giá sản phẩm..." value="<?= $item['pro_price']?>">
														</div>
														<div class="form-group">
															<label>Số lượng :</label>
															<input type="text" name="pro_quantity" class="form-control" placeholder="Nhập số lượng sản phẩm..." value="<?= $item['pro_quantity']?>">
														</div>
														<div class="form-group">
															<label>Giá giảm :</label>
															<input type="text" name="pro_discount" class="form-control" placeholder="Nhập giá giảm..." value="<?= $item['pro_discount']?>">
														</div>
														<div class="form-group">
															<label>Mô tả chi tiết sản phẩm :</label>
															<input type="text" name="pro_description" class="form-control" placeholder="Nhập mô tả..." value="<?= $item['pro_description']?>">
														</div>
														<div class="form-group">
															<label>Thông số kĩ thuật :</label>
															<input type="text" name="pro_specification" class="form-control" placeholder="Nhập thông số..." value="<?= $item['pro_specification']?>">
														</div>
														<div class="form-group">
															<label>Upload ảnh sản phẩm :</label>
															<input type="file" name="pro_img" id="images" class="form-control">
														</div>
													</div>
													<div class="modal-footer">
														<button type="submit" name="saveUpdate-product" class="btn btn-primary">Lưu</button>
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

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/BanHang/public/Admin/add-product.php" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label>Tên sản phẩm :</label>
						<input type="text" name="pro_title" class="form-control" placeholder="Nhập tên sản phẩm...">
					</div>
					<div class="form-group">
						<label>Giá sản phẩm :</label>
						<input type="text" name="pro_price" class="form-control" placeholder="Nhập giá sản phẩm...">
					</div>
					<div class="form-group">
						<label>Số lượng :</label>
						<input type="text" name="pro_quantity" class="form-control" placeholder="Nhập số lượng sản phẩm...">
					</div>
					<div class="form-group">
						<label>Giá giảm :</label>
						<input type="text" name="pro_discount" class="form-control" placeholder="Nhập giá giảm...">
					</div>
					<div class="form-group">
						<label>Mô tả chi tiết sản phẩm :</label>
						<input type="text" name="pro_description" class="form-control" placeholder="Nhập mô tả...">
					</div>
					<div class="form-group">
						<label>Thông số kĩ thuật :</label>
						<input type="text" name="pro_specification" class="form-control" placeholder="Nhập thông số...">
					</div>
					<div class="form-group">
						<label>Upload ảnh sản phẩm :</label>
						<input type="file" name="pro_img" id="images" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="saveAdd-product" class="btn btn-primary">Lưu</button>
					<button type="button" name="close" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="removeProduct" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Xóa sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/BanHang/public/Admin/delete-product.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Bạn có muốn xóa sản phẩm này không?</label>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="delete-product" class="btn btn-primary">Xóa</button>
					<button type="button" name="destroy" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-label="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Cập nhật sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="/BanHang/public/Admin/update-product.php" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label>Tên sản phẩm :</label>
						<input type="text" name="pro_title" class="form-control" placeholder="Nhập tên sản phẩm...">
					</div>
					<div class="form-group">
						<label>Giá sản phẩm :</label>
						<input type="text" name="pro_price" class="form-control" placeholder="Nhập giá sản phẩm...">
					</div>
					<div class="form-group">
						<label>Số lượng :</label>
						<input type="text" name="pro_quantity" class="form-control" placeholder="Nhập số lượng sản phẩm...">
					</div>
					<div class="form-group">
						<label>Giá giảm :</label>
						<input type="text" name="pro_discount" class="form-control" placeholder="Nhập giá giảm...">
					</div>
					<div class="form-group">
						<label>Mô tả chi tiết sản phẩm :</label>
						<input type="text" name="pro_description" class="form-control" placeholder="Nhập mô tả...">
					</div>
					<div class="form-group">
						<label>Thông số kĩ thuật :</label>
						<input type="text" name="pro_specification" class="form-control" placeholder="Nhập thông số...">
					</div>
					<div class="form-group">
						<label>Upload ảnh sản phẩm :</label>
						<input type="file" name="pro_img" id="images" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" name="saveUpdate-product" class="btn btn-primary">Lưu</button>
					<button type="button" name="destroy" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
				</div>
			</form>
		</div>
	</div>
</div> -->

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