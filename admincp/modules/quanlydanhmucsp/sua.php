
<?php
$sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
$query_sua_danhmucsp = mysqli_query($mysqli, $sql_sua_danhmucsp);

if (isset($_POST['sbm'])) {
	$tenloaisp = $_POST['tendanhmuc'];
	$thutu = $_POST['thutu'];

	$sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='" . $tenloaisp . "',thutu='" . $thutu . "' WHERE id_danhmuc='$_GET[iddanhmuc]'";
	mysqli_query($mysqli, $sql_update);
	header('Location:index.php?action=quanlydanhmucsanpham&query=them');
}
?>
<div class="container-fluid">
	<div class="card">
		<div style="background: #66CDAA " class="card-header">
			<h2>Sửa danh mục sản phẩm</h2>
		</div>
		<div class="card-body">
			<form method="POST" enctype="multipart/form-data">
				<?php
				while ($dong = mysqli_fetch_array($query_sua_danhmucsp)) {
				?>
					<div class="form-group">
						<label>Tên danh mục</label>
						<input type="text" name="tendanhmuc" class="form-control" value="<?php echo $dong['tendanhmuc'] ?>">
					</div>


					<div class="form-group">
						<label>Thứ tự</label>
						<input type="text" name="thutu" class="form-control" value="<?php echo $dong['thutu'] ?>">
					</div>


					<button name="sbm" class="btn btn-success">Sửa</button>
				<?php
				}
				?>
			</form>
		</div>
	</div>
</div>