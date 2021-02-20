<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

echo $id = $_GET['id'];
	


try {

// database connection
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


//New Data


// query
$sql = "DELETE FROM $tbl_name WHERE id =  :id";
$q = $conn->prepare($sql);
$q->execute(array(':id'=>$id,));
header('Location: ./index.php');
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

