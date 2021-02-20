<?php
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// count the results
// insert sortable list id into DB
$id = $row['id'];
$sth = $conn->prepare("SELECT * from $tbl_name WHERE `id` = :id");
$sth->execute(array(':id' => $id));
$records = $sth->fetchAll();
$count = count($records);

foreach ($records as $row) {
	$font_colour = $row['font_colour'];
	$padding_1 = $row['padding_1'];
	$padding_2 = $row['padding_2'];
	$padding_3 = $row['padding_3'];
	$padding_4 = $row['padding_4'];
	$col_bg_colour = $row['col_bg_colour'];
	$cp_insert_name = $row['cp_insert_name'];
?>
<tr>	
<th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="banner" bgcolor="<?php echo $col_bg_colour; ?>" style="padding:<?php echo $padding_1; ?>px <?php echo $padding_2; ?>px <?php echo $padding_3; ?>px <?php echo $padding_4; ?>px; <?php if(!empty($font_colour)){ echo "color:".$font_colour.";";  } ?>">

		<hr style="color:<?php echo $font_colour; ?>">

<?php
}//end foreach
?>
</th>	
</tr>