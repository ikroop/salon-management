<?php



session_start();



if(empty($_SESSION['id_admin'])) {

  header("Location: index.php");

  exit();

}



    $connect = mysqli_connect("localhost","id5523494_farmers","2grateful", "id5523494_tfarmers");

    $query = "SELECT * FROM center";

    $query1 = "SELECT * FROM users1";



    $result1 = mysqli_query($connect, $query);

    $result2 = mysqli_query($connect, $query1);



require_once("../db.php");

?>



<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Farmers Portal</title>

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

      <span class="logo-lg"><b>Farmers</b> Portal</span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <?php if(empty($_SESSION['id_admin'])) { ?>

          <li>

            <a href="login.php">Login</a>

          </li>

          <?php } else { 



            if(isset($_SESSION['id_nothing'])) { 

          ?>        

          <li>

            <a href="register-center.php">Add Center</a>

          </li>

          <?php

          } else if(isset($_SESSION['id_admin'])) { 

          ?>        

          <li>

            <a href="dashboard.php">Dashboard</a>

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



    <section id="candidates" class="content-header">

      <div class="container">

        <div class="row">

          <div class="col-md-12 bg-white padding-2">



            <h3>Users</h3>

            <div class="row margin-top-20">

              <div class="col-md-12">

                <div class="box-body table-responsive no-padding">

                    <div class="container">

                        <h3>Dated Search</h3>

                    </div>

                <br>

                <br>





                <form action="resultsdate.php" method="GET" >

                    <!--<select name="center_name" class="form-control input-lg" >

                     <?php while($row1 = mysqli_fetch_array($result1)):; ?>

                        <option value="<?php echo $row1[1]; ?>"><?php echo $row1[1]; ?></option>

                    <?php endwhile;?>

                    </select>

                    -->

                    <label>From</label>

                    <input class="form-control input-lg" type="date" id="dob" min="2018-01-01" max="2099-01-31" name="from" placeholder="Date Of Birth">



                    <div class="form-group">

                      <label>To</label>

                        <input class="form-control input-lg" type="date" id="dob" min="2018-01-01" max="2099-01-31" name="to" placeholder="Date Of Birth">

                    </div>

                    <input type="submit" value="Search" class="btn btn-success btn-lg">

                </form>



                </div>

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

      <strong>Copyright &copy; <a href="#">Church Expert</a>.</strong> All rights

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

  $(function () {

    $('#info-table').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : true

    });

  });

</script>

</body>

</html>

