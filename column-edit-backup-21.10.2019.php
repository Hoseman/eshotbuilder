<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }
require_once 'config.php';
if(!empty($_GET['content_type'])){
	$content_type = $_GET['content_type'];
}
if(!empty($_GET['content_id'])){
	$content_id = $_GET['content_id'];
}
if(!empty($_GET['eshot_id'])){
	$eshot_id = $_GET['eshot_id'];
}
if(!empty($_GET['eshot_name'])){
	$eshot_name = $_GET['eshot_name'];
}
if(!empty($_GET['content_position'])){
	$content_position = $_GET['content_position'];
}
else{
	$content_position = "middle";
}


$id = 1;
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	



			$colour = "";
			//grab the custom colour values from the database
			$sth = $conn->prepare("SELECT * from $tbl_name_custom_colour");
			$sth->execute(array(':id' => $id));
			$records = $sth->fetchAll();
			echo $count = count($records);

			if(count($records) != 0) {

				foreach ($records as $row) {
					//$colour_id = $row['id'];
					//$colour = $row['colour'];
					//$colour_name = $row['colour_name'];	
					
					$colour_id_array[] = $row['id'];
					$colour_array[] = $row['colour'];
					$colour_name_array[] = $row['colour_name'];		
				}

			}
			//grab the custom colour values from the database

//echo $colour;
echo $colour_id_array[0];
echo $colour_array[0];
echo $colour_name_array[0];







//grab the global url from the database
$sth = $conn->prepare("SELECT * from $tbl_name where eshot_id = $eshot_id and eshot_column = 0");

	$sth->execute(array(':id' => $id));
	$records = $sth->fetchAll();
	$count = count($records);
	
	if(count($records) != 0) {
	
		foreach ($records as $row) {								
			$eshot_url = $row['eshot_url'];
			$eshot_url_array[] = $row['eshot_url'];
		}
		
	}
//grab the global url from the database

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/style.css">
<!--<link rel="stylesheet" href="css/custom_colour.css">-->	
<?php //include 'includes/custom-colours.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">	
</head>

