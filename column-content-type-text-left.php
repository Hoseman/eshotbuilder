<?php
require_once 'config.php';
require_once 'functions.php';
$content_left = $_POST['content_left'];
$id = $_POST['id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];

try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name SET content_left=? WHERE id=? and eshot_id=?";	

			$q = $conn->prepare($sql);
			$q->execute(array($content_left,$id,$eshot_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);
?>