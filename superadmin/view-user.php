<?php
//To Handle Session Variables on This Page
session_start();
//If user Not logged in then redirect them back to homepage. 
//This is required if user tries to manually enter view-user.php in URL.
if(empty($_SESSION['id_super'])) {
  header("Location: ../index.php");
  exit();
}
//Including Database Connection From db.php file to avoid rewriting in all files  
require_once("../db.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Salon expert</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo logo-bg">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>F</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Salon Expert</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
            <a href="users.php">Clients</a>
          </li>

          <li>
            <a href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left: 0px;">

    <section id="candidates" class="content-header">
      <div class="container">
          <div class="row">
              <div class="col-md-12 bg-white padding-2">
                  <div class="pull-right">
          <button  onclick="printDiv('printableArea')" class="btn btn-info btn-lg btn-flat margin-top-20"><em><i class="ion ion-printer"></i></em> Print</button>
                  <!-- <a href="users.php" class="btn btn-warning btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i> Back</a> -->
                  <a href="search-user.php" class="btn btn-danger btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i><i class="fa fa-plane text-white"></i> Search</a>
                  <a href="users.php" class="btn btn-success btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i><i class="fa fa-address-card-o"></i> Members</a>
                  </div>
                  </div>
                  </div>
        <div class="row" id="printableArea">
          <div class="col-md-12 bg-white padding-2">
            <div class="row margin-top-20">
              <div class="col-md-12">
              <h1>Services</h1>
              <?php
               $sql = "SELECT * FROM users1 WHERE member_number='$_GET[id]'";
                $result = $conn->query($sql);
                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {
                ?>
                <div class="pull-left">
                  <!-- <a href="deactivate-farmer.php?id=<?php echo $row['id_member']; ?>" class="confirmation">Deactivate</a> -->
                  <h2><b><?php echo $row['first_name']; echo ' '; echo $row['last_name']; ?></b></h2>
                  <div class="pull-left"><em></em><?php echo "Client Number: "; echo " "; echo $row['member_number']; ?></em></div>
                </div>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                  <p><span class="margin-right-10"><i class="fa fa-location-arrow text-purple"></i> <?php echo $row['tithe']; ?> Ksh</span> <i class="fa fa-calendar text-purple"></i>Registered At <?php echo date("d-M-Y", strtotime($row['createdAt'])); ?></p>              
                </div>
                <div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
            
          </div>

          <!-- transactions -->
            <div class="col-md-12 bg-white padding-2">
            <div class="row margin-top-20">
              <div class="col-md-12">
              <?php
               $sql = "SELECT * FROM history WHERE id_member='$_GET[id]' ORDER BY given_date DESC";
                $result = $conn->query($sql);
                //If Job Post exists then display details of post
                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {
                ?>
                <div class="pull-left">
                  <!-- <a href="deactivate-farmer.php?id=<?php echo $row['id_member']; ?>" class="confirmation">Deactivate</a> -->
                  
                </div>
                <div class="pull-right">
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                  <p><span class="margin-right-10"><i class="fa fa-location-arrow text-purple"></i> <?php echo $row['given_tithe']; ?> Ksh</span> <i class="fa fa-calendar text-purple"></i>Received At <?php echo  date("d-M-Y", strtotime($row['given_date'])); ?> for <span class="text-green"><?php echo  $row['service_offered']; ?></span> service</p>              
                </div>
                <div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
            
          </div>
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
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- AdminLTE App -->
<script src="../js/adminlte.min.js"></script>

<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>


</body>
</html>