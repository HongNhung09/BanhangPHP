<?php

$sql_lietke_bv = "SELECT * FROM tbl_baiviet,tbl_danhmucbaiviet WHERE tbl_baiviet.id_danhmuc=tbl_danhmucbaiviet.id_baiviet ORDER BY tbl_baiviet.id DESC";
$query_lietke_bv = mysqli_query($mysqli, $sql_lietke_bv);

// ================================================================
//   SỬ DỤNG CHO MỤC THÊM SẢN PHẨM 
$sql_danhmuc = "SELECT * FROM tbl_danhmuc";
$query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

if (isset($_POST['sbm'])) {

  $tenbaiviet = $_POST['tenbaiviet'];


  $hinhanh = $_FILES['hinhanh']['name']; //
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

  $tomtat = $_POST['tomtat'];
  $noidung = $_POST['noidung'];
  $tinhtrang = $_POST['tinhtrang'];
  $danhmuc = $_POST['danhmuc'];



  //  SQL : them du lieu 
  $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc)
   VALUE('" . $tenbaiviet . "','" . $hinhanh . "','" . $tomtat . "','" . $noidung . "','" . $tinhtrang . "','" . $danhmuc . "')";

  $query = mysqli_query($mysqli, $sql_them);
  move_uploaded_file($hinhanh_tmp, 'modules/quanlybaiviet/uploads/' . $hinhanh);

  header('location:index.php?action=quanlysp&query=them');


  header('Location:index.php?action=quanlybaiviet&query=them');

  //===============================


}

?>
<div class="container-fluid">
  <div class="card">
    <div style="background: #66CDAA " class="card-header d-flex justify-content-between align-items-center ">
      <h2>Danh mục bài viết</h2>

    </div>
    <div class="card-footer d-flex justify-content-between">
      <!-- <a href="index.php?page_layout=them" class="btn btn-primary">
        Thêm mới
      </a> -->
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Thêm bài viết
      </button>


    </div>
    <div class="card-body">

      <table class="table bordered">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Tên bài viết</th>
            <th>Hình ảnh</th>
            <th>Danh mục</th>
            <th>Tóm tắt</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
          </tr>
        </thead>

        <tbody>

          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query_lietke_bv)) {
            $i++;
          ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['tenbaiviet'] ?></td>
              <td><img src="modules/quanlybaiviet/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>

              <td><?php echo $row['tendanhmuc_baiviet'] ?></td>

              <td><?php echo $row['tomtat'] ?></td>
              <td><?php if ($row['tinhtrang'] == 1) {
                    echo 'Kích hoạt';
                  } else {
                    echo 'Ẩn';
                  }
                  ?>

              </td>
              <td>
                <a class="btn btn-warning" href="?action=quanlybaiviet&query=sua&idbaiviet=<?php echo $row['id'] ?>">Sửa</a>
                <a class="btn btn-danger" href="modules/quanlybaiviet/xuly.php?idbaiviet=<?php echo $row['id'] ?>">Xoá</a>
              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
    <!--  button -->


    <!-- ========================================================================================================= -->

    <!--  THÊM MỚI SẢN PHẨM VÀO DANH SÁCH SẢN PHẨM  -->
    <!-- Sử dụng bootstrap để hiển thị form thêm sản phẩm ở form DS sản phẩm  -->
    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Thêm Bài viết </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">

                <!-- Nhap du lieu tu ban phim -->
                <div class="form-group">
                  <label>Tên bài viết</label>
                  <input type="text" name="tenbaiviet" class="form-control">
                </div>

                <div class="form-group">
                  <label>Hình ảnh</label> <br>
                  <input type="file" name="hinhanh">
                </div>

                <div class="form-group">
                  <label>Tóm tắt </label> <br>
                  <input type="text" name="tomtat" class="form-control">
                </div>

                <div class="form-group">
                  <label> Nội dung</label>
                  <input type="text" name="noidung" class="form-control">
                </div>

                <div class="form-group">
                  <label>Danh mục bài viết</label>
                  <select name="danhmuc">
                    <?php
                    $sql_danhmuc = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
                    $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);
                    while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                    ?>
                      <option value="<?php echo $row_danhmuc['id_baiviet'] ?>"><?php echo $row_danhmuc['tendanhmuc_baiviet'] ?></option>
                    <?php
                    }
                    ?>
                  </select>


                  <div class="form-group">
                    <label>Tình trạng</label>
                    <select name="tinhtrang">
                      <option value="1">Kích hoạt</option>
                      <option value="0">Ẩn</option>
                    </select>
                  </div>

                  <button name="sbm" class="btn btn-success">Thêm bài viết</button>
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