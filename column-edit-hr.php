<?php
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];

$col_bg_colour = $_POST['col_bg_colour'];
$font_colour = $_POST['font_colour'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
$column_edit_id = $_POST['column_edit_id'];

$custom_padding_name = "style- " . uniqid();
$custom_padding_1 = $_POST['custom_padding_1'];
$custom_padding_2 = $_POST['custom_padding_2'];
$custom_padding_3 = $_POST['custom_padding_3'];
$custom_padding_4 = $_POST['custom_padding_4'];
$custom_padding_value = $_POST['custom_padding_value'];


try {
	$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, font_colour=? WHERE id=?";
				$q = $conn->prepare($sql);
				$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$font_colour,$column_edit_id));	
}
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}


try {
	$sql = "INSERT INTO $tbl_name_custom_padding (custom_padding_name, custom_padding_1, custom_padding_2, custom_padding_3, custom_padding_4, custom_padding_value) 
	VALUES (:custom_padding_name, :custom_padding_1, :custom_padding_2, :custom_padding_3, :custom_padding_4, :custom_padding_value)";
	$q = $conn->prepare($sql);
	$q->execute(array(
		  ':custom_padding_name'=>$eshot_id,
		  ':custom_padding_1'=>$custom_padding_1,
		  ':custom_padding_2'=>$custom_padding_2,
		  ':custom_padding_3'=>$custom_padding_3,
		  ':custom_padding_4'=>$custom_padding_4,
		  ':custom_padding_value'=>$custom_padding_value
	 ));
}
				
catch(PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}


$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);

?>