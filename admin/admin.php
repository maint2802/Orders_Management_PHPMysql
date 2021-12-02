<?php 
     include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="shortcut icon" href="../assets/img/Screenshot (597).png" type="image/x-icon">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/admin.css">
  <style>
      .m-combobox{
          width: 200px;
          padding-left: 20px;
      }
      .input-group{
          width: 550px;
      }
  </style>
</head>
<body style="height: 1500px;">
    <?php 
            // session login--------------------------------
            session_start();
        if(!isset($_SESSION['user'])){
            // header("location: ../index.html");
            echo "<script> alert('Bạn chưa đặng nhập. Vui lòng đăng nhập!'); window.location.href = '../index.html'; </script>";
        }
    ?>
    
    <div class="row">
        <div class="col-sm-2">
            <div class="m-logo">
                <img src="../assets/img/Screenshot (596).png" alt="">
                AQ.POST 
            </div>
            <div class="m-header">
                <h2>Danh mục</h2>
            </div>
            <ul class="nav m-sidebar-list">
                <li class="m-sidebar-item"><a id="" href=""><button class="btn btn-lg btn-main"><i class="far fa-list-alt"></i></i>Đơn hàng</button></a></li>
                <li class="m-sidebar-item"><a href="./logout.php"><button class="btn btn-lg btn-main"><i class="fas fa-sign-out-alt"></i>đăng xuất</button></a></li>
            </ul>
        </div>
        <div class="col-sm-10">
            <div class="m-main-header">
                    <div class="m-main-title">QUẢN LÝ ĐƠN HÀNG</div>
                    <div class="m-main-acc">
                        <a href="../index.html" class="btn btn-lg m-btn m-main-backhome"><i class="fas fa-chevron-left"></i>VỀ TRANG CHỦ</a>
                        <img src="../assets/img/avatar-default.png" alt="">
                        <span>Nguyễn Thị Mai</span>
                        <img src="../assets/img/option.png" alt="">
                    </div>
            </div>
            <div class="m-main-second">
                <span class="m-second-text">Danh sách đơn hàng</span>
            </div>
            <div class="m-main-input">
                <div class="m-main-input-wrap">
                    <!-- search bar ------input-------- -->
                    <form class="form-inline">
                        <div class="input-group">
                            <input class="form-control" id="search-input" placeholder="Nhập tên đơn hàng" required>
                            <div class="input-group-btn" style="width: 150px;">
                                <button type="button" class="btn btn-lg m-btn">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                    <!-- combobox---------- -->
                    <div class="m-combobox">
                        <select  class="m-combobox" id="status-cbx">
                            <option class="m-combobox-option" value="Hoàn thành">Hoàn thành</option>
                            <option class="m-combobox-option" value="Đã bị hủy">Đã bị hủy</option>
                            <option class="m-combobox-option" value="Đang giao">Đang giao</option>
                        </select>
                    </div>
                    <div class="m-combobox">
                        <select class="m-combobox" id="type-cbx">
                            <option class="m-combobox-option" value="Thời trang">Thời trang</option>
                            <option class="m-combobox-option" value="Mỹ phẩm">Mỹ phẩm</option>
                            <option class="m-combobox-option" value="Gia dụng">Gia dụng</option>
                            <option class="m-combobox-option" value="Điện tử">Điện tử</option>
                        </select>
                    </div>
                    <div class="m-combobox">
                        <select class="m-combobox" id="sort-cbx" style= "width: 250px;">
                            <option class="m-combobox-option" value="">Sắp xếp hóa đơn</option>
                            <option class="m-combobox-option" value="DESC">Cao đến thấp</option>
                            <option class="m-combobox-option" value="ASC">Thấp đến cao</option>
                        </select>
                    </div>
                </div>
                <!-- add btn-------- -->
                <button id="add-order-btn" class=" btn btn-lg m-btn"> <i class="far fa-plus-square"></i>Thêm đơn hàng</button>

            </div>
            <div class="m-main-wrap" style="position: relative;">
                <div class="m-table-wrap" style="height: 1200px; overflow: auto;">
                    <table class="m-table" id="table">
                        <thead style=" position: sticky;top: 0;background-color: #fff;">
                            <tr>
                                <th class="text-center" style="width: 70px;">Stt</th>
                                <th class="text-center" style="width: 170px;" >Mã đơn hàng</th>
                                <th class="text-center" style="width: 240px;">Hình ảnh</th>
                                <th class="text-left" style="width: 400px;" >Tên đơn hàng</th>
                                <th class="text-left" style="width: 150px;"> Phân loại</th>
                                <th class="text-right" style="width: 250px; padding-right: 100px;">Hóa đơn</th>
                                <th class="text-left" >Tình trạng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- load dữ liệu từ mysql lên table----------- -->
                                <?php 
                                $sql = "SELECT * FROM donhang";
                                $qr = mysqli_query($conn,$sql);
                                $idrt = 0;
                                while($row = mysqli_fetch_array($qr)){
                                    $idrt = $idrt + 1;
                                ?>
                                <tr>
                                    <td class="text-center"><?php echo $idrt?></td>
                                    <td class="text-center"><?php echo $row["idOrder"]?></td>
                                    <td class="text-center"><img src="<?php echo $row["pic"]?>" alt=""></td>
                                    <td class="text-left m-td-capi" ><?php echo $row["name"]?></td>
                                    <td class="text-left m-td-capi"><?php echo $row["type"]?></td>
                                    <td class="text-right" style="padding-right: 100px;"><?php echo number_format($row["receipt"], 0, '', '.'); ?>đ</td> 
                                    <td class="text-left"><a href="../order_item.html"  class="btn btn-lg btn-success"><?php echo $row["status"]?></a></td>
                                    <td>
                                        <a href="edit.php?id=<?php echo $row["id"]?>" class="btn m-btn btn-lg">Sửa</a>
                                        <a onclick="return Del()" href="delete.php?id=<?php echo $row["id"]?>"  class="btn m-btn btn-lg">Xóa</a>
                                    </td>
                                </tr>
                                <?php }?>
                            <!-- END  ---------load dữ liệu từ mysql lên table----------- -->
                        </tbody>
                    </table>
                </div>
                <div class="m-paging " style=" background-color: #ddd;position: absolute;bottom: 0;">
                    <div class="m-paging-center center-block">
                        <div class="m-paging-first"></i></div>
                        <div class="m-paging-prev"></div>
                        <div class="m-paging-number">
                            <span class="m-paging-number-item m-paging-number-item-active">1</span>
                            <span class="m-paging-number-item">2</span>
                            <span class="m-paging-number-item">3</span>
                            <span class="m-paging-number-item">4</span>
                        </div>
                        <div class="m-paging-next"></div>
                        <div class="m-paging-last"></div>
                    </div>
                </div>
            </div>
           
             

            </div>
        </div>
    </div>


    <!-- add orders------------------------------------------ -->
   <div id="add-order-dialog" class="overlay">
       <form action="./add.php" method="POST" class="form-dialog" id="add-form-dialog">
            <h2 class="form-title">Thêm đơn hàng</h2> 
            <div class="form-input">
                <div class="form-input-item">
                    <label for="">Mã đơn hàng</label>
                    <input name="idOrder" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-input-item">
                    <label for="">Hình ảnh</label>
                    <input name="pic" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-input-item">
                    <label for="">Tên đơn hàng</label>
                    <input name="name" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-input-item">
                    <label for="">Phân loại</label>
                    <input name="type" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-input-item">
                    <label for="">Hóa đơn</label>
                    <input name="receipt" type="text" class="form-control" placeholder="">
                </div>
                <div class="form-input-item">
                    <label for="">Tình trạng</label>
                    <input name="status" type="text" class="form-control" placeholder="">
                </div>

            </div>
            <div class="form-footer">
                <button class="btn btn-lg m-btn" type="submit" name="add" value="add">Lưu</button>
                <a id="btn-cancel" class="btn btn-lg m-btn-cancel" >Hủy</a>
            </div>
       </form>
   </div>

   

   <script>
       
        // add dialod show and hide
        $('#add-order-btn').click(function (e) { 
            $('#add-order-dialog').show();
        });

        $('#btn-cancel').click(function (e) { 
            $('#add-order-dialog').hide();
        });

        $('#add-order-dialog').click(function (e) { 
            $('#add-order-dialog').hide();
        });

        $('#add-form-dialog').click(function (event) { 
            event.stopPropagation()
        });

        //thông báo trc khi delete đơn hàng
        function Del(){
            return confirm("Bạn có chắc muốn xóa đơn hàng này?");
        }





        // dùng ajax để tìm kiếm tên đơn hàng 
        $('#search-input').keyup(function (e) { 
            var result = $('#search-input').val();
            $.post("search.php", {data: result},
                function (data) {
                    $('#table-body').html(data);
                },
            );
        });



        // lọc theo trạng thái đơn hàng 
        $('#status-cbx').change(function (e) { 
            var result = $('#status-cbx').val();
            $.post("filterStatus.php", {data: result},
                function (data) {
                    $('#table-body').html(data);
                },
            );
        });


        // lọc theo loại đơn hàng 
        $('#type-cbx').change(function (e) { 
            var result = $('#type-cbx').val();
            $.post("filtertype.php", {data: result},
                function (data) {
                    $('#table-body').html(data);
                },
            );
        });



        $('#sort-cbx').change(function (e) { 
            var result = $('#sort-cbx').val();
            $.post("sort.php", {data: result},
                function (data) {
                    $('#table-body').html(data);
                },
            );
        });

   </script>
    
</body>
</html>

