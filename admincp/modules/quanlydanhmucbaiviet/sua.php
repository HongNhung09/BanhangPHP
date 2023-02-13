


<?php
$sql_sua_danhmucbv = "SELECT * FROM tbl_danhmucbaiviet WHERE id_baiviet='$_GET[idbaiviet]' LIMIT 1";
$query_sua_danhmucbv = mysqli_query($mysqli,$sql_sua_danhmucbv);

if (isset($_POST['sbm'])) {
	$tenloaisp = $_POST['tendanhmucbaiviet'];
	$thutu = $_POST['thutu'];

	$sql_update = "UPDATE tbl_danhmucbaiviet SET tendanhmuc_baiviet='".$tendanhmucbaiviet."',thutu='".$thutu."' WHERE id_baiviet='$_GET[idbaiviet]'";
	mysqli_query($mysqli,$sql_update);
	header('Location:index.php?action=quanlydanhmucbaiviet&query=them');
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
 	while($dong = mysqli_fetch_array($query_sua_danhmucbv)) {
 	?>
					 <div class="form-group">
                  <label>Tên danh mục bài viết</label>
				  <input type="text" value="<?php echo $dong['tendanhmuc_baiviet'] ?>" name="tendanhmucbaiviet"class="form-control">
                 
                </div>

                <div class="form-group">
                  <label>Thứ tự </label> <br>
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