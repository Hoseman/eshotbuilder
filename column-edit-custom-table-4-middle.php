<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];
$col_bg_colour = $_POST['col_bg_colour'];

if(!empty($_POST['text_align'])){
	$text_align = $_POST['text_align'];
}
else{
	$text_align = "";
}

$text_align = $_POST['text_align'];
$ct_img_file_name_1  = $_POST['ct_img_file_name_1']; 
$ct_img_file_name_2  = $_POST['ct_img_file_name_2']; 
$ct_img_file_name_3  = $_POST['ct_img_file_name_3']; 
$ct_img_file_name_4  = $_POST['ct_img_file_name_4']; 
$ct_img_url_1 = $_POST['ct_img_url_1'];
$ct_img_url_2 = $_POST['ct_img_url_2'];
$ct_img_url_3 = $_POST['ct_img_url_3'];
$ct_img_url_4 = $_POST['ct_img_url_4'];



$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
echo $column_edit_id = $_POST['column_edit_id'];


echo $content_position = $_POST['content_position'];

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";
*/

try {
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	

$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align=?, ct_img_file_name_1=?, ct_img_url_1=?, ct_img_file_name_2=?, ct_img_url_2=?, ct_img_file_name_3=?, ct_img_url_3=?, ct_img_file_name_4=?, ct_img_url_4=? WHERE id=?";
$q = $conn->prepare($sql);
$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align,$ct_img_file_name_1,$ct_img_url_1,$ct_img_file_name_2,$ct_img_url_2,$ct_img_file_name_3,$ct_img_url_3,$ct_img_file_name_4,$ct_img_url_4,$column_edit_id));	
}
catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);

?>