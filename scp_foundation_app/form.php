<?php include "app/connection.php" ?>
<?php
	if (isset($_GET['edit'])) {
    $id = trim($_GET['edit'], "'");
    $update = true;
    $record = $connection->query("select * from Subjects where id = '$id'") or die($connection->error());

        $row = $record->fetch_assoc();
        $id = $row['id'];
        $itemNo = $row['itemNo'];
        $objectClass = $row['objectClass'];
        $img1 = $row['img1'];
        $specialContainmentProcedures = $row['specialContainmentProcedure'];
        $description = $row['description'];
        $img2 = $row['img2'];
        $chronologicalHistory = $row['chronologicalHistory'];
        $spaceTimeAnomalies = $row['spaceTimeAnomalies'];
        $additionalNotes = $row['additionalNotes'];
        $appendixAName = $row['appendixAName'];
        $appendixA = $row['appendixA'];
        $appendixBName = $row['appendixBName'];
        $appendixB = $row['appendixB'];
        $reference = $row['reference'];
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

  <title>SCP Foundation</title>
</head>

<body class="container">
  <h1>SCP Foundation</h1>
  <h3>Use this form to enter a new page record</h3>

  <form class="form-group" method="post" action="app/connection.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Item No</label>
    <br />
    <input type="text" class="form-control" name="itemNo" placeholder="Item No" value="<?php echo $itemNo; ?>" required />
    <br /><br />
    <label>Object Class</label>
    <br />
    <input type="text" class="form-control" name="objectClass" placeholder="Object Class" value="<?php echo $objectClass; ?>" required />
    <br /><br />
    <label>Object Class Image</label>
    <br />
    <input type="text" class="form-control" name="objectClassImage" placeholder="Object Class Image" value="<?php echo $img1; ?>" />
    <br /><br />
    <label>Special Containment Procedures</label>
    <br />
    <textarea class="form-control" rows="5" name="specialContainmentProcedures" placeholder="Special Containment Procedures" required><?php echo $specialContainmentProcedures; ?></textarea>
    <br /><br />
    <label>Description</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="description" placeholder="Description" required><?php echo $description; ?></textarea>
    <br /><br />
    <label>Description Image</label>
    <br />
    <input type="text" class="form-control" name="descriptionImage" placeholder="Description Image" value="<?php echo $img2; ?>"/>
    <br /><br />
    <label>Chronological History</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="chronologicalHistory" placeholder="Chronological History"><?php echo $chronologicalHistory; ?></textarea>
    <br /><br />
    <label>Space-Time Anomalies</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="spaceTimeAnomalies" placeholder="Space Time Anomalies"><?php echo $spaceTimeAnomalies; ?></textarea>
    <br /><br />
    <label>Additional Notes</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="additionalNotes" placeholder="Additional Notes"><?php echo $additionalNotes; ?></textarea>
    <br /><br />
    <label>Appendix A Name</label>
    <br />
    <input type="text" class="form-control" name="appendixAName" placeholder="Appendix A Name" value="<?php echo $appendixAName; ?>" />
    <br /><br />
    <label>Appendix A</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="appendixA" placeholder="Appendix A"><?php echo $appendixA; ?></textarea>
    <br /><br />
    <label>Appendix B Name</label>
    <br />
    <input type="text" class="form-control" name="appendixBName" placeholder="Appendix B Name" value="<?php echo $appendixBName; ?>" />
    <br /><br />
    <label>Appendix B</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="appendixB" placeholder="Appendix B"><?php echo $appendixB; ?></textarea>
    <br /><br />
    <label>Reference</label>
    <br />
    <textarea type="text" class="form-control" rows="5" name="reference" placeholder="Reference"><?php echo $reference; ?></textarea>
    <hr width="100%" />
    <?php if ($update == true): ?>
	    <button class="btn btn-warning" style="float: right; margin-bottom: 10px;" type="submit" name="update" >Update Subject</button>
    <?php else: ?>
	    <button class="btn btn-primary" style="float: right; margin-bottom: 10px;" name="save" >Save Subject</button>
    <?php endif ?>
    <a href="./index.php" class="btn btn-info" style="float: right; margin: 0 10px 10px 10px;" name="cancel" >Cancel</a>
  </form>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>