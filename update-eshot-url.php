<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';

$id = $_POST['id'];
//$year = $_POST['year'];
$eshot_url = $_POST['eshot_url'];
$eshot_name = $_POST['eshot_name'];
$eshot_title = $_POST['eshot_title'];
$eshot_id = $_POST['eshot_id'];
$col_base_colour = $_POST['col_base_colour'];

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

exit;
*/

try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name SET eshot_url=?, eshot_title=?, col_base_colour=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($eshot_url,$eshot_title,$col_base_colour,$id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);
?>