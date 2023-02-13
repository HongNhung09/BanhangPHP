<?php

//thêm mục tìm kiếm
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
  $search = $_POST['search'];
  $sql = "SELECT * FROM tbl_sanpham INNER JOIN tbl_danhmuc ON tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
  WHERE tensanpham LIKE '%$search%'";
  
  $query = mysqli_query($mysqli, $sql);
  $total_prd = mysqli_num_rows($query);
} else {

  $sql = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
  $query = mysqli_query($mysqli, $sql);

  // ================================================================
  //   SỬ DỤNG CHO MỤC THÊM SẢN PHẨM 
  $sql_danhmuc = "SELECT * FROM tbl_danhmuc";
  $query_danhmuc = mysqli_query($mysqli, $sql_danhmuc);

  if (isset($_POST['sbm'])) {
    $tensanpham = $_POST['tensanpham'];

    $hinhanh = $_FILES['hinhanh']['name']; //
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];


    $masp = $_POST['masp']; //
    $giasp = $_POST['giasp']; //
    $soluong = $_POST['soluong']; //
    $tomtat = $_POST['tomtat']; //
    $noidung = $_POST['noidung'];
    $id_danhmuc = $_POST['id_danhmuc'];
    $tinhtrang = $_POST['tinhtrang'];


    //  SQL : them du lieu 
    $sql = "INSERT INTO tbl_sanpham(tensanpham, masp, giasp, soluong, hinhanh, tomtat,noidung ,tinhtrang,id_danhmuc) 
   VALUES('$tensanpham', '$masp', '$giasp',' $soluong', '$hinhanh', '$tomtat','$noidung','$tinhtrang','$id_danhmuc')";

    $query = mysqli_query($mysqli, $sql);
    move_uploaded_file($hinhanh_tmp, 'modules/quanlysp/uploads/' . $hinhanh);

    header('location:index.php?action=quanlysp&query=them');

    //===============================

  }
}

if (isset($_POST['all_prd'])) {
  unset($_POST['sbm']);
}
?>
<div class="container-fluid">
  <div class="card">
    <div style="background: #66CDAA " class="card-header d-flex justify-content-between align-items-center ">
      <h2>Danh sách sản phẩm</h2>
      <!-- Form tìm kiếm -->
      <form method="POST" class="d-flex" action="">
        <input name="search" type="search" class="form-control">
        <button name="sbm" class="btn btn-secondary">Tìm kiếm</button>
      </form>
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

      <!--  Hiểm thị tất cả sản phảm sau khi sd chức năng tìm kiếm xog -->
      <?php
      if (isset($_POST['sbm']) && !empty($_POST['search'])) { ?>
        <form method="POST" action="">
          <button name="all_prd" class='btn btn-success text-light'>Tất cả sản phẩm</button>
        </form>
      <?php } ?>

    </div>

    <div class="card-body">
      
      <?php
      if (isset($total_prd)) {
        if ($total_prd !== 0) {
          echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
        } else {
          echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
        }
      }
      ?>

      <table class="table bordered">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá sp</th>
            <th>Số lượng</th>
            <th>Danh mục</th>
            <th>Mã sp</th>
            <th>Tóm tắt</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
          </tr>
        </thead>

        <tbody>

          <!--Duyệt qua query và in ra  -->
          <?php
          $i = 0;
          while ($row = mysqli_fetch_array($query)) {
            $i++; ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $row['tensanpham'] ?></td>
              <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150px"></td>
              <td><?php echo $row['giasp'] ?></td>
              <td><?php echo $row['soluong'] ?></td>
              <td><?php echo $row['tendanhmuc'] ?></td>
              <td><?php echo $row['masp'] ?></td>
              <td><?php echo $row['tomtat'] ?></td>
              <td><?php if ($row['tinhtrang'] == 1) {
                    echo 'Kích hoạt';
                  } else {
                    echo 'Ẩn';
                  }
                  ?>

              </td>
              <td>
                <a class="btn btn-warning" href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>">Sửa</a>
                <a class="btn btn-danger" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>">Xoá</a>

              </td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
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
            <h4 class="modal-title">Thêm sản phẩm </h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">

                <!-- Nhap du lieu tu ban phim -->
                <div class="form-group">
                  <label>Tên sản phẩm</label>
                  <input type="text" name="tensanpham" class="form-control">
                </div>

                <div class="form-group">
                  <label>Mã SP </label> <br>
                  <input type="text" name="masp" class="form-control">
                </div>

                <div class="form-group">
                  <label> Gía sản phẩm</label>
                  <input type="text" name="giasp" class="form-control">
                </div>

                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="text" name="soluong" class="form-control">
                </div>

                <div class="form-group">
                  <label>Ảnh sản phẩm</label> <br>
                  <input type="file" name="hinhanh">
                </div>

                <div class="form-group">
                  <label>Tóm tắt</label>
                  <input type="text" name="tomtat" class="form-control">
                </div>


                <div class="form-group">
                  <label>Nội dung</label>
                  <input type="text" name="noidung" class="form-control">
                </div>

                <div class="form-group">
                  <label>Danh mục</label>
                  <select class="form-control" name="id_danhmuc">
                    <?php
                    while ($row_danhmuc = mysqli_fetch_assoc($query_danhmuc)) { ?>

                      <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                    <?php } ?>
                  </select>


                  <div class="form-group">
                    <label>Tình trạng</label>
                    <select name="tinhtrang">
                      <option value="1">Kích hoạt</option>
                      <option value="0">Ẩn</option>
                    </select>
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