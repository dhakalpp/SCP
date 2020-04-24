<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>SCP Foundation</title>
</head>

<body class="container">

  <?php include "app/connection.php" ?>

  <?php if (isset($_SESSION['message'])): ?>
  <!-- Displaying messages set into SESSION -->
	<div class="msg">
		<?php
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		?>
	</div>
  <?php endif ?>

  <!-- Menu Row -->
  <div class=row>
    <div class="col">
      <ul class="nav navbar-light bg-light">

        <!-- run php loop through database and display page names here -->
        <a class="nav-link" href="index.php">Subjects List</a>
        <li>
          <a href="form.php" class="nav-link">Enter a new Page Record</a>
        </li>
      </ul>
    </div>
  </div>

  <!--Database content here-->
  <div class=row>
    <div class="col">
      <?php
      if (isset($_GET['page'])) {
        $id = trim($_GET['page'], "'");

        $record = $connection->query("select * from Subjects where id = '$id'") or die($connection->error());

        $row = $record->fetch_assoc();

        $itemNo = $row['itemNo'];
        $objectClass = $row['objectClass'];
        $img1 = $row['img1'];
        $specialContainmentProcedures = preg_replace('#\s\s+#', '<br /><br />', $row['specialContainmentProcedure']);
        $description = preg_replace('#\s\s+#', '<br /><br />', $row['description']);
        $img2 = $row['img2'];
        $chronologicalHistory = preg_replace('#\s\s+#', '<br /><br />', $row['chronologicalHistory']);
        $spaceTimeAnomalies = preg_replace('#\s\s+#', '<br /><br />', $row['spaceTimeAnomalies']);
        $additionalNotes = preg_replace('#\s\s+#', '<br /><br />', $row['additionalNotes']);
        $appendixAName = preg_replace('#\s\s+#', '<br /><br />', $row['appendixAName']);
        $appendixA = preg_replace('#\s\s+#', '<br /><br />', $row['appendixA']);
        $appendixBName = preg_replace('#\s\s+#', '<br /><br />', $row['appendixBName']);
        $appendixB = preg_replace('#\s\s+#', '<br /><br />', $row['appendixB']);
        $reference = preg_replace('#\s\s+#', '<br /><br />', $row['reference']);

        echo "<div>
          <h2>Item #: {$itemNo}</h2>
          <h3>Object Class: {$objectClass}</h3>
        ";
        if(!empty($img1)){
          echo "<p><img src='{$img1}'></p>";
        }
        if(!empty($specialContainmentProcedures)){
          echo "<h4>Special Containment Procedures:</h4><p>{$specialContainmentProcedures}</p>";
        }
        if(!empty($description)){
          echo "<h4>Description:</h4><p>{$description}</p>";
        }
        if(!empty($img2)){
          echo "<p><img src='{$img2}'></p>";
        }
        if(!empty($chronologicalHistory)){
          echo "<h6>Chronological History</h6><p>{$chronologicalHistory}</p>";
        }
        if(!empty($spaceTimeAnomalies)){
          echo "<h6>Space-Time Anomailes:</h6><p>{$spaceTimeAnomalies}</p>";
        }
        if(!empty($additionalNotes)){
          echo "<h6>Additional Notes:</h6><p>{$additionalNotes}</p>";
        }
        if(!empty($appendixA)){
          echo "<h6>Appendix A: {$appendixAName}</h6><p>{$appendixA}</p>";
        }
        if(!empty($appendixB)){
          echo "<h6>Appendix B: {$appendixBName}</h6><p>{$appendixB}</p>";
        }
        if(!empty($reference)){
          echo "<h6>Reference:</h6><p>{$reference}</p>";
        }
        echo "<a href='./index.php' class='btn btn-info' style='float: right; margin-bottom:10px;' name='goback' >Go Back</a>";
        echo "</div>";
      }else{
        echo "
        <div class='row'>
        <h5>Please choose a subject to learn details</h5>
        <div class='table-responsive'>
            <table class='table table-bordered'>
            <thead>
              <tr>
                <th scope='col'>#</th>
                <th scope='col'>Item #</th>
                <th scope='col'>Object Class</th>
                <th scope='col' colspan='3'>Action</th>
              </tr>
            </thead>
            <tbody>
        ";
         $counter = 1;
         foreach ($result as $page){
          echo "<tr>";
          echo "<th scope='row'>$counter</th>";
          echo "<td>".$page['itemNo']."</td>";
          echo "<td>".$page['objectClass']."</td>";
          echo "<td><a href='index.php?page=".$page['id']."' class='btn btn-primary'>View</a></td>";
          echo "<td><a href='form.php?edit=".$page['id']."' class='btn btn-warning'>Edit</a></td>";
          echo "<td><a href='index.php?delete=".$page['id']."' class='btn btn-danger'>Delete</a></td>";
          echo "</tr>";

          $counter++;
         }

        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>