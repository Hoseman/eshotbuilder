<?php
require_once 'config.php';
require_once 'functions.php';
$content_type = $_POST['content_type'];
$id = $_POST['id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
try {
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE $tbl_name SET content_type=? WHERE id=? and eshot_id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($content_type,$id,$eshot_id));
	
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
//header('Location: ./eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);
$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);
?>