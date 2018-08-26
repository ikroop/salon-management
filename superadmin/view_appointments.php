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

      <span class="logo-mini"><b>F</b>P</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b> Salon</b> Expert</span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

        </ul>

      </div>

    </nav>

  </header>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">



    <section class="logo-bg">

      <div class="container">

        <div class="row">

          <div class="col-md-12 text-center">

            <p><a class="btn btn-success btn-lg" href="search-user.php" role="button">Search Client</a></p>

          </div>

        </div>

      </div>

    </section>



    <section id="candidates" class="content-header">

      <div class="container">

        <div class="row">

          <div class="col-md-3">

            <div class="box box-solid">

              <div class="box-header with-border">

                <h3 class="box-title">Welcome <b>Attendant</b></h3>

              </div>

              <div class="box-body no-padding">

                <ul class="nav nav-pills nav-stacked">

                  <li><a href="dashboard.php"><i class="fa fa-dashboard text-purple"></i> Dashboard</a></li>

                  <li><a href="users.php"><i class="fa fa-address-card-o text-purple"></i> Clients</a></li>

                  <li class="active"><a href="view_appointments.php"><i class="fa fa-address-card-o text-purple"></i> Appointments</a></li>

                  <li><a href="attendants.php"><i class="fa fa-calculator text-purple"></i> Attendants</a></li>

                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right text-red"></i> Logout</a></li>

                </ul>

              </div>

            </div>

          </div>

          <div class="col-md-9 bg-white padding-2">



            <h3>APPOINTMENTS</h3>

            <hr>

            <div class="row margin-top-20">

              <div class="col-md-12">

                <div class="box-body table-responsive no-padding">

                  <table id="example2" class="table table-hover">

                    <thead>

                      <th>Client</th>

                      <th>Appointment Description</th>

                      <th>Attendant</th>

                      <th>Date</th>

                      <th>Status</th>

                    </thead>

                    <tbody>

                      <?php
                       $current_attendant = $_SESSION['id_admin'];
                      //  $sql = "SELECT * FROM users1 WHERE added_by='$current_attendant'";
                       $sql = "SELECT * FROM appointments";

                            $result = $conn->query($sql);



                            if($result->num_rows > 0) {

                              while($row = $result->fetch_assoc()) 

                              {     



                      ?>



                      <tr>

                        <td>
                        <a href="view-user.php?id=<?php echo $row['client']; ?>">
                        <?php
                            $selected_client = $row['client'];
                             $sql = "SELECT first_name, last_name FROM users1 WHERE member_number='$selected_client'";

                            $result1 = $conn->query($sql);
                            $row1 = $result1->fetch_assoc();
                            echo $row1['first_name']; echo " "; echo $row1['last_name'];
                        ?>
                        </a>
                        </td>

                        <td><?php echo $row['description']; ?></td>

                        <td class="text-orange">
                       
                        <?php 
                        $attendant = $row['attendant'];
                        $sql1 = "SELECT fullname FROM admin WHERE id_admin='$attendant'";

                        $result2 = $conn->query($sql1);
                        $row2 = $result2->fetch_assoc();
                        echo $row2['fullname'];
                        ?>
                      
                        </td>

                        <td><?php echo $row['date_of_appointment']; ?></td>

                        <td>

                          <?php if ($row['active'] == '1'){ 

                          echo "<p class='text-green'>Pending</p>";

                        } else if($row['active'] == '3'){

                          echo "<p class='text-yellow'>Attended</p>";

                        }

                          ?>



                        </td>

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

    $('#example2').DataTable({

      'paging'      : true,

      'lengthChange': false,

      'searching'   : true,

      'ordering'    : true,

      'info'        : true,

      'autoWidth'   : false

    });

  });

</script>

<script type="text/javascript">

    var elems = document.getElementsByClassName('confirmation');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to deactivate this appointment?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }



    var elems = document.getElementsByClassName('confirmdelete');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to delete this appointment?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }



    var elems = document.getElementsByClassName('reactivate');

    var confirmIt = function (e) {

        if (!confirm('Are you sure you want to Reactivate this appointment?')) e.preventDefault();

    };

    for (var i = 0, l = elems.length; i < l; i++) {

        elems[i].addEventListener('click', confirmIt, false);

    }

</script>

</body>

</html>

