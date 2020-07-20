<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); 
}

?>
<!DOCTYPE html>
<html>

  <head>
    <title> Quản lý | Nam Cafe </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/view_order_details.css">
  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <body>

  
    <button onclick="topFunction()" id="myBtn" title="Go to top">
      <span class="glyphicon glyphicon-chevron-up"></span>
    </button>
  
    <script type="text/javascript">
      window.onscroll = function()
      {
        scrollFunction()
      };

      function scrollFunction(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          document.getElementById("myBtn").style.display = "block";
        } else {
          document.getElementById("myBtn").style.display = "none";
        }
      }

      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>

    <nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="sr-only">Thanh điều hướng</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Nam Cafe</a>
        </div>

        <div class="collapse navbar-collapse " id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Trang chủ</a></li>
            <!-- <li><a href="aboutus.php">About</a></li> -->
            <li><a href="contactus.php">Liên hệ</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><!-- <span class="glyphicon glyphicon-user"></span> --> Xin chào <?php echo $login_session; ?> </a></li>
            <li class="active"> <a href="managerlogin.php">Quản lý</a></li>
            <li><a href="logout_m.php"><!-- <span class="glyphicon glyphicon-log-out"></span> --> Đăng xuất </a></li>
          </ul>
        </div>

      </div>
    </nav>




<div class="container">
    <div class="jumbotron">
     <!-- <h1>Hello Manager! </h1> -->
     <p>Chi tiết đặt hàng</p>

    </div>
    </div>

<div class="container">
    <div class="container">
    	<div class="col">
    		
    	</div>
    </div>

    
    	<div class="col-xs-3" style="text-align: center;">

    	<div class="list-group">
    		<a href="myrestaurant.php" class="list-group-item ">Nhà hàng của bạn</a>
        <a href="view_food_items.php" class="list-group-item ">Danh sách sản phẩm</a>
        <a href="add_food_items.php" class="list-group-item ">Thêm sản phẩm</a>
        <a href="edit_food_items.php" class="list-group-item ">Sửa sản phầm</a>
        <a href="delete_food_items.php" class="list-group-item ">Xóa sản phẩm</a>
        <a href="view_order_details.php" class="list-group-item active">Chi tiết đặt hàng</a>
    	</div>
    </div>
    


    
    <div class="col-xs-9">
      <div class="form-area" style="padding: 0px 100px 100px 100px;">
        <form action="" method="POST">
        <br style="clear: both">
          <h3 style="margin-bottom: 25px; text-align: center; font-size: 30px;"> Danh sách đặt hàng </h3>


<?php




// Storing Session
$user_check=$_SESSION['login_user1'];
$sql = "SELECT * FROM orders o WHERE o.R_ID IN (SELECT r.R_ID FROM RESTAURANTS r WHERE r.M_ID='$user_check') ORDER BY order_date";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0)
{

  ?>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>  </th>
        <th> Mã đặt hàng </th>
        <th> Mã sản phẩm </th>
        <th> Ngày đặt hàng </th>
        <th> Tên sản phẩm </th>
        <th> Giá </th>
        <th> Số lượng </th>
        <th> Tên khách hàng </th>
      </tr>
    </thead>

    <?PHP
      //OUTPUT DATA OF EACH ROW
      while($row = mysqli_fetch_assoc($result)){
    ?>

  <tbody>
    <tr>
      <td> <!-- <span class="glyphicon glyphicon-menu-right"></span> --> </td>
      <td><?php echo $row["order_ID"]; ?></td>
      <td><?php echo $row["F_ID"]; ?></td>
      <td><?php echo $row["order_date"]; ?></td>
      <td><?php echo $row["foodname"]; ?></td>
      <td><?php echo $row["price"]; ?></td>
      <td><?php echo $row["quantity"]; ?></td>
      <td><?php echo $row["username"]; ?></td>
    </tr>
  </tbody>
  
  <?php } ?>
  </table>
    <br>


  <?php } else { ?>

  <h4><center>0 Kết quả</center> </h4>

  <?php } ?>

        </form>

        
        </div>
      
    </div>
</div>
<br>
<br>
<br>
<br>
  
  </body>
</html>