<?php



session_start();



if(empty($_SESSION['id_super'])) {

  header("Location: index.php");

  exit();

}



require_once("../db.php");

?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Salon Expert</title>

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

      <span class="logo-lg"><b>Salon Expert</b></span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <?php if(empty($_SESSION['id_super'])) { ?>

          <li>

            <a href="login.php">Login</a>

          </li>

          <?php } else { 



            if(isset($_SESSION['id_super'])) { 

          ?>        

           <li>

            <a href="register-attendant.php">Add Attendant</a>

          </li>

          <?php

          } else if(isset($_SESSION['id_super'])) { 

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

          <div class="col-md-3">

            <div class="box box-solid">

              <div class="box-header with-border">

                <h3 class="box-title">Welcome <b>Admin</b></h3>

              </div>

              <div class="box-body no-padding">

                <ul class="nav nav-pills nav-stacked">

                  <li><a href="dashboard.php"><i class="fa fa-dashboard text-purple"></i> Dashboard</a></li>

                  <li><a href="users.php"><i class="fa fa-address-card-o text-purple"></i> Clients</a></li>

                  <li class="active"><a href="attendants.php"><i class="fa fa-calculator text-purple"></i> Attendants</a></li>

                  <li><a href="logout.php"><i class="fa fa-arrow-circle-o-right text-red"></i> Logout</a></li>

                </ul>

              </div>

            </div>

          </div>

          <div class="col-md-9 bg-white padding-2">



            <h3>Attendants</h3>

            <hr>

            <div class="row margin-top-20">

              <div class="col-md-12">

                <div class="box-body table-responsive no-padding">

                  <table id="info-table" class="table table-hover">

                    <thead>

                      <th>FullName</th>

                      <th>Commission(Ksh)</th>

                      <th>Status</th>

                      <th>Created At</th>

                      <th>Action</th>

                      <th>Delete</th>

                    </thead>

                    <tbody>

                      <?php

                      $sql = "SELECT * FROM admin";

                      $result = $conn->query($sql);

                      if($result->num_rows > 0) {

                        while($row = $result->fetch_assoc()) {

                      ?>

                      <tr>

                        <td><?php echo $row['fullname']; ?></td>
                         
                        <td><?php echo $row['commission']; ?></td>


                        <td><?php if ($row['active'] == '1'){ 

                          echo "Active";

                        } else if($row['active'] == '3'){

                          echo "Deactivated";

                        }

                          ?>

                            
                          </td>

                        <td><?php echo $row['createdAt']; ?></td>

                        <td>



                          <?php

                          if($row['active'] == '1') {

                            ?>

                            <a href="deactivate-clerk.php?id=<?php echo $row['id_admin']; ?>" class="confirmation">Deactivate</a></td>

                            <?php

                            } else if ($row['active'] == '3') {

                            ?>

                              <a href="approve-clerk.php?id=<?php echo $row['id_admin']; ?>" class="reactivate">Reactivate</a>

                            <?php

                          }

                        ?>    

                        <td><a href="delete-clerk.php?id=<?php echo $row['id_admin']; ?>" class="confirmdelete">Delete</a></td>

                      </tr>  

                     <?php

                        }

                      }

                    ?>

                    </tbody>                    

                  </table>

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



<script type="text/javascript">

    var elems = document.getElementsByClassName('confirmation');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to deactivate this Attendant?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }



    var elems = document.getElementsByClassName('confirmdelete');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to delete this attendant?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }



    var elems = document.getElementsByClassName('reactivate');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to Reactivate this attendant?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }

</script>

</body>

</html>

