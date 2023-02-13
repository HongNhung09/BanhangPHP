<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<style>
        body {
            background:#ADD8E6;

        }
    </style>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<a class="navbar-brand" href="#">Trang chủ </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlybaiviet&query=them">Quản lý bài viết</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlydanhmucbaiviet&query=them">Quản lý danh mục bài viết</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php?action=quanlyweb&query=capnhat">Quản lý website</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Thống kê</a>
				</li>
			</ul>
		</div>
	</nav>
	<br>

	<div style="text-align: center;" class="container">
		<h3>CHÀO MỪNG BẠN ĐẾN VỚI HỆ THỐNG QUẢN LÝ BÁN HÀNG  </h3>
		<!-- <p>In this example, the navigation bar is hidden on small screens and replaced by a button in the top right corner (try to re-size this window).</p>
		<p>Only when the button is clicked, the navigation bar will be displayed.</p>
		<p>Tip: You can also remove the .navbar-expand-md class to ALWAYS hide navbar links and display the toggler button.</p> -->
	</div>

</body>

</html>




