<?php
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];
$col_bg_colour = $_POST['col_bg_colour'];
$text_align_col_left = $_POST['text_align_col_left'];
$text_align_col_right = $_POST['text_align_col_right'];
$ct_img_file_name_left_1 = $_POST['ct_img_file_name_left_1'];
$ct_img_file_name_left_2 = $_POST['ct_img_file_name_left_2'];
$ct_img_file_name_left_3 = $_POST['ct_img_file_name_left_3'];
$ct_img_url_left_1 = $_POST['ct_img_url_left_1'];
$ct_img_url_left_2 = $_POST['ct_img_url_left_2'];
$ct_img_url_left_3 = $_POST['ct_img_url_left_3'];
$ct_img_alt_left_1 = $_POST['ct_img_alt_left_1'];
$ct_img_alt_left_2 = $_POST['ct_img_alt_left_2'];
$ct_img_alt_left_3 = $_POST['ct_img_alt_left_3'];



$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
$column_edit_id = $_POST['column_edit_id'];

/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

exit;
*/

$content_position = $_POST['content_position'];

try {
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align_col_left=?, text_align_col_right=?, ct_img_file_name_left_1=?, ct_img_alt_left_1=?,ct_img_url_left_1=?, ct_img_file_name_left_2=?, ct_img_alt_left_2=?, ct_img_url_left_2=?, ct_img_file_name_left_3=?, ct_img_alt_left_3=?, ct_img_url_left_3=? WHERE id=?";
$q = $conn->prepare($sql);
$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align_col_left,$text_align_col_right,$ct_img_file_name_left_1,$ct_img_alt_left_1,$ct_img_url_left_1,$ct_img_file_name_left_2,$ct_img_alt_left_2,$ct_img_url_left_2,$ct_img_file_name_left_3,$ct_img_alt_left_3,$ct_img_url_left_3,$column_edit_id));	
}
catch(PDOException $e) {
echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);

?>