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
$cp_insert = $_POST['cp_insert'];
$cp_insert_2 =  substr($cp_insert, 12);
$cp_insert_name = substr($cp_insert, 0, 12);
$cp_insert_name_2 = substr($cp_insert_name, 2);
$cp_insert_name_2 = str_replace(' ', '', $cp_insert_name_2);
$cp_insert_value = substr($cp_insert, 0, 1);


/*
echo "<pre>";
print_r($_POST);
echo "</pre>";

exit;
*/

try {

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "UPDATE $tbl_name SET cp_insert_name=?, cp_insert=?, cp_insert_value=? WHERE id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($cp_insert_name_2,$cp_insert_2,$cp_insert_value,$content_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

/*
try {
	
	$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO $tbl_name (cp_insert_name, cp_insert, cp_insert_value) VALUES (:cp_insert_name, :cp_insert, :cp_insert_value)";
	$q = $conn->prepare($sql);
	$q->execute(array(
					  ':cp_insert_name'=>$custom_padding_name,
					  ':cp_insert'=>$cp_insert,
					  ':cp_insert_value'=>$custom_padding_value
					 ));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
*/
header('Location: ./column-edit.php?content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);

//header('Location: ./column-edit.php?eshot_column='.$eshot_column.'&content_type='.$content_type.'&content_id='.$content_id.'&eshot_id='.$eshot_id.'&eshot_name='.$eshot_name.'&content_position='.$content_position);

?>