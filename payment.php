<?php
session_start();
require 'connection.php';
$conn = Connect();
if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
}
?>

<html>

  <head>
    <title> Thanh toán | Nam Cafe </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/payment.css">
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
            <li ><a href="index.php">Trang chủ</a></li>
            <!-- <li><a href="aboutus.php">About</a></li> -->
            <li><a href="contactus.php">Liên hệ</a></li>

          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><!-- <span class="glyphicon glyphicon-user"></span> --> Xin chào <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">Quản lý</a></li>
            <li><a href="logout_m.php"><!-- <span class="glyphicon glyphicon-log-out"></span> --> Đăng xuất </a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><!-- <span class="glyphicon glyphicon-user"></span> --> Xin chào <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><!-- <span class="glyphicon glyphicon-cutlery"></span> --> Ẩm thực </a></li>
            <li class="active" ><a href="foodlist.php"><!-- <span class="glyphicon glyphicon-shopping-cart"></span> --> Giỏ hàng
             (<?php
              if(isset($_SESSION["cart"])){
              $count = count($_SESSION["cart"]); 
              echo "$count"; 
            }
              else
                echo "0";
              ?>)
              </a></li>
            <li><a href="logout_u.php"><!-- <span class="glyphicon glyphicon-log-out"></span> --> Đăng xuất </a></li>
          </ul>
  <?php        
}
else {

  ?>

<ul class="nav navbar-nav navbar-right">
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!-- <span class="glyphicon glyphicon-user"></span> --> Đăng ký <span class="caret"></span> </a>
                <ul class="dropdown-menu">
              <li> <a href="customersignup.php"> Đăng ký thành viên</a></li>
              <!-- <li> <a href="managersignup.php"> Manager Sign-up</a></li>
              <li> <a href="#"> Admin Sign-up</a></li> -->
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><!-- <span class="glyphicon glyphicon-log-in"></span> --> Đăng nhập <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Thành viên</a></li>
              <li> <a href="managerlogin.php"> Admin</a></li>
              <!-- <li> <a href="#"> Admin Login</a></li> -->
            </ul>
            </li>
          </ul>

<?php
}
?>
      </div>

      </div>
    </nav>

 <?php
$gtotal = 0;
  foreach($_SESSION["cart"] as $keys => $values)
  {

    $F_ID = $values["food_id"];
    $foodname = $values["food_name"];
    $quantity = $values["food_quantity"];
    $price =  $values["food_price"];
    $total = ($values["food_quantity"] * $values["food_price"]);
    $R_ID = $values["R_ID"];
    $username = $_SESSION["login_user2"];
    $order_date = date('Y-m-d');
    
    $gtotal = $gtotal + $total;


     $query = "INSERT INTO ORDERS (F_ID, foodname, price,  quantity, order_date, username, R_ID) 
              VALUES ('" . $F_ID . "','" . $foodname . "','" . $price . "','" . $quantity . "','" . $order_date . "','" . $username . "','" . $R_ID . "')";
             

              $success = $conn->query($query);         

      if(!$success)
      {
        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Something went wrong!</h1>
            <p>Try again later.</p>
          </div>
        </div>

        <?php
      }
      
  }

        ?>
        <div class="container">
          <div class="jumbotron">
            <h1>Chọn hình thức thanh toán</h1>
          </div>
        </div>
        <br>
<h1 class="text-center">Tổng cộng: <!-- &#8377; --><?php echo "$gtotal"; ?> VND<!-- /- --></h1>
<h5 class="text-center">Bao gồm tất cả các chi phí dịch vụ. (Không áp dụng phí giao hàng)</h5>
<br>
<h1 class="text-center">
  <a href="cart.php"><button class="btn btn-warning"><!-- <span class="glyphicon glyphicon-circle-arrow-left"></span> -->Trở về giỏ hàng</button></a>
  <a href="onlinepay.php"><button class="btn btn-success"><!-- <span class="glyphicon glyphicon-credit-card"></span> --> Thanh toán online</button></a>
  <a href="COD.php"><button class="btn btn-success"><!-- <span class="glyphicon glyphicon-"></span> --> Thanh toán khi giao hàng</button></a>
</h1>
        


<br><br><br><br><br><br>
        </body>








        <footer class="container-fluid bg-4 text-center">
  <br>
  <p> Nam Cafe 2019 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>