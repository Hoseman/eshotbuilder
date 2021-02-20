<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }
if(!empty($_GET['eshot_id'])){
	$eshot_id = $_GET['eshot_id'];
}
else {
	header('Location: ./index.php');
}
if(!empty($_GET['eshot_name'])){
	$eshot_name = $_GET['eshot_name'];
}
else {
	header('Location: ./index.php');
}
include 'config.php';

if(isset($_POST['submit'])){
	
	$eshot_column = $_POST['columns'];
	$eshot_name = $_POST['eshot_name'];
	$eshot_url = $_POST['eshot_url'];
	
	
	//what padding values are we inserting in the database
	if($eshot_column == 1){
		$padding_1 = 0;
		$padding_2 = 0;
		$padding_3 = 0;
		$padding_4 = 0;
		$font_colour = "";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = "";
        $social_icon_2 = "";
        $social_icon_3 = "";
        $social_icon_4 = "";
        $social_icon_5 = "";
        $si_width = "";
		$content_type = "";
	}
	elseif($eshot_column == 4){
		$padding_1 = 20;
		$padding_2 = 20;
		$padding_3 = 20;
		$padding_4 = 20;
		$font_colour = "#000000";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = "";
        $social_icon_2 = "";
        $social_icon_3 = "";
        $social_icon_4 = "";
        $social_icon_5 = "";
        $si_width = "";
		$content_type = "hr";
	}
	elseif($eshot_column == 5){
		$padding_1 = 5;
		$padding_2 = 20;
		$padding_3 = 5;
		$padding_4 = 20;
		$font_colour = "#000000";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = "";
        $social_icon_2 = "";
        $social_icon_3 = "";
        $social_icon_4 = "";
        $social_icon_5 = "";
        $si_width = "";
		$content_type = "link";
	}
    elseif($eshot_column == 6){
        $padding_1 = 20;
        $padding_2 = 20;
        $padding_3 = 20;
        $padding_4 = 20;
        $font_colour = "#000000";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = 1;
        $social_icon_2 = 1;
        $social_icon_3 = 1;
        $social_icon_4 = 1;
        $social_icon_5 = 1;
        $si_width = 20;
        $content_type = "social_icons";
    }
    elseif($eshot_column == 7){
        $padding_1 = 20;
        $padding_2 = 20;
        $padding_3 = 20;
        $padding_4 = 20;
        $font_colour = "";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = 1;
        $social_icon_2 = 1;
        $social_icon_3 = 1;
        $social_icon_4 = 1;
        $social_icon_5 = 1;
        $si_width = 20;
        $content_type = "footer_1";
    }
    elseif($eshot_column == 8){
        $padding_1 = 20;
        $padding_2 = 20;
        $padding_3 = 20;
        $padding_4 = 20;
        $font_colour = "";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = 1;
        $social_icon_2 = 1;
        $social_icon_3 = 1;
        $social_icon_4 = 1;
        $social_icon_5 = 1;
        $si_width = 20;
        $content_type = "footer_2";
    }
	elseif($eshot_column == 9){
		$padding_1 = 5;
		$padding_2 = 20;
		$padding_3 = 5;
		$padding_4 = 20;
		$font_colour = "#000000";
        $font_size = "";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = "";
        $social_icon_2 = "";
        $social_icon_3 = "";
        $social_icon_4 = "";
        $social_icon_5 = "";
        $si_width = "";
		$content_type = "centered_image";
	}
	else {
		$padding_1 = 20;
		$padding_2 = 20;
		$padding_3 = 20;
		$padding_4 = 20;
		$font_colour = "";
        $text_align = "center";
        $font_family = "Arial,sans-serif";
        $social_icon_1 = "";
        $social_icon_2 = "";
        $social_icon_3 = "";
        $social_icon_4 = "";
        $social_icon_5 = "";
        $si_width = "";
		$content_type = "";
	}
	//what column background colour are we inserting in the database
	//Lets make the default colour white
	$col_bg_colour = "#ffffff";
	
	$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
	// count the results
	// insert sortable list id into DB
	$id = 1;
	$sth = $conn->prepare("SELECT * from $tbl_name");
	$sth->execute(array(':id' => $id));
	$records = $sth->fetchAll();
	$count = count($records);
	
	if(count($records) != 0) {
	
		foreach ($records as $row) {								
			$sortable = $row['sortable'];
			$sortable_insert = $sortable +1;
		}
		
	}
	else {
		$sortable_insert = 0;
	}
	// count the results
	// insert sortable list id into DB
	
	
	//$sql = "INSERT INTO $tbl_name (eshot_column, sortable) VALUES (:eshot_column, :sortable)";
	$sql = "INSERT INTO $tbl_name (eshot_id, eshot_name, eshot_url, eshot_column, sortable, content_type, padding_1, padding_2, padding_3, padding_4, col_bg_colour, font_colour, font_family, social_icon_1, social_icon_2, social_icon_3, social_icon_4, social_icon_5, si_width) VALUES (:eshot_id, :eshot_name, :eshot_url, :eshot_column, :sortable, :content_type, :padding_1, :padding_2, :padding_3, :padding_4, :col_bg_colour, :font_colour, :font_family, :social_icon_1, :social_icon_2, :social_icon_3, :social_icon_4, :social_icon_5, :si_width)";
	$q = $conn->prepare($sql);
	$q->execute(array(
					  ':eshot_id'=>$eshot_id,
					  ':eshot_name'=>$eshot_name,
					  ':eshot_url'=>$eshot_url,
					  ':eshot_column'=>$eshot_column,
					  ':sortable'=>$sortable_insert,
					  ':content_type'=>$content_type,
					  ':padding_1'=>$padding_1,
					  ':padding_2'=>$padding_2,
					  ':padding_3'=>$padding_3,
					  ':padding_4'=>$padding_4,
					  ':col_bg_colour'=>$col_bg_colour,
					  ':font_colour'=>$font_colour,
                      ':font_family'=>$font_family,
                      ':social_icon_1'=>$social_icon_1,
                      ':social_icon_2'=>$social_icon_2,
                      ':social_icon_3'=>$social_icon_3,
                      ':social_icon_4'=>$social_icon_4,
                      ':social_icon_5'=>$social_icon_5,
                      ':si_width'=>$si_width
					 ));
	
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?></title>
<link rel="stylesheet" href="css/style.css">	

<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
body {
	margin: 0px;
	padding: 0px;
	color: #000
}
th img {
	height: auto!important;
}
/*Medium screens*/
@media only screen and (max-width:660px) {
		table[class=container] {
			width: 90%!important;
		} /* outermost container*/
		th[class=banner] img {
			width: 100%;
			height: auto!important;
		}
		th[class="col-2-promos"] {
			width: 48%!important;
			margin-bottom: 0px;
			display: inline-block;
			text-align: center!important;
		}
		th[class="col-2-promos"] img {
			width: 99%!important;
			height: auto!important;
		}
		th[class="col-2-promos"] img[class="footerImg"] {
			width: auto!important;
			height: auto!important;
		}
		th[class="col-3-promos"] {
			width: 30%!important;
			margin-bottom: 20px;

			text-align: center!important;
		}
		th[class="col-3-promos"] img {
			width: 99%!important;
			height: auto!important;
		}
		th[class="col-4-promos"] {
			width: 24%!important;
			margin-bottom: 10px;

			text-align: center!important;

			padding: 0px
		}
		th[class="col-4-promos"] img {
			width: 95%!important;
		}
		table[class="buttonTable"] {
			width: 100%!important;
			margin-bottom: 20px;
			text-align: center!important;
		}
		table[class="customTable"] {
			width: 100%!important;
			margin-bottom: 20px;
			text-align: center!important;
		}
		table[class="customTable"] img {
			width: 100%!important;
			height:auto;
		}
		.mobile-left { float:left !important; }	
		.mobile-right { float:right !important; }
		
}
	
/* small screens */
 @media only screen and (max-width:620px) {
	
table[class=container] {
	width: 100%!important;

} /* outermost container*/

th[class="col-row"] {
	width: 100%!important;	
}

table[class=container] th {
	border: none!important;
}

th[class="col-2-promos"] {
	width: 100%!important;
	margin-bottom: 0px;
	display: inline-block;
	text-align: center!important;
}
th[class="col-2-promos"] img {
	width: 99%!important;
	height: auto!important;
}
th[class="col-3-promos"] {
	width: 100%!important;
	margin-bottom: 20px;
	display: inline-block;
	text-align: center!important;
}
th[class="col-4-promos"] {
	width: 49%!important;
	margin-bottom: 10px;
	display: inline-block;
	text-align: center!important;
}
th[class="col-4-promos"] img {
	width: 95% !important;
	margin: 0 auto !important;
	height: auto !important;
}
table[class="buttonTable"] {
	width: 100%!important;
	margin-bottom: 20px;
	text-align: center!important;
}
th[class="button"] {
	width: 100%!important;
	padding: 0 20px 0 20px;
}
.social-icon {
    width: 25px;
    padding-left: 2px;
    padding-right: 2px;
    margin-top: 15px;
    margin-bottom: 15px;
}
}
</style>

	
	
</head>
<body>
<?php include 'includes/header-eshot-builder.php'; ?>
<!-- hidden preview content to show in email clients -->
<div style="font-size: 1px; color:#fff; display:none;"> </div>
<!-- end hidden content to show in email clients --> 

	<h2 class="eshot-name"><?php echo $eshot_name; ?></h2>	

<!-- Eshot url menu -->
<div class="menu-1">
	<?php
		$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$id = 1;
		
		$sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_column` = 0 and `eshot_id` = :eshot_id");
		$sth->execute(array(':eshot_id' => $eshot_id));
		$records = $sth->fetchAll();
			if(count($records) != 0) {

				foreach ($records as $row) {
					$eshot_name = $row['eshot_name'];
					$eshot_url = $row['eshot_url'];
					$eshot_title = $row['eshot_title'];
					$col_base_colour = $row['col_base_colour'];
	?>
							
								
								<form action="/update-eshot-url.php" method="post">
								
								<div class="eshot-domain">
									<span class="add-eshot-form-2" style="width:100px;"><label><strong>Base URL: </strong></label></span>
									<span class="add-eshot-form-2"><?php echo $eshot_domain; ?> </span>
									<span class="add-eshot-form-2">
										/
									</span>
									
									<span class="add-eshot-form-4">
										<input class="form-control" style="width:200px;" name="eshot_url" value="<?php echo $row['eshot_url']; ?>">
									</span>
										
								</div>
									
								<div class="eshot-domain">
									<span class="add-eshot-form-2" style="width:100px;"><label><strong>Eshot Title: </strong></label></span>
									<span class="add-eshot-form-2"><input class="form-control" style="width:200px;" name="eshot_title" value="<?php echo $row['eshot_title']; ?>">	</span>
										
										</div>
									
								<div class="eshot-domain">
									<span class="add-eshot-form-2" style="width:100px;"><label><strong>Background Colour: </strong></label></span>
									<span class="add-eshot-form-2"><input class="form-control" style="width:200px;" name="col_base_colour" value="<?php echo $row['col_base_colour']; ?>">	</span>
										
								</div>		
								
								<div class="eshot-domain-right">
									<span class="add-eshot-form-2">
									<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
									<input type="hidden" name="eshot_id" value="<?php echo $row['eshot_id']; ?>">
									<input type="hidden" name="eshot_name" value="<?php echo $row['eshot_name']; ?>">	
									<input type="submit" value="submit" name="submit" class="btn-ah btn-primary-ah eshot-domain-submit">
									</span>
								</div>
								
								</form>	

						
	<?php
				}
			}
	?>	
</div>	
<!-- Eshot url menu -->		


<!-- Insert column menu -->	
<div class="menu-2">
	<div class="menu-left">

		<form method="post" action="" >

		<select name="columns" class="form-control-ah">
		<option>Please choose...</option>
		<option value="1">Column 1</option>
		<option value="2">Column 2</option>
		<option value="3">Column 3</option>
		<option value="4">Horizontal Rule</option>
		<option value="5">View In Browser Link</option>
        <option value="6">Social Icons</option>
        <option value="7">Footer Template 1</option>
        <option value="8">Footer Template 2</option>
		<option value="9">Column 1 Centered Image</option>

        </select>
		<input type="hidden" name="eshot_id" value="<?php echo $eshot_id; ?>">
		<input type="hidden" name="eshot_name" value="<?php echo $eshot_name; ?>">	
		<?php
			
		$sth = $conn->prepare("SELECT * from $tbl_name where eshot_id = $eshot_id and eshot_column = 0");
		$sth->execute(array(':eshot_id' => $eshot_id));
		$records = $sth->fetchAll();
		$count = count($records);

		if(count($records) != 0) {

			foreach ($records as $row) {
			$eshot_url = $row['eshot_url'];	
		?>		
			<input type="hidden" name="eshot_url" value="<?php echo $eshot_url; ?>">	
			
		<?php	
			}
		}
		
		?>	
		<br>
		</div>
		<div class="menu-left">
			<input type="submit" name="submit" value="submit" class="btn-ah btn-primary-ah">
		</div>
		<div style="clear:left;"></div>
		

		</form>

</div>
<!-- Insert column menu -->
	
<!-- Add custom class menu -->
<div class="menu-3">
	<form action="add-custom-class.php" method="post">
	<div class="add-class-col-1">
		<label>Name:</label>
		<input type="text" name="custom_class_name" value="" placeholder="Add your custom class name here" class="form-control-ah">
	</div>
	<div class="add-class-col-2">
		<label>Width:</label>
		<input type="text" name="custom_class_width" value="" placeholder="0px" class="form-control-ah">
		<label>Height:</label>
		<input type="text" name="custom_class_height" value="" placeholder="0px" class="form-control-ah">
		<label>Text Align:</label>
		<select name="custom_class_text_align" class="form-control-ah">
			<option selected value="">Please Choose...</option>
			<option value="left">Left</option>
			<option value="center">Center</option>
			<option value="right">Right</option>
			<option value="justify">Justify</option>
		</select>
	</div>
	<div class="add-class-col-3">
		
		<label>Float:</label>
		<select name="custom_class_text_float" class="form-control-ah">
			<option selected value="">Please Choose...</option>
			<option value="left">Left</option>
			<option value="right">Right</option>
		</select>
		<label>Margin:</label>
		<input type="text" name="custom_class_margin" value="" placeholder="0px 0px 0px 0px" class="form-control-ah">
		<label>Padding:</label>
		<input type="text" name="custom_class_padding" value="" placeholder="0px 0px 0px 0px" class="form-control-ah">
	</div>
	<div class="add-class-col-4">
		<label>Font Size:</label>
		<input type="text" name="custom_class_font_size" value="" placeholder="14px" class="form-control-ah">
	</div>	
	<div class="add-class-col-5">
		<input type="radio" name="media_width" value="1"> @media only screen and (max-width:660px)<br>
		<input type="radio" name="media_width" value="2"> @media only screen and (max-width:620px)
	</div>

	<div class="add-class-col-6">
			<input type="hidden" name="eshot_url" value="<?php echo $eshot_url; ?>">
			<input type="hidden" name="eshot_name" value="<?php echo $eshot_name; ?>">
			<input type="hidden" name="eshot_id" value="<?php echo $eshot_id; ?>">	
			<input type="submit" name="submit" value="submit" class="btn-ah btn-primary-ah" style="margin-top:10px;">
	</div>
	<div style="clear:left;"></div>
	</form>
	
	<?php
			$sth = $conn->prepare("SELECT * from $tbl_name_custom_class");
			$sth->execute(array());

			$records = $sth->fetchAll();
			if(count($records) != 0) {

				foreach ($records as $row) {
	?>				
		<p class="custom-class-spec">
		<strong><span>name: </span><span><?php echo $row['custom_class_name']; ?></span> <?php if($row['media_width'] == 1){ echo "@media only screen and (max-width:660px)"; } else { echo "@media only screen and (max-width:620px)"; } ?></strong>
				<?php
					if(!empty($row['custom_class_width'])){ 
						echo '<span>width: </span><span class="custom-class-space">' . $row['custom_class_width'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_height'])){ 
						echo '<span>height: </span><span class="custom-class-space">' . $row['custom_class_height'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_font_size'])){ 
						echo '<span>font-size: </span><span class="custom-class-space">' . $row['custom_class_font_size'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_text_align'])){ 
						echo '<span>text-align: </span><span class="custom-class-space">' . $row['custom_class_text_align'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_text_float'])){ 
						echo '<span>float: </span><span class="custom-class-space">' . $row['custom_class_text_float'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_margin'])){ 
						echo '<span>margin: </span><span class="custom-class-space">' . $row['custom_class_margin'] . '</span>';
					} 
					else {
						echo "";
					}
					if(!empty($row['custom_class_padding'])){ 
						echo '<span>padding: </span><span class="custom-class-space">' . $row['custom_class_padding'] . '</span>';
					} 
					else {
						echo "";
					}
				?>	

		</p>
		
			<a href="edit-custom-class.php?id=<?php echo $row['id'] ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>" class="btn-ah btn-primary-ah-2">Edit</a>
			<a href="delete-custom-class.php?id=<?php echo $row['id'] ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name; ?>" class="btn-ah btn-primary-ah-2" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
			
	<?php			
		}
			}
	?>
	
</div>	
<!-- Add custom class menu -->	
	
	

<!-- main wrapper -->
	<?php
				// Grab the base bgcolor value from DB.
				$sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id and eshot_column = 0");
				$sth->execute(array(':eshot_id' => $eshot_id));

				$records = $sth->fetchAll();
					if(count($records) != 0) {
						foreach ($records as $row) {
	?>
		<table id="ah1" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="<?php echo $row['col_base_colour']; ?>">
	<?php
						}
				}
				// Grab the base bgcolor value frm DB.
	?>	

  <tr>
    <th><!-- email container -->
      
      <table class="container" width="640" align="center" border="0" cellpadding="0" cellspacing="0">
		<tbody>	


			<?php
			// Connect to server and select database.
			$sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id and eshot_display = 0 order by sortable asc");
			$sth->execute(array(':eshot_id' => $eshot_id));

			$records = $sth->fetchAll();
			if(count($records) != 0) {

				foreach ($records as $row) {
					$eshot_column = $row['eshot_column'];
					$content_type = $row['content_type'];
					$content_type_left = $row['content_type_left'];
					$content_type_right = $row['content_type_right'];
					?>

					<?php
					if($eshot_column == 1){
						include 'column_1.php';
					}
					elseif($eshot_column == 2){
						include 'column_2.php';
					}
					elseif($eshot_column == 3){
						include 'column_3.php';
					}
					elseif($eshot_column == 4){
						include 'column_hr.php';
					}
					elseif($eshot_column == 5){
						include 'column_view_in_browser.php';
					}
                    elseif($eshot_column == 6){
                        include 'column_social_icons.php';
                    }
                    elseif($eshot_column == 7){
                        include 'column_footer-template-1b.php';
                    }
                    elseif($eshot_column == 8){
                        include 'column_footer-template-2.php';
                    }
					elseif($eshot_column == 9){
                        include 'column_centered_image.php';
                    }
					elseif($eshot_column == 0){
						echo "";
					}
					else {
						echo "There was an error";
					}

				}

			}

			?>		 		  
	</tbody>			  
	</table>

<!-- end email container --></th>
</tr>
</table>
<!-- end main wrapper -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#button-1").click(function(){
        $(".menu-1").toggleClass("menu-1-show");
    });
	$("#button-2").click(function(){
        $(".menu-2").toggleClass("menu-2-show");
    });
	$("#button-3").click(function(){
        $(".menu-3").toggleClass("menu-3-show");
    });
    $("iframe").contents().find('.cke_editable').addClass('myClass')
});
</script>


</body>
</html>