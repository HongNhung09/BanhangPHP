
<div style="background: #66CDAA " class="card-header">
	<h2>Quản lý thông tin website</h2>
</div>
<div class="card-body">
	<?php
	$sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1";
	$query_lh = mysqli_query($mysqli, $sql_lh);
	?>
	<table border="1" width="100%" style="border-collapse: collapse;">
		<?php
		while ($dong = mysqli_fetch_array($query_lh)) {
		?>
			<form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id'] ?>" enctype="multipart/form-data">

				<tr>
					<td>THÔNG TIN LIÊN HỆ </td>
					<td><textarea rows="10" name="thongtinlienhe" style="resize: none"><?php echo $dong['thongtinlienhe'] ?></textarea></td>
				</tr>

				<tr>
					<td colspan="2"><input class="btn btn-success" type="submit" name="submitlienhe" value="Cập nhật"></td>
				</tr>
			<?php
		}
			?>
			</form>
	</table>
</div>