<?php
require_once 'config.php';
require_once 'functions.php';

$edit_class_id = $_POST['edit_class_id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
$custom_class_name = $_POST['custom_class_name'];
$custom_class_width = $_POST['custom_class_width'];
$custom_class_height = $_POST['custom_class_height'];
$custom_class_font_size = $_POST['custom_class_font_size'];

if($_POST['custom_class_text_align'] == "no-value"){
	$custom_class_text_align = "";
}
else {
	$custom_class_text_align = $_POST['custom_class_text_align'];
}

if($_POST['custom_class_text_float'] == "no-value"){
	$custom_class_text_float = "";
}
else {
	$custom_class_text_float = $_POST['custom_class_text_float'];
}


$custom_class_margin = $_POST['custom_class_margin'];
$custom_class_padding = $_POST['custom_class_padding'];
$custom_class_margin = $_POST['custom_class_margin'];
$media_width = $_POST['media_width'];
/*
echo $edit_class_id;
echo "<br>";
echo $custom_class_name;
echo "<br>";
echo $custom_class_width;
echo "<br>";
echo $custom_class_height;
echo "<br>";
echo $custom_class_font_size;
echo "<br>";
echo $custom_class_text_align;
echo "<br>";
echo $custom_class_text_float;
echo "<br>";
echo $custom_class_margin;
echo "<br>";
echo $custom_class_padding;
echo "<br>";
echo $custom_class_margin;
echo "<br>";
echo $media_width;
*/


try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$sql = "UPDATE $tbl_name_custom_class SET custom_class_name=?, custom_class_width=?, custom_class_height=?, custom_class_font_size=?, custom_class_text_align=?, custom_class_text_float=?, custom_class_margin=?, custom_class_padding=?, media_width=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($custom_class_name,$custom_class_width,$custom_class_height,$custom_class_font_size,$custom_class_text_align,$custom_class_text_float,$custom_class_margin,$custom_class_padding,$media_width,$edit_class_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);


?>