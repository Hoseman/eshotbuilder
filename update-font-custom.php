<?php
require_once 'config.php';
require_once 'functions.php';

$content_type = $_GET['content_type'];
$content_id = $_GET['content_id'];
$eshot_id = $_GET['eshot_id'];
$eshot_name = $_GET['eshot_name'];
$insert = $_GET['font_colour_custom'];
$font_colour = "";

if($insert == 1){
	$font_colour_custom = 0;
}
elseif($insert == 0){
	$font_colour_custom = 1;
}
else {
	$font_colour_custom = "";
}


try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name SET font_colour=?, font_colour_custom=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($font_colour,$font_colour_custom,$content_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}



$url = './column-edit.php?content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);


?>