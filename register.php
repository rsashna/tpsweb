<html>

<?php

header("Location: log.php", true, 301);


$name = $_POST['name'];
$date = $_POST['date'];
$message = $_POST['message'];


$link = mysqli_connect("localhost", "root", "", "hackathon");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO tps (name, dates, message) VALUES ('$name', '$date', '$message')";
if(mysqli_query($link, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);

$fp = fopen("testfile.txt", "r+");
$savestring = $message . '/';
fwrite($fp, $savestring);
fclose($fp);
echo "<h1>You data has been saved in a text file!</h1>";
?>




</html>