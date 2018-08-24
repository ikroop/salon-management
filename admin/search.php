<?php



session_start();



require_once("../db.php");



$limit = 4;



if(isset($_GET["page"])) {

  $page = $_GET['page'];

} else {

  $page = 1;

}



$start_from = ($page-1) * $limit;





if(isset($_GET['filter']) && $_GET['filter']=='city') {



  $sql = "SELECT * FROM users1 WHERE center_name='$_GET[search]'";



  $result = $conn->query($sql);

  if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      // $sql1 = "SELECT * FROM users LIMIT $start_from, $limit";

      //           $result1 = $conn->query($sql1);

      //           if($result1->num_rows > 0) {

      //             while($row = $result1->fetch_assoc()) 

                  {

               ?>



         <div class="attachment-block clearfix">

              <div class="attachment-pushed">

                <h4 class="attachment-heading"><a href="view-user.php?id=<?php echo $row['id_farmer']; ?>"><?php echo $row['first_name']; ?></a> <span class="attachment-heading pull-right">created at <?php echo $row['createdAt']; ?></span></h4>

                <div class="attachment-text">

                    <div><strong><?php echo $row['center_name']; ?> </strong></div>

                </div>

              </div>

            </div>



      <?php

        }

      }

    

  }





} else {



  if(isset($_GET['filter']) && $_GET['filter']=='searchBar') {



    $search = $_GET['search'];

    $sql = "SELECT * FROM users1 WHERE member_number LIKE '%$search%' LIMIT $start_from, $limit";

    



  } else if(isset($_GET['filter']) && $_GET['filter']=='experience') {



    $sql = "SELECT * FROM users1  LIMIT $start_from, $limit";



  }



  $result = $conn->query($sql);

  if($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      // $sql1 = "SELECT * FROM users WHERE center_name='$row[center_name]'";

      //           $result1 = $conn->query($sql1);

      //           if($result1->num_rows > 0) {

      //             while($row1 = $result1->fetch_assoc()) 

                  {

               ?>



         <div class="attachment-block clearfix">

                <div class="attachment-pushed">

                  <h4 class="attachment-heading"><a href="view-user.php?id=<?php echo $row['member_number']; ?>"><?php echo $row['first_name']; ?></a> <span class="attachment-heading pull-right">Created at <?php echo $row['createdAt']; ?></span></h4>

                  <div class="attachment-text">

                      <div><strong><?php echo 'Number'; echo ' '; echo $row['member_number']; ?> </strong></div>

                  </div>

                </div>

              </div>



      <?php

        }

      }

    }

  



}









$conn->close();