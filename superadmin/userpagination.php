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



$sql = "SELECT * FROM users1 LIMIT $start_from, $limit";

$result = $conn->query($sql);

if($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {

                {

             ?>



       <div class="attachment-block clearfix">

              <div class="attachment-pushed">

                <!-- <a href="deactivate-farmer.php?id=<?php echo $row['member_number']; ?>" class="confirmation">Deactivate</a> -->

                <h4 class="attachment-heading"><a href="view-user.php?id=<?php echo $row['member_number']; ?>"><?php echo $row['first_name']; ?></a> <span class="attachment-heading pull-right">created at <?php echo $row['createdAt']; ?></span></h4>

                <div class="attachment-text">

                    <div><strong><?php echo 'Number'; echo ' '; echo $row['member_number']; ?> </strong></div>

                 </div>

              </div>

            </div>

    <?php

      }

    }

  }





$conn->close();