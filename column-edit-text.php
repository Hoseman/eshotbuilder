<?php
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];
$col_bg_colour = $_POST['col_bg_colour'];
$text_align = $_POST['text_align'];
$text_align_col_left = $_POST['text_align_col_left'];
$text_align_col_right = $_POST['text_align_col_right'];
$font_weight = $_POST['font_weight'];
$font_family = $_POST['font_family'];
$line_height = $_POST['line_height'];
$font_size = $_POST['font_size'];
$font_colour = $_POST['font_colour'];
$content_position = $_POST['content_position'];
$content_type = $_POST['content_type'];
$column_edit_id = $_POST['column_edit_id'];
$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];
$content = $_POST['content'];
$content_left = $_POST['content_left'];
$content_right = $_POST['content_right'];



	//Do one column insert
	if($content_position == ""){
			
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, href=?, alt_value=?, img_url=?, img_file_name=?, col_bg_colour=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$href,$alt_value,$img_url,$img_file_name,$col_bg_colour,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = "./eshot-builder.php?eshot_id=".$eshot_id."&eshot_name=".$eshot_name;
			echo redirect($url);
	}
	//Do one column insert
	
	//Do middle column insert
	if($content_position == "middle"){

		try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align=?, font_weight=?, font_family=?, line_height=?, font_size=?, font_colour=?, content=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align,$font_weight,$font_family,$line_height,$font_size,$font_colour,$content,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = "./eshot-builder.php?eshot_id=".$eshot_id."&eshot_name=".$eshot_name;
			echo redirect($url);
			//header('Location: ./eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name);
	}
	//Do middle column insert
	
	//Do left column insert
	elseif($content_position == "left"){
			
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align_col_left=?, font_weight=?, font_family=?, line_height=?, font_size=?, font_colour=?, content_left=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align_col_left,$font_weight,$font_family,$line_height,$font_size,$font_colour,$content_left,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = "./eshot-builder.php?eshot_id=".$eshot_id."&eshot_name=".$eshot_name;
			echo redirect($url);
		
	}
	//Do left column insert
	
	//Do right column insert
	elseif($content_position == "right"){
			
		try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align_col_right=?, font_weight=?, font_family=?, line_height=?, font_size=?, font_colour=?, content_right=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align_col_right,$font_weight,$font_family,$line_height,$font_size,$font_colour,$content_right,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = "./eshot-builder.php?eshot_id=".$eshot_id."&eshot_name=".$eshot_name;
			echo redirect($url);
			
	}
	//Do right column insert
	
	//If soemthing went wrong..throw an error
	else{
		echo "There was an error!";
		exit;
	}
	//If soemthing went wrong..throw an error
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>
	<p>This is the column edit text page!</p>
</body>
</html>