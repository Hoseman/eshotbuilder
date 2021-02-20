<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';

$class_delete_id = $_GET['id'];
$eshot_id = $_GET['eshot_id'];
$eshot_name = $_GET['eshot_name'];
	


try {

// database connection
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


//New Data


// query
$sql = "DELETE FROM $tbl_name_custom_class WHERE id =  :class_delete_id";
$q = $conn->prepare($sql);
$q->execute(array(':class_delete_id'=>$class_delete_id,));


$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

