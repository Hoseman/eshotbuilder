<?php
require_once 'config.php';
require_once 'functions.php';
echo $content_type = $_GET['content_type'];
echo $content_id = $_GET['content_id'];
echo $eshot_id = $_GET['eshot_id'];
echo $eshot_name = $_GET['eshot_name'];
echo $insert = $_GET['bg_colour_custom'];
$col_bg_colour = "";

if($insert == 1){
	echo $bg_colour_custom = 0;
}
elseif($insert == 0){
	echo $bg_colour_custom = 1;
}
else {
	echo $bg_colour_custom = "";
}


try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name SET col_bg_colour=?, bg_colour_custom=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($col_bg_colour,$bg_colour_custom,$content_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}



//header('Location: ./column-edit.php?content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);
$url = './column-edit.php?content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);


?>