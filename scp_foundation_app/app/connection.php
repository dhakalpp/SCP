<?php

//Database credentials
$address = "localhost";
$user = "a3000193_scpuser";
$database = "a3000193_scp_foundation_app";
$password = "Toiohomai123";

//Database connection object (address, user, password, db)
$connection = new mysqli($address, $user, $password, $database) or die(mysqli_error($connection));

//Create variable that stores all the records from our database
$result = $connection->query("select * from Subjects") or die($connection->error());

//First check if form has been submitted with data
if (isset($_POST['save']))
{
    // Create variables from our posted form values
    $itemNo = !empty($_POST['itemNo']) ? $connection->real_escape_string($_POST['itemNo']) : $_POST['itemNo'];
    $objectClass = !empty($_POST['objectClass']) ? $connection->real_escape_string($_POST['objectClass']) : $_POST['objectClass'];
    $img1 = !empty($_POST['objectClassImage']) ? $connection->real_escape_string($_POST['objectClassImage']) : $_POST['objectClassImage'];
    $specialContainmentProcedures = !empty($_POST['specialContainmentProcedures']) ? $connection->real_escape_string($_POST['specialContainmentProcedures']) : $_POST['specialContainmentProcedures'];
    $description = !empty($_POST['description']) ? $connection->real_escape_string($_POST['description']) : $_POST['description'];
    $img2 = !empty($_POST['descriptionImage']) ? $connection->real_escape_string($_POST['descriptionImage']) : $_POST['descriptionImage'];
    $chronologicalHistory = !empty($_POST['chronologicalHistory']) ? $connection->real_escape_string($_POST['chronologicalHistory']) : $_POST['chronologicalHistory'];
    $spaceTimeAnomalies = !empty($_POST['spaceTimeAnomalies']) ? $connection->real_escape_string($_POST['spaceTimeAnomalies']) : $_POST['spaceTimeAnomalies'];
    $additionalNotes = !empty($_POST['additionalNotes']) ? $connection->real_escape_string($_POST['additionalNotes']) : $_POST['additionalNotes'];
    $appendixAName = !empty($_POST['appendixAName']) ? $connection->real_escape_string($_POST['appendixAName']) : $_POST['appendixAName'];
    $appendixA = !empty($_POST['appendixA']) ? $connection->real_escape_string($_POST['appendixA']) : $_POST['appendixA'];
    $appendixBName = !empty($_POST['appendixBName']) ? $connection->real_escape_string($_POST['appendixBName']) : $_POST['appendixBName'];
    $appendixB = !empty($_POST['appendixB']) ? $connection->real_escape_string($_POST['appendixB']) : $_POST['appendixB'];
    $reference = !empty($_POST['reference']) ? $connection->real_escape_string($_POST['reference']) : $_POST['reference'];


    //Create an insert command
    $sql1 = "insert into Subjects (itemNo, objectClass, img1, specialContainmentProcedure, description, img2, chronologicalHistory, spaceTimeAnomalies, additionalNotes, appendixAName, appendixA, appendixBName, appendixB, reference) values ('$itemNo', '$objectClass', '$img1', '$specialContainmentProcedures', '$description', '$img2', '$chronologicalHistory', '$spaceTimeAnomalies', '$additionalNotes', '$appendixAName', '$appendixA', '$appendixBName', '$appendixB', '$reference')";

    //Display success or error message on screen
    if ($connection->query($sql1) === TRUE){
        echo "
        <h1>Record added successfully</h1>
        <p><a href='../index.php'>Back to index page</p>
        ";
    } else {
        echo "
        <h1>Error submitting data</h1>
        <p>{".mysqli_error($connection);"}</p>
        <p><a href='../index.php'>Back to index page</p>
        ";
    }
}

//First check if form has been submitted with data
if (isset($_GET['delete']))
{
    $id = trim($_GET['delete'], "'");

    // Create variables from our posted form values
    $sql = "delete from Subjects where id = '$id'";

    //Display success or error message on screen
    if ($connection->query($sql) === TRUE) {

        $_SESSION['message'] = "Record deleted successfully";

        //Fetching all the records again, so the table is updated
        $result = $connection->query("select * from Subjects") or die($connection->error());
    } else {
        $_SESSION['message'] = "Error submitting data. {".mysqli_error($connection);"}";
    }
}

//First check if form has been submitted with data
if (isset($_POST['update']))
{
    // Create variables from our posted form values
    $id = $_POST['id'];
    $itemNo = !empty($_POST['itemNo']) ? $connection->real_escape_string($_POST['itemNo']) : $_POST['itemNo'];
    $objectClass = !empty($_POST['objectClass']) ? $connection->real_escape_string($_POST['objectClass']) : $_POST['objectClass'];
    $img1 = !empty($_POST['objectClassImage']) ? $connection->real_escape_string($_POST['objectClassImage']) : $_POST['objectClassImage'];
    $specialContainmentProcedures = !empty($_POST['specialContainmentProcedures']) ? $connection->real_escape_string($_POST['specialContainmentProcedures']) : $_POST['specialContainmentProcedures'];
    $description = !empty($_POST['description']) ? $connection->real_escape_string($_POST['description']) : $_POST['description'];
    $img2 = !empty($_POST['descriptionImage']) ? $connection->real_escape_string($_POST['descriptionImage']) : $_POST['descriptionImage'];
    $chronologicalHistory = !empty($_POST['chronologicalHistory']) ? $connection->real_escape_string($_POST['chronologicalHistory']) : $_POST['chronologicalHistory'];
    $spaceTimeAnomalies = !empty($_POST['spaceTimeAnomalies']) ? $connection->real_escape_string($_POST['spaceTimeAnomalies']) : $_POST['spaceTimeAnomalies'];
    $additionalNotes = !empty($_POST['additionalNotes']) ? $connection->real_escape_string($_POST['additionalNotes']) : $_POST['additionalNotes'];
    $appendixAName = !empty($_POST['appendixAName']) ? $connection->real_escape_string($_POST['appendixAName']) : $_POST['appendixAName'];
    $appendixA = !empty($_POST['appendixA']) ? $connection->real_escape_string($_POST['appendixA']) : $_POST['appendixA'];
    $appendixBName = !empty($_POST['appendixBName']) ? $connection->real_escape_string($_POST['appendixBName']) : $_POST['appendixBName'];
    $appendixB = !empty($_POST['appendixB']) ? $connection->real_escape_string($_POST['appendixB']) : $_POST['appendixB'];
    $reference = !empty($_POST['reference']) ? $connection->real_escape_string($_POST['reference']) : $_POST['reference'];

    //Create an update command
    $sql1 = "update Subjects SET itemNo = '$itemNo', objectClass='$objectClass', img1='$img1', specialContainmentProcedure = '$specialContainmentProcedures', description='$description', img2='$img2', chronologicalHistory = '$chronologicalHistory', spaceTimeAnomalies='$spaceTimeAnomalies', additionalNotes='$additionalNotes', appendixAName = '$appendixAName', appendixA='$appendixA', appendixBName = '$appendixBName', appendixB='$appendixB', reference='$reference' WHERE id = $id";

    //Display success or error message on screen
    if ($connection->query($sql1) === TRUE) {
        echo "
        <h1>Record updated successfully</h1>
        <p><a href='../index.php'>Back to index page</p>
        ";
    } else {
        echo "
        <h1>Error submitting data</h1>
        <p>{".mysqli_error($connection);"}</p>
        <p><a href='../index.php'>Back to index page</p>
        ";
    }
}
?>
