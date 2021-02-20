<?php
require_once 'config.php';
require_once 'functions.php';
$content = $_POST['content'];
$id = $_POST['id'];
$eshot_id = $_POST['eshot_id'];
$text_align = $_POST['text_align'];
$font_weight = $_POST['font_weight'];
$font_family = $_POST['font_family'];
$line_height = $_POST['line_height'];
$font_size = $_POST['font_size'];
$eshot_name = $_POST['eshot_name'];

//exit;

try {
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE $tbl_name SET content=?, text_align=?, font_weight=?, font_family=?, line_height=?, font_size=? WHERE id=? and eshot_id=?";

			$q = $conn->prepare($sql);
			$q->execute(array($content,$text_align,$font_weight,$font_family,$line_height,$font_size,$id,$eshot_id));
	
}

catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$url = "./eshot-builder.php?eshot_id=".$eshot_id."&eshot_name=".$eshot_name;
echo redirect($url);
?>