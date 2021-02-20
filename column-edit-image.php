<?php
require_once 'config.php';
require_once 'functions.php';
if(isset($_POST['submit'])){
	$padding_1 = $_POST['padding_1'];
	$padding_2 = $_POST['padding_2'];
	$padding_3 = $_POST['padding_3'];
	$padding_4 = $_POST['padding_4']; 
	
	if(!empty($_POST['href'])){ $href = $_POST['href']; }	
	if(!empty($_POST['href_left'])){ $href_left = $_POST['href_left']; }	
	if(!empty($_POST['href_right'])){ $href_right = $_POST['href_right']; }	
	if(!empty($_POST['alt_value'])){ $alt_value = $_POST['alt_value']; }	
	if(!empty($_POST['alt_value_left'])){ $alt_value_left = $_POST['alt_value_left']; }	
	if(!empty($_POST['alt_value_right'])){ $alt_value_right = $_POST['alt_value_right']; }
	
	$text_align_col_left = $_POST['text_align_col_left'];
	$text_align_col_right = $_POST['text_align_col_right'];
	$text_align = $_POST['text_align'];
	
	$eshot_url = $_POST['eshot_url'];
	$img_url = $_POST['img_url'];
	$img_url_left = $_POST['img_url_left'];
	$img_url_right = $_POST['img_url_right'];
	
	$img_url = preg_replace('#^https?://#', '', $img_url);
	$img_url_left = preg_replace('#^https?://#', '', $img_url_left);
	$img_url_right = preg_replace('#^https?://#', '', $img_url_right);
	
	$img_file_name = $_POST['img_file_name'];
	$img_file_name_left = $_POST['img_file_name_left'];
	$img_file_name_right = $_POST['img_file_name_right'];
	$col_bg_colour = $_POST['col_bg_colour'];
	$content_position = $_POST['content_position'];
	$content_type = $_POST['content_type'];
	$column_edit_id = $_POST['column_edit_id'];
	$eshot_id = $_POST['eshot_id'];
	$eshot_name = $_POST['eshot_name'];


	
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
				//run the image uploader

				//$target_dir = "/var/www/vhosts/emails.bigmarketing.co.uk/httpdocs/2019/test-3/images/";
				$target_dir = "/var/www/vhosts/andrewhosegood.bigmarketing.co.uk/httpdocs/image-uploader/images/";

				//echo "filename = " . basename($_FILES["fileToUpload"]["name"]);

				$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				// Check if image file is a actual image or fake image
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
					if($check !== false) {
						echo "File is an image - " . $check["mime"] . ".";
						$uploadOk = 1;
					} else {
						echo "File is not an image.";
						$uploadOk = 0;
					}
				}
				// Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$uploadOk = 0;
				}
				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$uploadOk = 0;
				}
				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;
				}
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
					echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}

			//run the image uploader

			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET eshot_url=?, padding_1=?, padding_2=?, padding_3=?, padding_4=?, href=?, alt_value=?, img_url=?, img_file_name=?, text_align=?, col_bg_colour=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($eshot_url, $padding_1,$padding_2,$padding_3,$padding_4,$href,$alt_value,$img_url,$img_file_name,$text_align,$col_bg_colour,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
			redirect($url);
	}
	//Do middle column insert
	
	//Do left column insert
	elseif($content_position == "left"){
			try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET eshot_url=?, padding_1=?, padding_2=?, padding_3=?, padding_4=?, href_left=?, alt_value_left=?, img_url_left=?, img_file_name_left=?, text_align_col_left=?, col_bg_colour=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($eshot_url, $padding_1,$padding_2,$padding_3,$padding_4,$href_left,$alt_value_left,$img_url_left,$img_file_name_left,$text_align_col_left,$col_bg_colour,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
			redirect($url);
	}
	//Do left column insert
	
	//Do right column insert
	elseif($content_position == "right"){
			try {
			$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "UPDATE $tbl_name SET eshot_url=?, padding_1=?, padding_2=?, padding_3=?, padding_4=?, href_right=?, alt_value_right=?, img_url_right=?, img_file_name_right=?, text_align_col_right=?, col_bg_colour=? WHERE id=?";
						$q = $conn->prepare($sql);
						$q->execute(array($eshot_url, $padding_1,$padding_2,$padding_3,$padding_4,$href_right,$alt_value_right,$img_url_right,$img_file_name_right,$text_align_col_right,$col_bg_colour,$column_edit_id));	
			}
			catch(PDOException $e) {
			echo 'ERROR: ' . $e->getMessage();
			}
			$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
			redirect($url);
			
	}
	//Do right column insert
	
	//If soemthing went wrong..throw an error
	else{
		echo "There was an error!";
		exit;
	}
	//If soemthing went wrong..throw an error
	
}//end if isset post submit
?>