<body>
<?php include 'includes/header-basic.php'; ?>
<?php

	$id = $content_id;

	$sth = $conn->prepare("SELECT * from $tbl_name WHERE `id` = :id");
	$sth->execute(array(':id' => $id));
	$records = $sth->fetchAll();

	foreach ($records as $row) {
		$eshot_name = $row['eshot_name'];
		$eshot_url = $row['eshot_url'];
		$eshot_column = $row['eshot_column'];
		$content = $row['content'];
		$content_left = $row['content_left'];
		$content_right = $row['content_right'];
		$content_type_left = $row['content_type_left'];
		$content_type_right = $row['content_type_right'];
		$padding_1 = $row['padding_1'];
		$padding_2 = $row['padding_2'];
		$padding_3 = $row['padding_3'];
		$padding_4 = $row['padding_4'];
		$cp_insert_name = $row['cp_insert_name'];
		$cp_insert = $row['cp_insert'];
		$cp_insert_value = $row['cp_insert_value'];
		$href = $row['href'];
		$href_left = $row['href_left'];
		$href_right = $row['href_right'];
		$alt_value = $row['alt_value'];
		$alt_value_left = $row['alt_value_left'];
		$alt_value_right = $row['alt_value_right'];
		$img_url = $row['img_url'];
		$img_url_left = $row['img_url_left'];
		$img_url_right = $row['img_url_right'];
		$img_file_name = $row['img_file_name'];
		$img_file_name_left = $row['img_file_name_left'];
		$img_file_name_right = $row['img_file_name_right'];
		$ct_img_file_name_1  = $row['ct_img_file_name_1']; 
		$ct_img_file_name_2  = $row['ct_img_file_name_2']; 
		$ct_img_file_name_3  = $row['ct_img_file_name_3']; 
		$ct_img_file_name_4  = $row['ct_img_file_name_4'];
		$ct_img_url_1 = $row['ct_img_url_1'];
		$ct_img_url_2 = $row['ct_img_url_2'];
		$ct_img_url_3 = $row['ct_img_url_3'];
		$ct_img_url_4 = $row['ct_img_url_4'];
		$ct_img_file_name_left_1 = $row['ct_img_file_name_left_1'];
		$ct_img_file_name_left_2 = $row['ct_img_file_name_left_2'];
		$ct_img_file_name_left_3 = $row['ct_img_file_name_left_3'];
		$ct_img_file_name_left_4 = $row['ct_img_file_name_left_4'];
		$ct_img_file_name_right_1 = $row['ct_img_file_name_right_1'];
		$ct_img_file_name_right_2 = $row['ct_img_file_name_right_2'];
		$ct_img_file_name_right_3 = $row['ct_img_file_name_right_3'];
		$ct_img_file_name_right_4 = $row['ct_img_file_name_right_4'];
		
		if(!empty($row['$ct_img_url_left_1'])){ $ct_img_url_left_1 = $row['ct_img_url_left_1']; } else{ $ct_img_url_left_1 = ""; }
		if(!empty($row['$ct_img_url_left_2'])){ $ct_img_url_left_2 = $row['ct_img_url_left_2']; } else{ $ct_img_url_left_2 = ""; }
		if(!empty($row['$ct_img_url_left_3'])){ $ct_img_url_left_3 = $row['ct_img_url_left_3']; } else{ $ct_img_url_left_3 = ""; }
		if(!empty($row['$ct_img_url_left_4'])){ $ct_img_url_left_4 = $row['ct_img_url_left_4']; } else{ $ct_img_url_left_4 = ""; }
		if(!empty($row['$ct_img_url_right_1'])){ $ct_img_url_right_1 = $row['ct_img_url_right_1']; } else{ $ct_img_url_right_1 = ""; }
		if(!empty($row['$ct_img_url_right_2'])){ $ct_img_url_right_2 = $row['ct_img_url_right_2']; } else{ $ct_img_url_right_2 = ""; }
		if(!empty($row['$ct_img_url_right_3'])){ $ct_img_url_right_3 = $row['ct_img_url_right_3']; } else{ $ct_img_url_right_3 = ""; }
		if(!empty($row['$ct_img_url_right_4'])){ $ct_img_url_right_4 = $row['ct_img_url_right_4']; } else{ $ct_img_url_right_4 = ""; }
		

		$col_bg_colour = $row['col_bg_colour'];
		$bg_colour_custom = $row['bg_colour_custom'];
		$text_align = $row['text_align'];
		$text_align_col_left = $row['text_align_col_left'];
		$text_align_col_right = $row['text_align_col_right'];
		$font_weight = $row['font_weight'];
		$font_family = $row['font_family'];
		$line_height = $row['line_height'];
		$font_size = $row['font_size'];
		$font_colour_custom = $row['font_colour_custom'];
		/*
		if(empty($row['font_colour'])){
			$font_colour = "#000000";
		}
		else {
			$font_colour = $row['font_colour'];	
		}
		*/
		$font_colour = $row['font_colour'];
        $social_icon_1 = $row['social_icon_1'];
        $social_icon_2 = $row['social_icon_2'];
        $social_icon_3 = $row['social_icon_3'];
        $social_icon_4 = $row['social_icon_4'];
        $social_icon_5 = $row['social_icon_5'];
        $si_margin_top = $row['si_margin_top'];
        $si_padding = $row['si_padding'];
        $si_width = $row['si_width'];
        $si_url_1 = $row['si_url_1'];
        $si_url_2 = $row['si_url_2'];
        $si_url_3 = $row['si_url_3'];
        $si_url_4 = $row['si_url_4'];
        $si_url_5 = $row['si_url_5'];
        $si_link_1 = $row['si_link_1'];
        $si_link_2 = $row['si_link_2'];
        $si_link_3 = $row['si_link_3'];
        $si_link_4 = $row['si_link_4'];
        $si_link_5 = $row['si_link_5'];
        $find_us_on = $row['find_us_on'];
		
?>

	

	
<?php
	//Load the editor based on the content type
	if($content_type == "text") {
?>		
	<form action="column-edit-text.php" method="post">	
<?php	
	}
	elseif($content_type == "image") {
?>		
	<form action="column-edit-image.php" method="post" enctype="multipart/form-data">
<?php	
	}
	elseif($content_type == "hr"){
?>
	<form action="column-edit-hr.php" method="post">	
<?php		
	}
	elseif($content_type == "link"){
?>
	<form action="column-edit-browser-link.php" method="post">	
<?php		
	}
	elseif($content_type == "custom_footer_1_left"){
?>
    <form action="column-edit-footer-1-left.php" method="post">
<?php
    }
	elseif($content_type == "custom_footer_1_right"){
?>
    <form action="column-edit-footer-1-right.php" method="post">
<?php
    }
	elseif($content_type == "custom_footer_2_left"){
?>
    <form action="column-edit-footer-2-left.php" method="post">
<?php
    }
    elseif($content_type == "custom_footer_2_right"){
?>
    <form action="column-edit-footer-2-right.php" method="post">
<?php
    }
	elseif($content_type == "social_icons"){
?>
        <form action="column-edit-social-icons.php" method="post">
<?php
    }
	elseif($content_type == "custom-table-3")  { 
			if($content_position == "left"){
				echo '<form action="column-edit-custom-table-3-left.php" method="post">';
			}
			elseif($content_position == "right") {
				echo '<form action="column-edit-custom-table-3-right.php" method="post">';
			}
			else {
				echo '<form action="column-edit-custom-table-3-middle.php" method="post">';
			}
	}
	elseif($content_type == "custom-table-4")  { 
			if($content_position == "left"){
				echo '<form action="column-edit-custom-table-4-left.php" method="post">';
			}
			elseif($content_position == "right") {
				echo '<form action="column-edit-custom-table-4-right.php" method="post">';
			}
			else {
				echo '<form action="column-edit-custom-table-4-middle.php" method="post">';
			}
	}	
	else {
		echo "There was an error";
	}
	//Load the editor based on the content type		
?>
		
<div class="container home-padding">		
<div class="column-edit-section">
	

		
<!-- Display The Page title -->
<!-- If its an image, display The Image -->	
<?php
if($eshot_column == "1"){
	echo "<h2>Column 1 - #" . $id .  "</h2>";
	
	if($content_type == "image"){
	?>
	<img src="<?php if(empty($img_file_name)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name;}?>" width="300px" height="auto" border="0"  />
	<?php
	}
}
		
elseif($eshot_column == "2"){
	echo "<h2>Column 2 (". $content_position .") - #" . $id . "</h2>";

		if($content_type == "image" && $content_position == "left" ){
			?>
			<img src="<?php if(empty($img_file_name_left)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_left;}?>" width="300px" height="auto" border="0"  />
			<?php
		}
		elseif($content_type == "image" && $content_position == "right" ){
			?>
			<img src="<?php if(empty($img_file_name_right)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_right;}?>" width="300px" height="auto" border="0"  />
			<?php
		}
		else {
			echo "";
		}
}
		
elseif($eshot_column == "3") {
	echo "<h2>Column 3 (". $content_position .") - #" . $id . "</h2>";
		if($content_type == "image" && $content_position == "left" ){
			?>
			<img src="<?php if(empty($img_file_name_left)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_left;}?>" width="300px" height="auto" border="0"  />
			<?php
		}
		elseif($content_type == "image" && $content_position == "middle" ){
			?>
			<img src="<?php if(empty($img_file_name)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name;}?>" width="300px" height="auto" border="0"  />
			<?php
		}
		elseif($content_type == "image" && $content_position == "right" ){
			?>
			<img src="<?php if(empty($img_file_name_right)){echo "http://placehold.it/640x400";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_right;}?>" width="300px" height="auto" border="0"  />
			<?php
		}
		else {
			echo "";
		}
}
elseif($eshot_column == "4") {
	echo "<h2>Horizontal Rule - #" . $id . "</h2>";
}
elseif($eshot_column == "5") {
    echo "<h2>View In Browser Link - #" . $id . "</h2>";
}
elseif($eshot_column == "6") {
    echo "<h2>Social Icons - #" . $id . "</h2>";
}
elseif($eshot_column == "7") {
    echo "<h2>Footer Template 1 - #" . $id . "</h2>";
}
else {
    echo "<h2>Footer Template 2 - #" . $id . "</h2>";
}		
?>
<!-- Display The Page title -->
<!-- If its an image, display The Image -->		
	
	
<hr>
		
	
<!-- Display the add column background colour section -->	
<div class="column-edit-section">
<p>Column Background Colour:</p>
	<?php
	if($bg_colour_custom == 1){
	?>
		<label>Custom Value</label>
		<input type="text" name="col_bg_colour" placeholder="#XXXXXX" value="<?php echo $col_bg_colour; ?>" class="input-2">
	<?php	
	}
	else {
	?>
	
		<!--<div class="button-selector-2">	-->
		<?php	
			//grab the custon colour values from the database
			//$sth = $conn->prepare("SELECT * from $tbl_name_custom_colour");
			//$sth->execute(array(':id' => $id));
			//$records = $sth->fetchAll();
			//$count = count($records);
			//if(count($records) != 0) {

				//foreach ($records as $row) {
		?>			
				<!--<label for="font-<?php //echo $row['id']; ?>-bg">

				<input type="radio" value="<?php //echo $row['colour']; ?>-2" name="col_bg_colour" id="font-<?php //echo $row['id']; ?>-bg" <?php //if($col_bg_colour == $row['colour']){ echo 'checked="checked"'; } ?>>
				<span class="font-<?php //echo $row['id']; ?>-bg-button"><?php //echo $row['colour_name']; ?></span>	
				</label>-->



		<?php		
				//}

			//}
			//grab the custon colour values from the database
		?>
		<!--	</div>	-->
	
	<div class="button-selector">

	<label for="black">
	<input type="radio" value="#000000" name="col_bg_colour" id="black" <?php if($col_bg_colour == "#000000"){ echo 'checked="checked"'; } ?>> <span class="black-button">Black</span>
	</label>

	<label for="white">
	<input type="radio" value="#ffffff" name="col_bg_colour" id="white" <?php if($col_bg_colour == "#ffffff"){ echo 'checked="checked"'; } ?>> <span class="white-button">White</span>
	</label>

	<label for="light-grey">
	<input type="radio" value="#cccccc"  name="col_bg_colour" id="light-grey" <?php if($col_bg_colour == "#cccccc"){ echo 'checked="checked"'; } ?>> <span class="light-grey-button">Light Grey</span>
	</label>

	<label for="mid-grey">
	<input type="radio" value="#666666"  name="col_bg_colour" id="mid-grey" <?php if($col_bg_colour == "#666666"){ echo 'checked="checked"'; } ?>> <span class="mid-grey-button">Mid Grey</span>
	</label>
	
	<label for="dark-grey">
	<input type="radio" value="#333333"  name="col_bg_colour" id="dark-grey" <?php if($col_bg_colour == "#333333"){ echo 'checked="checked"'; } ?>> <span class="dark-grey-button">Dark Grey</span>
	</label>

	</div>

	<?php
	}	
	?>	
	
	<a class="btn btn-primary" href="./update-bg-custom.php?content_type=<?php echo $content_type; ?>&content_id=<?php echo $content_id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>&bg_colour_custom=<?php echo $bg_colour_custom; ?>">
		<?php if($bg_colour_custom == 0){ echo "Custom Background Colour"; } else { echo "Default Background Colour"; } ?></a>
	

</div>	
<!-- Display the add column background colour section -->	

<hr>


	
<!-- If its text Display the font-color css style -->


<?php
if($content_type == "text" || $content_type == "link" || $content_type == "custom_footer_1_left" || $content_type == "social_icons"){
	echo '<div class="column-edit-section">';
	echo "<label>Font Colour:</label>";
	if($font_colour_custom == 1){
?>

		<input type="text" name="font_colour" placeholder="#XXXXXX" value="<?php echo $font_colour; ?>" class="input-2">


<?php	
	}
	else {
?>

	<!--</div>-->	

	<div class="button-selector">

	<label for="font-black">
	<input type="radio" value="#000000" name="font_colour" id="font-black" <?php if($font_colour == "#000000"){ echo 'checked="checked"'; } ?>>
	<span class="font-black-button">Black</span>
	</label>

	<label for="font-white">
	<input type="radio" value="#ffffff" name="font_colour" id="font-white" <?php if($font_colour == "#ffffff"){ echo 'checked="checked"'; } ?>> 
	<span class="font-white-button">White</span>
	</label>

	<label for="font-light-grey">
	<input type="radio" value="#cccccc"  name="font_colour" id="font-light-grey" <?php if($font_colour == "#cccccc"){ echo 'checked="checked"'; } ?>> 
	<span class="font-light-grey-button">Light Grey</span>
	</label>

	<label for="font-mid-grey">
	<input type="radio" value="#666666"  name="font_colour" id="font-mid-grey" <?php if($font_colour == "#666666"){ echo 'checked="checked"'; } ?>>
	<span class="font-mid-grey-button">Mid Grey</span>
	</label>
	
	<label for="font-dark-grey">
	<input type="radio" value="#333333"  name="font_colour" id="font-dark-grey" <?php if($font_colour == "#333333"){ echo 'checked="checked"'; } ?>>
	<span class="font-dark-grey-button">Dark Grey</span>
	</label>

	</div>

<?php	
	}
?>	

	<a class="btn btn-primary" href="./update-font-custom.php?content_type=<?php echo $content_type; ?>&content_id=<?php echo $content_id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>&font_colour_custom=<?php echo $font_colour_custom; ?>">
		<?php if($font_colour_custom == 0){ echo "Custom Font Colour"; } else { echo "Default Font Colour"; } ?></a>

</div>	
<hr>


	
<?php
}
?>							 
<!-- If its text Display the font-color css style -->		
	

<!-- If its text Display the font-size css style -->
	
	<?php
	if($content_type == "text" || $content_type == "link" || $content_type == "custom_footer_1_left" || $content_type == "custom_footer_2_left" ){
	?>
				<div class="column-edit-section">
				<label>Font Size:</label>
				<!--<input type="text" name="font_size" value="<?php //echo $font_size; ?>">-->
					
					
					<select name="font_size">
					<option value="10px" <?php if($font_size == "10px"){ echo "selected"; } ?>>10px</option>
					<option value="11px" <?php if($font_size == "11px"){ echo "selected"; } ?>>11px</option>
					<option value="12px" <?php if($font_size == "12px"){ echo "selected"; } ?>>12px</option>
					<option value="13px" <?php if($font_size == "13px"){ echo "selected"; } ?>>13px</option>
					<option value="14px" <?php if($font_size == "14px"){ echo "selected"; } ?>>14px</option>
					<option value="15px" <?php if($font_size == "15px"){ echo "selected"; } ?>>15px</option>
					<option value="16px" <?php if($font_size == "16px"){ echo "selected"; } ?>>16px</option>
					<option value="17px" <?php if($font_size == "17px"){ echo "selected"; } ?>>17px</option>
					<option value="18px" <?php if($font_size == "18px"){ echo "selected"; } ?>>18px</option>
					<option value="19px" <?php if($font_size == "19px"){ echo "selected"; } ?>>19px</option>
					<option value="20px" <?php if($font_size == "20px"){ echo "selected"; } ?>>20px</option>
					<option value="21px" <?php if($font_size == "21px"){ echo "selected"; } ?>>21px</option>
					<option value="22px" <?php if($font_size == "22px"){ echo "selected"; } ?>>22px</option>
					<option value="23px" <?php if($font_size == "23px"){ echo "selected"; } ?>>23px</option>
					<option value="24px" <?php if($font_size == "24px"){ echo "selected"; } ?>>24px</option>	
					</select>
					
					
				
				</div>
				<hr style="color:blue;">
	<?php
	} //end if content is text
	?>
	
<!-- If its text Display the font-size css style -->

	

<!-- Display the add padding section -->
<label>Padding:</label>
<br>
<input type="text" name="padding_1" value="<?php echo $padding_1; ?>" class="input-1">
<input type="text" name="padding_2" value="<?php echo $padding_2; ?>" class="input-1">
<input type="text" name="padding_3" value="<?php echo $padding_3; ?>" class="input-1">
<input type="text" name="padding_4" value="<?php echo $padding_4; ?>" class="input-1">
<br>
<!-- Display the add padding section -->

<hr>
	
<?php
if(empty($cp_insert_name)){
?>
	<!-- Display the add custom padding section -->
	<label>Add responsive custom padding for mobile devices: </label>
	<a class="btn btn-primary" href="./add-custom-padding.php?eshot_column=<?php echo $eshot_column; ?>&content_type=<?php echo $content_type; ?>&content_id=<?php echo $content_id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>&content_position=<?php echo $content_position; ?>">Click Here</a>	
<?php	
}
else {
	echo "<label>Custom padding for mobile devices:</label>";
	echo "<br>";
	echo $row['cp_insert'];
	echo "<br>";
		echo "<br>";
?>
	<a class="btn btn-primary" href="./add-custom-padding.php?eshot_column=<?php echo $eshot_column; ?>&content_type=<?php echo $content_type; ?>&content_id=<?php echo $content_id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>&content_position=<?php echo $content_position; ?>">Edit</a>	
<?php	
}		
?>		



	
	
<!--
<br>
<input type="text" name="custom_padding_1" value="<?php echo $custom_padding_1; ?>" class="input-1">
<input type="text" name="custom_padding_2" value="<?php echo $custom_padding_2; ?>" class="input-1">
<input type="text" name="custom_padding_3" value="<?php echo $custom_padding_3; ?>" class="input-1">
<input type="text" name="custom_padding_4" value="<?php echo $custom_padding_4; ?>" class="input-1">
<br>	
<input name="custom_padding_value" type="radio" value="1" <?php if($custom_padding_value == 1){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:660px)<br>
<input name="custom_padding_value" type="radio" value="2" <?php if($custom_padding_value == 2){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:620px)<br>
<input name="custom_padding_value" type="radio" value="3" <?php if($custom_padding_value == 3){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:420px)	
-->
<!-- Display the add custom padding section -->	
	
<hr>	
	
	
	
<!-- If its an image, display the add href section -->		
<?php
if($content_type == "image"){
?>
<div class="column-edit-section">	
<label>Banner Link:</label>

<!--<span>http://</span>-->
	<?php 
		if($content_position=="left"){
	?>
		<span><input type="text" name="href_left" placeholder="http://" value="<?php echo $href_left; ?>"></span>
	<?php
		} 
		elseif($content_position=="right"){
	?>
		<span><input type="text" name="href_right" placeholder="http://" value="<?php echo $href_right; ?>"></span>
	<?php
		}
		else{
	?>
		<span><input type="text" name="href" placeholder="http://" value="<?php echo $href; ?>"></span>
	<?php
		}
	?>
	
</div>
<hr>	
<?php	
}
?>
<!-- If its an image, display the add href section -->	
	
	

<!-- If its an image, display the add ALT section -->	
<?php
if($content_type == "image"){
?>
<div class="column-edit-section">	
<label>ALT value:</label>
<br>
	
	
	<?php 
		if($content_position=="left"){
	?>
		<input type="text" name="alt_value_left" value="<?php echo $alt_value_left; ?>">
	<?php
		} 
		elseif($content_position=="right"){
	?>
		<input type="text" name="alt_value_right" value="<?php echo $alt_value_right; ?>">
	<?php
		}
		else{
	?>
			<input type="text" name="alt_value" value="<?php echo $alt_value; ?>">
	<?php
		}
	?>
	

	
	
</div>
<hr>	
<?php	
}
?>		
<!-- If its an image, display the add ALT section -->
	
	
	
	
	
<!-- If its an image, display the add image full url section -->	
<?php
if($content_type == "image"){
?>
<div class="column-edit-section">	
<label>Image full URL:</label>
<br>
	
	<span><?php echo $eshot_domain; ?>/</span>
	<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span><!-- Add in value here!!! -->
	<?php //echo $eshot_url_array[0]; ?>
	<?php //echo $eshot_url; ?>
	
	
	<?php 
		if($content_position=="left"){
	?>
		<span><input type="text" class="input-4" name="img_file_name_left" value="<?php echo $img_file_name_left; ?>"></span>
	<?php
		} 
		elseif($content_position=="right"){
	?>
		<span><input type="text" class="input-4" name="img_file_name_right" value="<?php echo $img_file_name_right; ?>"></span>
	<?php
		}
		else{
	?>
			<span><input type="text" class="input-4" name="img_file_name" value="<?php echo $img_file_name; ?>"></span>
	<?php
		}
	?>
	
	

</div>

<hr>

<!--<div class="column-edit-section">-->
<!--    <label>Upload an image to: <strong>--><?php //echo $eshot_domain; ?><!--/--><?php //echo $eshot_url_array[0]; ?><!--</strong></label><br>-->
<!---->
<!-- Upload an image -->
<!--    Select image to upload:-->
<!--    <input type="file" name="fileToUpload" id="fileToUpload">-->
<!-- Upload an image -->
<!---->
<!--</div>-->
<!---->
<!--<hr>-->

<?php
}
?>		
<!-- If its an image, display the add image full url section -->
		
		
<!-- Display the text-align css style -->
		
<div class="column-edit-section">
<label>Text Align (Left, center or right)</label>
<br>

	<?php 
		if($content_position == ""){
	?>
		<select name="text_align">
		<option value="left" <?php if($text_align == "left"){ echo "selected"; } ?>>left</option>
		<option value="center" <?php if($text_align == "center"){ echo "selected"; } ?>>center</option>
		<option value="right" <?php if($text_align == "right"){ echo "selected"; } ?>>right</option>
		<option value="justify" <?php if($text_align == "justify"){ echo "selected"; } ?>>justify</option>	
		</select>
	<?php
		}
		elseif($content_position == "middle"){
	?>
		<select name="text_align">
		<option value="left" <?php if($text_align == "left"){ echo "selected"; } ?>>left</option>
		<option value="center" <?php if($text_align == "center"){ echo "selected"; } ?>>center</option>
		<option value="right" <?php if($text_align == "right"){ echo "selected"; } ?>>right</option>
		<option value="justify" <?php if($text_align == "justify"){ echo "selected"; } ?>>justify</option>	
		</select>	
	<?php
		}
		elseif($content_position == "left"){
	?>
		<select name="text_align_col_left">
		<option value="left" <?php if($text_align_col_left == "left"){ echo "selected"; } ?>>left</option>
		<option value="center" <?php if($text_align_col_left == "center"){ echo "selected"; } ?>>center</option>
		<option value="right" <?php if($text_align_col_left == "right"){ echo "selected"; } ?>>right</option>
		<option value="justify" <?php if($text_align == "justify"){ echo "selected"; } ?>>justify</option>
		</select>	
	<?php
		}
		elseif($content_position == "right"){
	?>
		<select name="text_align_col_right">
		<option value="left" <?php if($text_align_col_right == "left"){ echo "selected"; } ?>>left</option>
		<option value="center" <?php if($text_align_col_right == "center"){ echo "selected"; } ?>>center</option>
		<option value="right" <?php if($text_align_col_right == "right"){ echo "selected"; } ?>>right</option>
		<option value="justify" <?php if($text_align == "justify"){ echo "selected"; } ?>>justify</option>	
		</select>	
	<?php
		}
	?>
	


</div>
<hr>	
							 
<!-- Display the text-align css style -->
		

		
<!-- If its text Display the font-family css style -->
<?php
if($content_type == "text" || $content_type == "link" || $content_type == "custom_footer_1_left" || $content_type == "custom_footer_2_left" || $content_type == "social_icons"){
?>		
<div class="column-edit-section">
<label>Font Family</label>
<br>
<select name="font_family">
	<option value="Times,serif" <?php if($font_family == "Times,serif"){ echo "selected"; } ?>>Times</option>
	<option value="Arial,sans-serif" <?php if($font_family == "Arial,sans-serif"){ echo "selected"; } ?>>Arial</option>
</select>

</div>
<hr>	
<?php
}
?>							 
<!-- If its text Display the font-family css style -->	


	
<!-- If its a horizontal rule Display the color css style -->
<?php
if($content_type == "hr"){
?>		
<div class="column-edit-section">
<label>Colour</label>
<br>
<input type="text" name="font_colour" value="<?php echo $font_colour; ?>">
</div>
<?php
}
?>							 
<!-- If its a horizontal rule Display the color css style -->	
	

		
		
<!-- If its text Display the font-weight css style -->
<?php
if($content_type == "text" || $content_type == "link" || $content_type == "custom_footer_1_left" || $content_type == "custom_footer_2_left" || $content_type == "social_icons"){
?>		
<div class="column-edit-section">
<label>Font Weight (Normal, or bold)</label>
<br>
<select name="font_weight">
	<option value="normal" <?php if($font_weight == "normal"){ echo "selected"; } ?>>normal</option>
	<option value="bold" <?php if($font_weight == "bold"){ echo "selected"; } ?>>bold</option>
</select>

</div>
<hr>	
<?php
}
?>							 
<!-- If its text Display the font-weight css style -->					
		
		
<!-- If its text Display the line-height css style -->
<?php
if($content_type == "text" || $content_type == "link" || $content_type == "custom_footer_1_left" || $content_type == "custom_footer_2_left" ){
?>		
<div class="column-edit-section">
<label>Line Height</label>
<br>
					<!--<input type="text" name="line_height" value="<?php //echo $line_height; ?>">-->
	
	
					<select name="line_height">
					<option value="14px" <?php if($line_height == "14px"){ echo "selected"; } ?>>14px</option>
					<option value="15px" <?php if($line_height == "15px"){ echo "selected"; } ?>>15px</option>
					<option value="16px" <?php if($line_height == "16px"){ echo "selected"; } ?>>16px</option>
					<option value="17px" <?php if($line_height == "17px"){ echo "selected"; } ?>>17px</option>
					<option value="18px" <?php if($line_height == "18px"){ echo "selected"; } ?>>18px</option>
					<option value="19px" <?php if($line_height == "19px"){ echo "selected"; } ?>>19px</option>
					<option value="20px" <?php if($line_height == "20px"){ echo "selected"; } ?>>20px</option>
					<option value="21px" <?php if($line_height == "21px"){ echo "selected"; } ?>>21px</option>
					<option value="22px" <?php if($line_height == "22px"){ echo "selected"; } ?>>22px</option>
					<option value="23px" <?php if($line_height == "23px"){ echo "selected"; } ?>>23px</option>
					<option value="24px" <?php if($line_height == "24px"){ echo "selected"; } ?>>24px</option>
					<option value="25px" <?php if($line_height == "25px"){ echo "selected"; } ?>>25px</option>
					<option value="26px" <?php if($line_height == "26px"){ echo "selected"; } ?>>26px</option>
					<option value="27px" <?php if($line_height == "27px"){ echo "selected"; } ?>>27px</option>	
					</select>	
	
</div>
<hr>	
<?php
}
?>							 
<!-- If its text Display the line-height css style -->	
		

<!-- If its text Display the text content for the column -->		

<?php
if($content_type == "text"){

		if($content_position == "middle" ){
		?>
			<div class="column-edit-section">
			<label>Column Text </label>
			<br>
				<textarea name="content" style="width: 610px; height: 250px;" id="editor"><?php echo $content; ?></textarea>
			</div>	
			<hr>	
		<?php		
		}
		elseif($content_position == "right" ){
		?>
			<div class="column-edit-section">
			<label>Column Text Right</label>
			<br>
				<textarea name="content_right" style="width: 610px; height: 250px;" id="editor"><?php echo $content_right; ?></textarea>
			</div>
			<hr>	
		<?php		
		}
		elseif($content_position == "left" ){
		?>
			<div class="column-edit-section">
			<label>Column Text Left</label>
			<br>
				<textarea name="content_left" style="width: 610px; height: 250px;" id="editor"><?php echo $content_left; ?></textarea>
			</div>
			<hr>	
		<?php		
		}
		else{
		?>	
			<div class="column-edit-section">
			<label>Column Text</label>
			<br>
				<textarea name="content" style="width: 610px; height: 250px;" id="editor"><?php echo $content; ?></textarea>
			</div>
			<hr>	
		<?php
		}
?>	
	
	<script src="/ckeditor/ckeditor.js"></script>
	<script src="/ckeditor/samples/js/sample.js"></script>
	<script>
		initEditor();
	</script>
	<script type="text/javascript">
		$(function() {
			$('#editor').ckeditor({
				toolbar: 'Full',
				enterMode : CKEDITOR.ENTER_BR,
				shiftEnterMode: CKEDITOR.ENTER_P
			});
		});
	</script>
	
<?php
}//end if content type text


// If content type is custom footer 1 left

if($content_type == "custom_footer_1_left") {
?>
    <div class="column-edit-section">
        <label>Column Text </label>
        <br>
        <textarea name="content_left" style="width: 610px; height: 250px;" id="editor"><?php echo $content_left; ?></textarea>
    </div>
    <hr>
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/samples/js/sample.js"></script>
    <script>
        initEditor();
    </script>
    <script type="text/javascript">
        $(function() {
            $('#editor').ckeditor({
                toolbar: 'Full',
                enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    </script>
    <p>Include Social Icons:</p>

    <label>Facebook</label>
    <input type="checkbox" name="social_icon_1" value="1" <?php if($social_icon_1 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Twitter</label>
    <input type="checkbox" name="social_icon_2" value="1" <?php if($social_icon_2 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Youtube</label>
    <input type="checkbox" name="social_icon_3" value="1" <?php if($social_icon_3 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Linkedin</label>
    <input type="checkbox" name="social_icon_4" value="1" <?php if($social_icon_4 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Instagram</label>
    <input type="checkbox" name="social_icon_5" value="1" <?php if($social_icon_5 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <br>
    <label>Social Icon Margin Top</label>
    <input type="text" name="si_margin_top" class="input-1" value="<?php echo $si_margin_top; ?>">
    <label>Social Icon Padding</label>
    <input type="text" name="si_padding" class="input-1" value="<?php echo $si_padding; ?>">
    <label>Social Icon Width</label>
    <input type="text" name="si_width" class="input-1" value="<?php echo $si_width; ?>">

    <hr>
        <label>Include "find us on text" with social icons:</label>
        <select name="find_us_on">
            <option value="1" <?php if($find_us_on == "1"){ echo "selected"; } ?>>Yes</option>
            <option value="0" <?php if($find_us_on == "0"){ echo "selected"; } ?>>No</option>
        </select>

    <hr>

    <p>Upload custom social media icons and then reference the image urls below</p>

    <label style="width:210px;"><strong>Custom Facebook Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_1" class="" placeholder="Your File Name..." value="<?php echo $si_url_1; ?>"><br>
    <label style="width:210px;"><strong>Custom Twitter Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_2" class="" placeholder="Your File Name..." value="<?php echo $si_url_2; ?>"><br>
    <label style="width:210px;"><strong>Custom YouTube Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_3" class="" placeholder="Your File Name..." value="<?php echo $si_url_3; ?>"><br>
    <label style="width:210px;"><strong>Custom LinkedIn Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_4" class="" placeholder="Your File Name..." value="<?php echo $si_url_4; ?>"><br>
    <label style="width:210px;"><strong>Custom Instagram Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_5" class="" placeholder="Your File Name..." value="<?php echo $si_url_5; ?>"><br>

    <hr>

    <p>Add social media links:</p>

    <label style="width:150px;"><strong>Facebook URL: </strong></label>
    <input type="text" name="si_link_1" class="" placeholder="Social Media URL..." value="<?php echo $si_link_1; ?>"><br>
    <label style="width:150px;"><strong>Twitter URL: </strong></label>
    <input type="text" name="si_link_2" class="" placeholder="Social Media URL..." value="<?php echo $si_link_2; ?>"><br>
    <label style="width:150px;"><strong>YouTube URL: </strong></label>
    <input type="text" name="si_link_3" class="" placeholder="Social Media URL..." value="<?php echo $si_link_3; ?>"><br>
    <label style="width:150px;"><strong>LinkedIn URL: </strong></label>
    <input type="text" name="si_link_4" class="" placeholder="Social Media URL..." value="<?php echo $si_link_4; ?>"><br>
    <label style="width:150px;"><strong>Instagram URL: </strong></label>
    <input type="text" name="si_link_5" class="" placeholder="Social Media URL..." value="<?php echo $si_link_5; ?>"><br>

    <hr>

<?php
}
// End if content type is custom footer 1 left



// If content type is custom footer 1 right

if($content_type == "custom_footer_1_right") {

?>
    <label>Image full URL:</label>
    <br>

    <span><?php echo $eshot_domain; ?>/</span>
    <span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
    <span><input type="text" class="input-4" name="footer_logo_right" value="<?php echo $content_right; ?>"></span>
    <hr>
    <br>

<?php
}
// End If content type is custom footer 1 right


// If content type is custom footer 2 left

if($content_type == "custom_footer_2_left") {
    ?>
    <div class="column-edit-section">
        <label>Column Text </label>
        <br>
        <textarea name="content_left" style="width: 610px; height: 250px;" id="editor"><?php echo $content_left; ?></textarea>
    </div>
    <hr>
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/samples/js/sample.js"></script>
    <script>
        initEditor();
    </script>
    <script type="text/javascript">
        $(function() {
            $('#editor').ckeditor({
                toolbar: 'Full',
                enterMode : CKEDITOR.ENTER_BR,
                shiftEnterMode: CKEDITOR.ENTER_P
            });
        });
    </script>


    <?php
}
// End if content type is custom footer 2 left



// If content type is custom footer 2 right

if($content_type == "custom_footer_2_right") {

    ?>

    <p>Include Social Icons:</p>

    <label>Facebook</label>
    <input type="checkbox" name="social_icon_1" value="1" <?php if($social_icon_1 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Twitter</label>
    <input type="checkbox" name="social_icon_2" value="1" <?php if($social_icon_2 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Youtube</label>
    <input type="checkbox" name="social_icon_3" value="1" <?php if($social_icon_3 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Linkedin</label>
    <input type="checkbox" name="social_icon_4" value="1" <?php if($social_icon_4 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Instagram</label>
    <input type="checkbox" name="social_icon_5" value="1" <?php if($social_icon_5 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <br>
    <label>Social Icon Margin Top</label>
    <input type="text" name="si_margin_top" class="input-1" value="<?php echo $si_margin_top; ?>">
    <label>Social Icon Padding</label>
    <input type="text" name="si_padding" class="input-1" value="<?php echo $si_padding; ?>">
    <label>Social Icon Width</label>
    <input type="text" name="si_width" class="input-1" value="<?php echo $si_width; ?>">

    <hr>

    <p>Upload custom social media icons and then reference the image urls below</p>

    <label style="width:210px;"><strong>Custom Facebook Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_1" class="" placeholder="Your File Name..." value="<?php echo $si_url_1; ?>"><br>
    <label style="width:210px;"><strong>Custom Twitter Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_2" class="" placeholder="Your File Name..." value="<?php echo $si_url_2; ?>"><br>
    <label style="width:210px;"><strong>Custom YouTube Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_3" class="" placeholder="Your File Name..." value="<?php echo $si_url_3; ?>"><br>
    <label style="width:210px;"><strong>Custom LinkedIn Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_4" class="" placeholder="Your File Name..." value="<?php echo $si_url_4; ?>"><br>
    <label style="width:210px;"><strong>Custom Instagram Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_5" class="" placeholder="Your File Name..." value="<?php echo $si_url_5; ?>"><br>

    <hr>

    <p>Add social media links:</p>

    <label style="width:150px;"><strong>Facebook URL: </strong></label>
    <input type="text" name="si_link_1" class="" placeholder="Social Media URL..." value="<?php echo $si_link_1; ?>"><br>
    <label style="width:150px;"><strong>Twitter URL: </strong></label>
    <input type="text" name="si_link_2" class="" placeholder="Social Media URL..." value="<?php echo $si_link_2; ?>"><br>
    <label style="width:150px;"><strong>YouTube URL: </strong></label>
    <input type="text" name="si_link_3" class="" placeholder="Social Media URL..." value="<?php echo $si_link_3; ?>"><br>
    <label style="width:150px;"><strong>LinkedIn URL: </strong></label>
    <input type="text" name="si_link_4" class="" placeholder="Social Media URL..." value="<?php echo $si_link_4; ?>"><br>
    <label style="width:150px;"><strong>Instagram URL: </strong></label>
    <input type="text" name="si_link_5" class="" placeholder="Social Media URL..." value="<?php echo $si_link_5; ?>"><br>

    <hr>

    <?php
}
// End If content type is custom footer 2 right



// If content type is social icons
if($content_type == "social_icons") {
    ?>
    <p>Include Social Icons:</p>

    <label>Facebook</label>
    <input type="checkbox" name="social_icon_1" value="1" <?php if($social_icon_1 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Twitter</label>
    <input type="checkbox" name="social_icon_2" value="1" <?php if($social_icon_2 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Youtube</label>
    <input type="checkbox" name="social_icon_3" value="1" <?php if($social_icon_3 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Linkedin</label>
    <input type="checkbox" name="social_icon_4" value="1" <?php if($social_icon_4 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <label>Instagram</label>
    <input type="checkbox" name="social_icon_5" value="1" <?php if($social_icon_5 == 1 ) { echo "checked";} ?> style="display:inline; margin-right:5px;">
    <br>
    <label>Social Icon Margin Top</label>
    <input type="text" name="si_margin_top" class="input-1" value="<?php echo $si_margin_top; ?>">
    <label>Social Icon Padding</label>
    <input type="text" name="si_padding" class="input-1" value="<?php echo $si_padding; ?>">
    <label>Social Icon Width</label>
    <input type="text" name="si_width" class="input-1" value="<?php echo $si_width; ?>">

    <hr>

    <label>Include "find us on text" with social icons:</label>
    <select name="find_us_on">
        <option value="1" <?php if($find_us_on == "1"){ echo "selected"; } ?>>Yes</option>
        <option value="0" <?php if($find_us_on == "0"){ echo "selected"; } ?>>No</option>
    </select>

    <hr>

    <p>Upload custom social media icons and then reference the image urls below:</p>

    <label style="width:210px;"><strong>Custom Facebook Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_1" class="" placeholder="Your File Name..." value="<?php echo $si_url_1; ?>"><br>
    <label style="width:210px;"><strong>Custom Twitter Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_2" class="" placeholder="Your File Name..." value="<?php echo $si_url_2; ?>"><br>
    <label style="width:210px;"><strong>Custom YouTube Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_3" class="" placeholder="Your File Name..." value="<?php echo $si_url_3; ?>"><br>
    <label style="width:210px;"><strong>Custom LinkedIn Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_4" class="" placeholder="Your File Name..." value="<?php echo $si_url_4; ?>"><br>
    <label style="width:210px;"><strong>Custom Instagram Icon: </strong></label>
    <span><?php echo $eshot_domain; ?>/</span><span><?php echo $eshot_url_array[0]; ?></span> <input type="text" name="si_url_5" class="" placeholder="Your File Name..." value="<?php echo $si_url_5; ?>"><br>

    <hr>

    <p>Add social media links:</p>

    <label style="width:150px;"><strong>Facebook URL: </strong></label>
    <input type="text" name="si_link_1" class="" placeholder="Social Media URL..." value="<?php echo $si_link_1; ?>"><br>
    <label style="width:150px;"><strong>Twitter URL: </strong></label>
    <input type="text" name="si_link_2" class="" placeholder="Social Media URL..." value="<?php echo $si_link_2; ?>"><br>
    <label style="width:150px;"><strong>YouTube URL: </strong></label>
    <input type="text" name="si_link_3" class="" placeholder="Social Media URL..." value="<?php echo $si_link_3; ?>"><br>
    <label style="width:150px;"><strong>LinkedIn URL: </strong></label>
    <input type="text" name="si_link_4" class="" placeholder="Social Media URL..." value="<?php echo $si_link_4; ?>"><br>
    <label style="width:150px;"><strong>Instagram URL: </strong></label>
    <input type="text" name="si_link_5" class="" placeholder="Social Media URL..." value="<?php echo $si_link_5; ?>"><br>

    <hr>

    <?php
}
// End If content type is social icons
?>
		

	
	
<!-- If its a custom table 3 rows Display the content  -->	
<?php
if($content_type == "custom-table-3"){
?>	
	
	<?php 
		if($content_position=="left"){
	?>
		<div class="column-edit-section">
		<label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_left_1" value="<?php echo $ct_img_file_name_left_1; ?>"></span>
		<br>
	
		<label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_left_2" value="<?php echo $ct_img_file_name_left_2; ?>"></span>
		<br>
		
		<label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_left_3" value="<?php echo $ct_img_file_name_left_3; ?>"></span>
		<br>
			
		<label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_left_1" placeholder="http://" value="<?php echo $row['ct_img_url_left_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_1']; ?>"></span>	
		<br>
			
		<label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_left_2" placeholder="http://" value="<?php echo $row['ct_img_url_left_2']; ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>		
		<span><input type="text" class="input-4" name="ct_img_alt_left_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_2']; ?>"></span>
		<br>
			
		<label><strong>Image 3 link:</strong></label>		
		<span><input type="text" class="input-4" name="ct_img_url_left_3" placeholder="http://" value="<?php echo $row['ct_img_url_left_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_3']; ?>"></span>	
	<?php
		} 
		elseif($content_position=="right") {
	?>
		<label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_right_1" value="<?php echo $ct_img_file_name_right_1; ?>"></span>
		<br>
			
		<label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_right_2" value="<?php echo $ct_img_file_name_right_2; ?>"></span>
		<br>
	
		<label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_right_3" value="<?php echo $ct_img_file_name_right_3; ?>"></span>		
		<br>
			
		<label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_1" placeholder="http://" value="<?php echo $row['ct_img_url_right_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_1']; ?>"></span>	
		<br>
			
		<label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_2" placeholder="http://" value="<?php echo $row['ct_img_url_right_2']; ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_2']; ?>"></span>	
		<br>
			
		<label><strong>Image 3 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_3" placeholder="http://" value="<?php echo $row['ct_img_url_right_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_3']; ?>"></span>	
			
	<?php
		}
	else {
	?>
			
		<label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_1" value="<?php echo $ct_img_file_name_1; ?>"></span>
		<br>
			
		<label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_2" value="<?php echo $ct_img_file_name_2; ?>"></span>
		<br>
	
		<label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_3" value="<?php echo $ct_img_file_name_3; ?>"></span>		
		<br>
			
		<label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_1" placeholder="http://" value="<?php echo $row['ct_img_url_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_1']; ?>"></span>	
		<br>
			
		<label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_2" placeholder="http://" value="<?php echo $row['ct_img_url_2']; ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_2']; ?>"></span>	
		<br>
			
		<label><strong>Image 3 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_3" placeholder="http://" value="<?php echo $row['ct_img_url_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_3']; ?>"></span>	
			
			
	<?php		
	}
	?>

</div>	
<hr>	
	
<?php	
}
?>
<!-- If its a custom table 3 rows Display the content  -->	
	
<!-- If its a custom table 4 rows Display the content  -->		
<?php
if($content_type == "custom-table-4"){
?>
			
		<?php 
		if($content_position=="left"){
	?>
		<div class="column-edit-section"><label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_left_1" value="<?php echo $ct_img_file_name_left_1; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_left_2" value="<?php echo $ct_img_file_name_left_2; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_left_3" value="<?php echo $ct_img_file_name_left_3; ?>"></span>

		<br>
		<div class="column-edit-section"><label><strong>Image 4 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_left_4" value="<?php echo $ct_img_file_name_left_4; ?>"></span>
		<br>
			
		<div class="column-edit-section"><label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_left_1" placeholder="http://" value="<?php echo $row['ct_img_url_left_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_1']; ?>"></span>	
		<br>	
		<div class="column-edit-section"><label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_left_2" placeholder="http://" value="<?php echo $row['ct_img_url_left_2']; ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_2']; ?>"></span>	
		<br>	
		<div class="column-edit-section"><label><strong>Image 3 link:</strong></label>		
		<span><input type="text" class="input-4" name="ct_img_url_left_3" placeholder="http://" value="<?php echo $row['ct_img_url_left_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_3']; ?>"></span>	
		<br>	
		<div class="column-edit-section"><label><strong>Image 4 link:</strong></label>		
		<span><input type="text" class="input-4" name="ct_img_url_left_4" placeholder="http://" value="<?php echo $row['ct_img_url_left_4']; ?>"></span>
		<label><strong>Image 4 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_left_4" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_left_4']; ?>"></span>	
	<?php
		} 
		elseif($content_position=="right") {
	?>
		<div class="column-edit-section"><label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_right_1" value="<?php echo $ct_img_file_name_right_1; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_right_2" value="<?php echo $ct_img_file_name_right_2; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_right_3" value="<?php echo $ct_img_file_name_right_3; ?>"></span>
		<br>
			
		<div class="column-edit-section"><label><strong>Image 4 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_right_4" value="<?php echo $ct_img_file_name_right_4; ?>"></span>
		<br>
			
		<div class="column-edit-section"><label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_1" placeholder="http://" value="<?php echo $row['ct_img_url_right_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_1']; ?>"></span>	
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_2" placeholder="http://" value="<?php echo $row['ct_img_url_right_2'] ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_2']; ?>"></span>	
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 3 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_3" placeholder="http://" value="<?php echo $row['ct_img_url_right_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_3']; ?>"></span>	
			
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 4 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_right_4" placeholder="http://" value="<?php echo $row['ct_img_url_right_4']; ?>"></span>
		<label><strong>Image 4 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_right_4" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_right_4']; ?>"></span>	
			
	<?php
		}
	else {
	?>
		<div class="column-edit-section"><label><strong>Image 1 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>
		<span><input type="text" class="input-4" name="ct_img_file_name_1" value="<?php echo $ct_img_file_name_1; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 2 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_2" value="<?php echo $ct_img_file_name_2; ?>"></span>
		<br>
	
		<div class="column-edit-section"><label><strong>Image 3 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_3" value="<?php echo $ct_img_file_name_3; ?>"></span>
		<br>
			
		<div class="column-edit-section"><label><strong>Image 4 full URL:</strong></label>	
		<span><?php echo $eshot_domain; ?>/</span>
		<span><input type="text" class="input-4" name="eshot_url" value="<?php echo $eshot_url_array[0]; ?>"></span>	
		<span><input type="text" class="input-4" name="ct_img_file_name_4" value="<?php echo $ct_img_file_name_4; ?>"></span>
		<br>
			
		<div class="column-edit-section"><label><strong>Image 1 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_1" placeholder="http://" value="<?php echo $row['ct_img_url_1']; ?>"></span>
		<label><strong>Image 1 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_1" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_1']; ?>"></span>		
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 2 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_2" placeholder="http://" value="<?php echo $row['ct_img_url_2'] ?>"></span>
		<label><strong>Image 2 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_2" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_2']; ?>"></span>		
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 3 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_3" placeholder="http://" value="<?php echo $row['ct_img_url_3']; ?>"></span>
		<label><strong>Image 3 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_3" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_3']; ?>"></span>		
		<br>	
			
		<div class="column-edit-section"><label><strong>Image 4 link:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_url_4" placeholder="http://" value="<?php echo $row['ct_img_url_4']; ?>"></span>
		<label><strong>Image 4 alt value:</strong></label>	
		<span><input type="text" class="input-4" name="ct_img_alt_4" placeholder="Alt value here..." value="<?php echo $row['ct_img_alt_4']; ?>"></span>		
			
	<?php		
	}
	?>

</div>	
<hr>			
<!-- If its a custom table 4 rows Display the content  -->			
			
<?php			
}
?>	
	
	
	
	
<input type="hidden" name="column_edit_id" value="<?php echo $id; ?>">
<input type="hidden" name="content_position" value="<?php echo $content_position; ?>">
<input type="hidden" name="content_type" value="<?php echo $content_type; ?>">
<input type="hidden" name="eshot_id" value="<?php echo $eshot_id; ?>">
<input type="hidden" name="eshot_name" value="<?php echo $eshot_name; ?>">		


	
<input type="submit" name="submit" value="submit" class="btn btn-primary">	

</form>
<br>
<br>	
<div class="menu-left-2">
<a class="btn btn-primary" href="./eshot-builder.php?eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>"><i class="fa fa-fw">&#xf060</i> return</a>
<br>
<br>
</div>
</div>		
<?php
	}
?>
		

		
</body>
</html>	