
<?php
session_start();
?>

<html>

  <head>
    <title> Trang chủ | Nam Cafe </title>
  </head>

  <link rel="stylesheet" type = "text/css" href ="css/bootstrap.min.css">

  <link rel="stylesheet" type = "text/css" href ="css/index.css">

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
            <li class="active" ><a href="index.php">Trang chủ</a></li>
            <!-- <li><a href="aboutus.php">About</a></li> -->
            <li><a href="contactus.php">Liên hệ</a></li> 

          </ul>

<?php
if(isset($_SESSION['login_user1'])){

?>


          <ul class="nav navbar-nav navbar-right">
            <li><a href="foodlist.php"><!-- <span class="glyphicon glyphicon-user"></span> --> Xin chào <?php echo $_SESSION['login_user1']; ?> </a></li>
            <li><a href="myrestaurant.php">Quản lý</a></li>
            <li><a href="logout_m.php"><!-- <span class="glyphicon glyphicon-log-out"></span> --> Đăng xuất</a></li>
          </ul>
<?php
}
else if (isset($_SESSION['login_user2'])) {
  ?>
           <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><!-- <span class="glyphicon glyphicon-user"></span> --> Xin chào <?php echo $_SESSION['login_user2']; ?> </a></li>
            <li><a href="foodlist.php"><!-- <span class="glyphicon glyphicon-cutlery"></span> --> Ẩm thực </a></li>
            <li><a href="cart.php"><!-- <span class="glyphicon glyphicon-shopping-cart"></span> --> Giỏ hàng
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
            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <!-- class="glyphicon glyphicon-user" --><span ></span>
               Đăng ký <span class="caret"></span> </a>
                <ul class="dropdown-menu">
               <li><a href="customersignup.php"> Đăng ký thành viên</a></li>
               <li> <a href="managersignup.php"> Đăng ký nhà hàng</a></li> 
            
            </ul>
            </li>

            <li><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <!-- class="glyphicon glyphicon-log-in"> --><span </span> 
              Đăng nhập <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li> <a href="customerlogin.php"> Thành viên</a></li>
              <li> <a href="managerlogin.php"> Admin</a></li>
              
            </ul>
            </li>
          </ul>

<?php
}
?>
       </div>

      </div>
    </nav>

    <div class="wide" style="max-height: 400px">
      	<div class="col-xs-5 line"><hr></div>
        <div class="col-xs-2 logo"><img src="images/logo.png"></div>
        <div class="col-xs-5 line"><hr></div>
        <div><br></div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
        <div class="tagline">Good Food is Good Mood</div>
    </div>
    <div class="orderblock">
    <h2>Bạn có cảm thấy đói?</h2>
    <center><a class="btn btn-success btn-lg" href="customerlogin.php" role="button" > Đặt hàng ngay </a></center>
    </div>

    
  
</body>





<footer class="container-fluid bg-4 text-center">
  <br>
  <p> Nam Cafe 2019 | &copy All Rights Reserved </p>
  <br>
  </footer>
</html>