<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';

echo $eshot_delete_id = $_POST['eshot_delete_id'];

	


try {

// database connection
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


//New Data


// query
$sql = "DELETE FROM $tbl_name WHERE eshot_id =  :eshot_id";
$q = $conn->prepare($sql);
$q->execute(array(':eshot_id'=>$eshot_delete_id,));

$url = './index.php';
redirect($url);
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

