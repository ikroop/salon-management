<?php 
session_start();
require_once("../db.php");
if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}
// $connect = mysqli_connect("localhost","","", "");
    $query = "SELECT * FROM centers";
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Church Expert</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="../css/AdminLTE.min.css">

  <link rel="stylesheet" href="../css/_all-skins.min.css">

  <!-- Custom -->

  <link rel="stylesheet" href="../css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet"

        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">



  <header class="main-header">



    <!-- Logo -->

    <a href="index.php" class="logo logo-bg">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>J</b>P</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>Church Expert</b></span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li>

            <a href="users.php">Members</a>

          </li>

          <?php if(empty($_SESSION['id_admin']) && empty($_SESSION['id_company'])) { ?>

          <li>

            <a href="login.php">Login</a>

          </li>

          <li>

            <a href="sign-up.php">Sign Up</a>

          </li>  

          <?php } else { 
            if(isset($_SESSION['id_admin'])) { 
          ?>        

          <li>

            <a href="index.php">Dashboard</a>

          </li>

          <?php
          } else if(isset($_SESSION['id_admin'])) { 
          ?>        

          <li>

            <a href="company/index.php">Dashboard</a>

          </li>

          <?php } ?>

          <li>

            <a href="logout.php">Logout</a>

          </li>

          <?php } ?>          

        </ul>

      </div>

    </nav>

  </header>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">



    <section id="for_password" class="content-header">

      <div class="container">

        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">

          <h1 class="text-center margin-bottom-20">UPDATE PASSWORD</h1>
          <div>
          <?php 
            if(isset($_SESSION['successfulupdate'])) { 
          ?>

        <div class="alert alert-success">
          <p>Password successfully updated!</p>
        </div>

        <?php unset($_SESSION['successfulupdate']); } ?>
          <?php 
            if(isset($_SESSION['failUpdate'])) { 
          ?>
            <div class="alert alert-danger">
              <p>Wrong Old Password</p>
            </div>

            <?php unset($_SESSION['failUpdate']); } ?>
          </div>
          <div>
    <?php 
      if(isset($_SESSION['successfulupdate_username'])) { 
    ?>

  <div class="alert alert-success">
    <p>Username successfully updated!</p>
  </div>

  <?php unset($_SESSION['successfulupdate_username']); } ?>
    <?php 
      if(isset($_SESSION['failUpdate_username'])) { 
    ?>
      <div class="alert alert-danger">
        <p>Wrong Old username</p>
      </div>

      <?php unset($_SESSION['failUpdate_username']); } ?>
    </div>
          <form method="post" id="registerCandidates" action="change-password.php" enctype="multipart/form-data">

            <div class="col-md-12 latest-job ">
            <label>Old Password</label>
              <div class="form-group">

                <input class="form-control input-lg" type="text" id="fname" name="old_password" placeholder="Old Password" required>

              </div>

              <div class="form-group">
              <label>New Password</label>
                <input class="form-control input-lg" type="text" id="lname" name="new_password" placeholder="New password" required>

              </div>

              <div class="form-group">

                <button class="btn btn-flat btn-success">UPDATE</button>

              </div>



            </div>            

          </form>

          

        </div>

      </div>

    </section>

<section id="for_username" class="content-header">

<div class="container">

  <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">

    <h1 class="text-center margin-bottom-20">UPDATE USERNAME</h1>

    <form method="post" id="registerCandidates" action="change-username.php" enctype="multipart/form-data">

      <div class="col-md-12 latest-job ">
      <div class="form-group">
        <label>Old Username</label>
          <input class="form-control input-lg" type="text" id="lname" name="old_username" placeholder="Old username" required>

        </div>
        
        <div class="form-group">
        <label>New Username</label>
          <input class="form-control input-lg" type="text" id="lname" name="new_username" placeholder="New username" required>

        </div>

        <div class="form-group">

          <button class="btn btn-flat btn-success">UPDATE</button>

        </div>

      </div>            

    </form>

    

  </div>

</div>

</section>


  </div>

  <!-- /.content-wrapper -->



  <footer class="main-footer" style="margin-left: 0px;">

    <div class="text-center">

      <strong>Copyright &copy; <a href="#"></a>.</strong> All rights

    reserved.

    </div>

  </footer>



  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>



</div>

<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->

<script src="js/adminlte.min.js"></script>



<script type="text/javascript">
      function validatePhone(event) {
        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;
        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>



<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    $('#age').val(age);
  });
</script>

<script type="text/javascript">
  $(function(){
    $(".alert:visible").fadeOut(4000);
  });
</script>

</body>

</html>
