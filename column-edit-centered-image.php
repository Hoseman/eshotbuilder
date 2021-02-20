<?php
require_once 'config.php';
require_once 'functions.php';
if(isset($_POST['submit'])){

	$padding_1 = $_POST['padding_1'];
	$padding_2 = $_POST['padding_2'];
	$padding_3 = $_POST['padding_3'];
	$padding_4 = $_POST['padding_4'];
	if(!empty($_POST['href'])){ $href = $_POST['href']; }
	if(!empty($_POST['alt_value'])){ $alt_value = $_POST['alt_value']; }
	$text_align = $_POST['text_align'];
	$eshot_url = $_POST['eshot_url'];
	$img_url = $_POST['img_url'];
	$img_url = preg_replace('#^https?://#', '', $img_url);
	$img_file_name = $_POST['img_file_name'];
	$col_bg_colour = $_POST['col_bg_colour'];
	$content_position = $_POST['content_position'];
	$content_type = $_POST['content_type'];
	$column_edit_id = $_POST['column_edit_id'];
	$eshot_id = $_POST['eshot_id'];
	$eshot_name = $_POST['eshot_name'];
	$column_centered_image_width = $_POST['column_centered_image_width'];
	$image_responsive = $_POST['image_responsive'];



	
	//Do one column insert
	if($content_position == ""){

			try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET eshot_url=?, padding_1=?, padding_2=?, padding_3=?, padding_4=?, href=?, alt_value=?, img_url=?, img_file_name=?, col_bg_colour=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($eshot_url, $padding_1,$padding_2,$padding_3,$padding_4,$href,$alt_value,$img_url,$img_file_name,$col_bg_colour,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}

			$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
			redirect($url);
	}
	//Do one column insert
	
	//Do middle column insert
	if($content_position == "middle"){
			try {

			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET eshot_url=?, padding_1=?, padding_2=?, padding_3=?, padding_4=?, href=?, alt_value=?, img_url=?, img_file_name=?, text_align=?, col_bg_colour=?, column_centered_image_width=?, image_responsive=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($eshot_url, $padding_1,$padding_2,$padding_3,$padding_4,$href,$alt_value,$img_url,$img_file_name,$text_align,$col_bg_colour,$column_centered_image_width,$image_responsive,$column_edit_id));
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();

			}
			$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
			redirect($url);
	}
	//Do middle column insert

	
	//If soemthing went wrong..throw an error
	else{
		echo "There was an error!";
		exit;
	}
	//If something went wrong..throw an error
	
}//end if isset post submit
?>
