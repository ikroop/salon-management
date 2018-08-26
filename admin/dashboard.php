<?php



session_start();



if(empty($_SESSION['id_admin'])) {

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

  <title>Salon expert</title>

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

      <span class="logo-lg"><b>Salon</b> Expert</span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">
    
        <ul class="nav navbar-nav">
        <li>

        <a href="#" id="myBtn"><i class="ion  ion-android-notifications"></i></a>

        </li>
        <li>

        <a href="password.php">Credentials</a>

        </li>
        <li>

            <a href="appointments.php">Add Appointment</a>

          </li>
           <li>

            <a href="register-member.php">Add Client</a>

          </li>
          <li>

            <a href="duty_roster.php">Duty Roster</a>

          </li>

        </ul>

      </div>

    </nav>

  </header>



  <!-- Content Wrapper. Contains page content -->
  <!-- The Modal -->
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  <?php
    $current_attendant = $_SESSION['id_admin'];
    $sql = "SELECT * FROM appointments WHERE attendant='$current_attendant'";

    $result = $conn->query($sql);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) 
      {
        $appointment_date = $row['date_of_appointment'];
        $some_client = $row['client'];

  ?>


  <span class="info-box-number">
  <?php 
  $now = time();
  $some_date = strtotime($appointment_date);
  $datediff = $some_date - $now;
  $days = round($datediff / (60 * 60 * 24));
  $correct_days = abs($days);
  if ($correct_days < 4){
  $sql2 = "SELECT * FROM users1 WHERE member_number=$some_client";
 
  $result1 = $conn->query($sql2);
  $row2 = $result1->fetch_assoc();
  echo "<a href='view_appointments.php'>";
  echo abs($correct_days);
  echo " days to your appointment with "; 
  echo $row2['first_name']; 
  echo " ";
  echo $row2['last_name'];
  echo "</a>";

}

}
    
}
else {
  $appointment_date = 0;
  echo "<span class='info-box-number'>You don't have any appointments for now</span>";
}
 ?></span>

  </p>
</div>

</div>
  <div class="content-wrapper" style="margin-left: 0px;">



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

                  <li class="active"><a href="dashboard.php"><i class="fa fa-dashboard text-purple"></i> Dashboard</a></li>

                  <li><a href="users.php"><i class="fa fa-address-card-o text-purple"></i> Clients</a></li>

                  <li><a href="view_appointments.php"><i class="fa fa-address-card-o text-purple"></i> Appointments</a></li>

                  <li><a href="salon_form.php"><i class="fa fa-pencil text-purple"></i>Update Service</a></li>

                  <li><a href="../logout.php"><i class="fa fa-arrow-circle-o-right text-red"></i> Logout</a></li>

                </ul>

              </div>

            </div>

          </div>

          <div class="col-md-9 bg-white padding-2">



            <h3>Current Statistics</h3>

            <div class="row">
              <div class="col-md-12">

                <div class="info-box bg-c-yellow">

                  <span class="info-box-icon bg-stats"><i class="fa fa-calculator"></i></span>

                  <div class="info-box-content">

                    <span class="info-box-text">Your Commission</span>

                    <?php
                      $current_attendant = $_SESSION['id_admin'];
                      $sql = "SELECT commission FROM admin WHERE id_admin='$current_attendant'";

                      $result = $conn->query($sql);
                      if($result->num_rows == 0) {
                      
                      }
                      while($row = $result->fetch_assoc()) 
                      {

                        $totalno = $row['commission'];

                        echo "<span class='info-box-number'>";  echo "Ksh"; echo " "; echo $totalno; echo "</span>";
                      }

                    ?>


                  </div>

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

      <strong>Copyright &copy; <a href="#">Salon Expert</a>.</strong> All rights

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

<script src="../js/adminlte.min.js"></script>

<script>

function Show(){
  if (document.getElementById('notifications').style.display == 'block'){
    document.getElementById('notifications').style.display = 'none';
  }
  else{
    document.getElementById('notifications').style.display = 'block';
  }
}

</script>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>

</html>

