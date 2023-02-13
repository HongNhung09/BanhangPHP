
<?php

$sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
$query_lietke_danhmucsp = mysqli_query($mysqli, $sql_lietke_danhmucsp);

// ================================================================
//   SỬ DỤNG CHO MỤC THÊM SẢN PHẨM 


if (isset($_POST['sbm'])) {
  $tenloaisp = $_POST['tendanhmuc'];
  $thutu = $_POST['thutu'];
  $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('" . $tenloaisp . "','" . $thutu . "')";
  mysqli_query($mysqli, $sql_them);
  header('Location:index.php?action=quanlydanhmucsanpham&query=them');


  //===============================
}

?>
<div class="container-fluid">
  <div class="card">
    <div style="background: #66CDAA " class="card-header d-flex justify-content-between align-items-center ">
      <h2>Danh Mục sản phẩm</h2>
    </div>
    <div class="card-body">
      <table class="table bordered">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Tên danh mục</th>
            <th>Quản lý</th>
          </tr>
        </thead>

        <tbody>
          <!--Duyệt qua query và in ra  -->
          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query_lietke_danhmucsp)) {
            $i++; ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['tendanhmuc'] ?></td>
              <td>
                <a class="btn btn-danger" href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Sửa</a>
                <a class="btn btn-warning" href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>">Xoá</a>

              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--  button -->
    <div class="card-footer d-flex justify-content-between">
      <!-- <a href="index.php?page_layout=them" class="btn btn-primary">
        Thêm mới
      </a> -->
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                Thêm mới
            </button>


    </div>

    <!-- ========================================================================================================= -->

    <!--  THÊM MỚI SẢN PHẨM VÀO DANH SÁCH SẢN PHẨM  -->
    <!-- Sử dụng bootstrap để hiển thị form thêm sản phẩm ở form DS sản phẩm  -->
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm danh mục sản phẩm </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">

                <!-- Nhap du lieu tu ban phim -->
                <div class="form-group">
                  <label>Tên danh mục</label>
                  <input type="text" name="tendanhmuc" class="form-control">
                </div>

                <div class="form-group">
                  <label>Thứ tự </label> <br>
                  <input type="text" name="thutu" class="form-control">
                </div>

                <button name="sbm" class="btn btn-success">Thêm mới</button>
              </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

          </div>
        </div>
      </div>
    </div>
    <!-- ======================================================== -->
  </div>
</div>