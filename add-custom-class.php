<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';

$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];

$custom_class_name = $_POST['custom_class_name'];
$class_name = strtolower(str_replace(' ', '-', $custom_class_name));
$custom_class_width = $_POST['custom_class_width'];
$custom_class_height = $_POST['custom_class_height'];
$custom_class_text_align = $_POST['custom_class_text_align'];
$custom_class_font_size = $_POST['custom_class_font_size'];
$custom_class_text_float = $_POST['custom_class_text_float'];
$custom_class_margin = $_POST['custom_class_margin'];
$custom_class_padding = $_POST['custom_class_padding'];
$media_width = $_POST['media_width'];

//exit;

try {
	
	$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO $tbl_name_custom_class (custom_class_name, custom_class_width, custom_class_height, custom_class_font_size, custom_class_text_align, custom_class_text_float, custom_class_margin, custom_class_padding, media_width) VALUES (:custom_class_name, :custom_class_width, :custom_class_height, :custom_class_font_size, :custom_class_text_align, :custom_class_text_float, :custom_class_margin, :custom_class_padding, :media_width)";
	$q = $conn->prepare($sql);
	$q->execute(array(
					  ':custom_class_name'=>$class_name,
					  ':custom_class_width'=>$custom_class_width,
					  ':custom_class_height'=>$custom_class_height,
					  ':custom_class_font_size'=>$custom_class_font_size,
					  ':custom_class_text_align'=>$custom_class_text_align,
					  ':custom_class_text_float'=>$custom_class_text_float,
					  ':custom_class_margin'=>$custom_class_margin,
					  ':custom_class_padding'=>$custom_class_padding,
					  ':media_width'=>$media_width
					 ));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

header('Location: ./eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);
?>