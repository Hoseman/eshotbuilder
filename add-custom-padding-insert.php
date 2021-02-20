<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'config.php';
$eshot_column = $_POST['eshot_column'];
$content_type = $_POST['content_type'];
$content_id = $_POST['content_id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
$content_position = $_POST['content_position'];
$custom_padding_name = "";
//$custom_padding_name = $_POST['custom_padding_name'];
//$custom_padding_name = str_replace(' ', '', $custom_padding_name);
$custom_padding_name_f = $custom_padding_name . rand();
$custom_padding_name_f = str_replace(' ', '', $custom_padding_name_f);


$custom_padding_1 = str_replace(' ', '', $_POST['custom_padding_1']);
$custom_padding_2 = str_replace(' ', '', $_POST['custom_padding_2']);
$custom_padding_3 = str_replace(' ', '', $_POST['custom_padding_3']);
$custom_padding_4 = str_replace(' ', '', $_POST['custom_padding_4']);

$custom_padding_value = $_POST['custom_padding_value'];

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

exit;
*/

try {
	
	$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO $tbl_name_custom_padding (custom_padding_name, custom_padding_1, custom_padding_2, custom_padding_3, custom_padding_4, custom_padding_value) VALUES (:custom_padding_name, :custom_padding_1, :custom_padding_2, :custom_padding_3, :custom_padding_4, :custom_padding_value)";
	$q = $conn->prepare($sql);
	$q->execute(array(
					  ':custom_padding_name'=>$custom_padding_name_f,
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

header('Location: ./add-custom-padding.php?eshot_column='.$eshot_column.'&content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name.'&content_position='.$content_position);

?>