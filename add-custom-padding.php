<?php
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }
$eshot_column = $_GET['eshot_column'];
$content_type = $_GET['content_type'];
$content_position = $_GET['content_position'];
$content_id = $_GET['content_id'];
$eshot_id = $_GET['eshot_id'];
$eshot_name = $_GET['eshot_name'];
include 'config.php';
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">	
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
</head>

<body>
<div class="container home-padding">		
	<div class="column-edit-section">
<?php
if($eshot_column == "1"){
	echo "<h2>Column 1 Custom Padding - #" . $content_id .  "</h2>";
}
		
elseif($eshot_column == "2"){
	echo "<h2>Column 2 (". $content_position .") Custom Padding - #" . $content_id . "</h2>";
}
		
elseif($eshot_column == "3") {
	echo "<h2>Column 3 (". $content_position .") Custom Padding - #" . $content_id . "</h2>";
}
elseif($eshot_column == "4") {
	echo "<h2>Horizontal Rule Custom Padding - #" . $content_id . "</h2>";
}
else {
	echo "<h2>View In Browser Link Custom Padding - #" . $content_id . "</h2>";
}		
?>		<div class="menu-left-5">
			<h4>Add new padding style for #<?php echo $content_id; ?></h4>
			<form action="add-custom-padding-insert.php" method="post" id="custom-padding">
			<!--
			<label>Custom Padding Name:</label><br>	
			<input type="text" name="custom_padding_name" value="<?php //echo $custom_padding_name; ?>"><br>-->

			<label>Custom Padding Values:</label><br>		
			<input type="text" name="custom_padding_1" value="<?php echo $custom_padding_1; ?>" class="input-1">
			<input type="text" name="custom_padding_2" value="<?php echo $custom_padding_2; ?>" class="input-1">
			<input type="text" name="custom_padding_3" value="<?php echo $custom_padding_3; ?>" class="input-1">
			<input type="text" name="custom_padding_4" value="<?php echo $custom_padding_4; ?>" class="input-1">

			<br>
			<label>Breakpoint Values:</label><br>	
			<input name="custom_padding_value" type="radio" value="1" <?php if($custom_padding_value == 1){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:660px)<br>
			<input name="custom_padding_value" type="radio" value="2" <?php if($custom_padding_value == 2){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:620px)<br>
			<input name="custom_padding_value" type="radio" value="3" <?php if($custom_padding_value == 3){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:420px)<br>
				<br>
			<input type="submit" name="submit" value="add" class="btn btn-primary">
			<input type="hidden" name="content_position" value="<?php echo $content_position ?>">
			<input type="hidden" name="eshot_column" value="<?php echo $eshot_column ?>">
			<input type="hidden" name="content_type" value="<?php echo $content_type ?>">
			<input type="hidden" name="content_id" value="<?php echo $content_id ?>">
			<input type="hidden" name="eshot_id" value="<?php echo $eshot_id ?>">
			<input type="hidden" name="eshot_name" value="<?php echo $eshot_name ?>">	
			</form>
		</div>
		


				
<?php					

					$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	

					//grab the custon padding values from the database
					$sth = $conn->prepare("SELECT * from $tbl_name_custom_padding");
					$sth->execute(array());
					$records = $sth->fetchAll();
					$count = count($records);

					if(count($records) != 0) {
						echo '<div class="menu-left-5"><hr></div>';
						echo '<div class="menu-left-5">';
						echo '<h4>Insert new padding style for #'.$content_id.'</h4>';
						echo '<form action="add-custom-padding-insert-2.php" method="post" id="custom-padding-2">';
						echo '<select name="cp_insert">';		
						foreach ($records as $row) {
?>
						<option value="<?php echo $row['custom_padding_value']; ?> <?php echo $row['custom_padding_name']; ?> padding:<?php echo $row['custom_padding_1'].'px '.$row['custom_padding_2'].'px '.$row['custom_padding_3'].'px '.$row['custom_padding_4'].'px' ?> ">
							<?php echo $row['custom_padding_name']."&nbsp;- (".$row['custom_padding_1'].'px '.$row['custom_padding_2'].'px '.$row['custom_padding_3'].'px '.$row['custom_padding_4'].'px'.")"; ?> - <?php if($row['custom_padding_value']==1){echo '@660px';}elseif($row['custom_padding_value']==2){echo '@620px';}else{echo '@480px';} ?>
						</option>
<?php					
						}
						echo "</select><br><br>";
						echo '<input type="hidden" name="custom_padding_value" value="'.$row['custom_padding_value'].'">';
						echo '<input type="hidden" name="custom_padding_name" value="'.$row['custom_padding_name'].'">';
						echo '<input type="hidden" name="eshot_column" value="'.$eshot_column.'">';
						echo '<input type="hidden" name="content_type" value="'.$content_type.'">';
						echo '<input type="hidden" name="content_id" value="'.$content_id.'">';
						echo '<input type="hidden" name="eshot_id" value="'.$eshot_id.'">';
						echo '<input type="hidden" name="eshot_name" value="'.$eshot_name.'">';
						echo '<input type="hidden" name="content_position" value="'.$content_position.'">';
						echo '<input type="submit" name="submit" value="insert" class="btn btn-primary">';
						echo '</form>';
					}
					else {
						echo '';
					}
?>															
				
					
				
					
				
				
		</div>
		
		<br>
		
		<div class="menu-left-5">
			<a class="btn btn-primary" href="./column-edit.php?content_type=<?php echo $content_type; ?>&content_id=<?php echo $content_id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>&content_position=<?php echo $content_position; ?>"><i class="fa fa-fw">&#xf060</i> return</a>
		</div>	
		
	</div>
</div>

	
</body>
</html>