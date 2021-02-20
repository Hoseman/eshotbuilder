<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

$reorder = $_POST['reorder'];
$id = $_POST['id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];


try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name SET sortable=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($reorder,$id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

header('Location: ./eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);
?>