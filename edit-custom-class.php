<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }
include 'config.php';
if(!empty($_GET['id'])){
	echo "ID = " . $id = $_GET['id'];
}
if(!empty($_GET['eshot_id'])){
	echo "eshot_ID = " . $eshot_id = $_GET['eshot_id'];
}
if(!empty($_GET['eshot_name'])){
	echo "eshot_name = " . $eshot_name = $_GET['eshot_name'];
}

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
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
<?php include 'includes/header-basic.php'; ?>	

		


<div class="container home-padding">		
<div class="column-edit-section edit-class">
<?php
$sth = $conn->prepare("SELECT * from $tbl_name_custom_class where id = :id");

	$sth->execute(array(':id' => $id));
	$records = $sth->fetchAll();
	$count = count($records);
	if(count($records) != 0) {
	
		foreach ($records as $row) {								
			$custom_class_name = $row['custom_class_name'];
			$custom_class_width = $row['custom_class_width'];
			$custom_class_height = $row['custom_class_height'];
			$custom_class_font_size = $row['custom_class_font_size'];
			$custom_class_text_align = $row['custom_class_text_align'];
			$custom_class_text_float = $row['custom_class_text_float'];
			$custom_class_margin = $row['custom_class_margin'];
			$custom_class_padding = $row['custom_class_padding'];
			$custom_class_margin = $row['custom_class_margin'];
			$media_width = $row['media_width'];

		}
	}
	?>	
	<h2>Edit Class - #<?php echo $row['id']; ?></h2>
	<form method="post" action="update-custom-class.php">
		<label>Name:</label>
		<input type="text" name="custom_class_name" value="<?php echo $custom_class_name; ?>" placeholder="No Value..."><br>
		<label>Width:</label>
		<input type="text" name="custom_class_width" value="<?php echo $custom_class_width; ?>" placeholder="No Value..."><br>
		<label>Height:</label>
		<input type="text" name="custom_class_height" value="<?php echo $custom_class_height; ?>" placeholder="No Value..."><br>
		<label>Font-Size:</label>
		<input type="text" name="custom_class_font_size" value="<?php echo $custom_class_font_size; ?>" placeholder="No Value..."><br>
		<label>Text-Align:</label>
		<select name="custom_class_text_align">
			<option <?php if(empty($custom_class_text_align)){ echo "selected"; } ?>>no-value</option>
			<option value="left" <?php if($custom_class_text_align == "left"){ echo "selected"; } ?>>Left</option>
			<option value="center" <?php if($custom_class_text_align == "center"){ echo "selected"; } ?>>Center</option>
			<option value="right" <?php if($custom_class_text_align == "right"){ echo "selected"; } ?>>Right</option>
			<option value="justify" <?php if($custom_class_text_align == "justify"){ echo "selected"; } ?>>Justify</option>
		</select><br>
		<label>Float:</label>
		<select name="custom_class_text_float">
			<option <?php if(empty($custom_class_text_float)){ echo "selected"; } ?>>no-value</option>
			<option value="left" <?php if($custom_class_text_float == "left"){ echo "selected"; } ?>>left</option>
			<option value="right" <?php if($custom_class_text_float == "right"){ echo "selected"; } ?>>right</option>
			<option value="none" <?php if($custom_class_text_float == "none"){ echo "selected"; } ?>>none</option>
		</select><br>
		<label>Margin:</label>
		<input type="text" name="custom_class_margin" value="<?php echo $custom_class_margin; ?>" placeholder="No Value..."><br>
		<label>Padding:</label>
		<input type="text" name="custom_class_padding" value="<?php echo $custom_class_padding; ?>" placeholder="No Value..."><br>
		
		<input type="radio" name="media_width" value="1" <?php if($media_width == 1){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:660px)<br>
		<input type="radio" name="media_width" value="2" <?php if($media_width == 2){ echo 'checked="checked"'; } ?>> @media only screen and (max-width:620px)<br><br>
		
		<input type="hidden" name="edit_class_id" value="<?php echo $id; ?>">
		<input type="hidden" name="eshot_id" value="<?php echo $eshot_id; ?>">
		<input type="hidden" name="eshot_name" value="<?php echo $eshot_name; ?>">
		
		<input type="submit" name="submit" value="Update" class="btn btn-primary">	
	<?php
				

			
		
	?>	
	</form>
	

<br>
<br>	
<div class="menu-left-2">
<a class="btn btn-primary" href="./eshot-builder.php?eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>"><i class="fa fa-fw">&#xf060</i> Return</a>
</div>			
			
		


</div>
</div>
	
</body>
</html>




