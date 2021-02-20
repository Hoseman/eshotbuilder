<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!(isset($_SESSION['myusername']) && $_SESSION['myusername'] != '')) { header ("Location: login.php"); }

$eshot_id = $_GET['eshot_id'];
include 'config.php';
$id = 1;


// Connect to server and select database.
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
<?php
//Grab the page title
$id = 1;
$sth = $conn->prepare("SELECT eshot_title from $tbl_name WHERE `eshot_column` = 0 and `eshot_id` = :eshot_id");
$sth->execute(array(':eshot_id' => $eshot_id));
$records = $sth->fetchAll();
if(count($records) != 0) {
foreach ($records as $row) {
?>
<title><?php echo $row['eshot_title']; ?></title>
<?php
}
}
//Grab the page title	
?>	
<style type="text/css" rel="stylesheet">

body {
	margin: 0px;
	padding: 0px;
	color: #000
}
th { text-align:left;}

th img {
	height: auto!important;
}
.col-2-promos p, .col-3-promos p {
	margin:0px;
}
.banner p {
	margin:0px;
}	
/*Medium screens*/

@media only screen and (max-width:660px) {
		table[class=container] {
			width: 90%!important;
		} 
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
			width: 99%;
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
		.mobile-logo {
            margin-left: 32%;
            margin-right: 32%;
            width: 36% !important;
            margin-top: 20px;
        }
	
        <?php
        //grab values for custom padding

        $sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id");
        $sth->execute(array(':eshot_id' => $eshot_id));
        $records = $sth->fetchAll();
        if(count($records) != 0) {
        foreach ($records as $row) {
        $cp_insert_name = $row['cp_insert_name'];
        $cp_insert = $row['cp_insert'];
        $cp_insert_value = $row['cp_insert_value'];

        if($cp_insert_value == 1){
        if(!empty($cp_insert)){
        echo "#style-" . $cp_insert_name . "{";
        echo $cp_insert . " !important;";
        echo "}";
        }
        }

        }
        }

        //grab values for custom padding
        ?>

	
		<?php
		//grab values for custom css
		$sth = $conn->prepare("SELECT * from $tbl_name_custom_class");  
		$sth->execute(array());
		$records = $sth->fetchAll();
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
				$media_width = $row['media_width'];
				//Display custom css based on media query selection
				if($media_width == 1){
						echo "." . $custom_class_name . "{";
					
						if(!empty($custom_class_width)){
							echo "width:" . $custom_class_width . " !important; ";
						}
						if(!empty($custom_class_height)){
							echo "height:" . $custom_class_height . " !important; ";
						}
						if(!empty($custom_class_font_size)){
							echo "font-size:" . $custom_class_font_size . " !important; ";
						}
						if(!empty($custom_class_text_align)){
							echo "text-align:" . $custom_class_text_align . " !important; ";
						}
						if(!empty($custom_class_text_float)){
							echo "float:" . $custom_class_text_float . " !important; ";
						}
						if(!empty($custom_class_margin)){
							echo "margin:" . $custom_class_margin . " !important; ";
						}
						if(!empty($custom_class_padding)){
							echo "padding:" . $custom_class_padding . " !important; ";
						}
						echo "}";
				}
				else {
					echo "";
				}
			}
		}
		//grab values for custom css
		?>	
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
			width: 99%;
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
        th[class="banner-centered"] .center-image {
            width: 100% !important;
        }
        .footer-logo-template-1-img {
            float:none !important;
        }
        .social-icon {
            width: 25px !important;
            padding-left: 2px !important;
            padding-right: 2px !important;
            margin-top: 15px !important;
            margin-bottom: 15px !important;
        }

		<?php
		//grab values for custom padding
		
        $sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id");
        $sth->execute(array(':eshot_id' => $eshot_id));
        $records = $sth->fetchAll();
        if(count($records) != 0) {
        foreach ($records as $row) {
        $cp_insert_name = $row['cp_insert_name'];
        $cp_insert = $row['cp_insert'];
        $cp_insert_value = $row['cp_insert_value'];

        if($cp_insert_value == 2){
        if(!empty($cp_insert)){
        echo "#style-" . $cp_insert_name . "{";
        echo $cp_insert . " !important;";
        echo "}";
        }
        }

        }
        }
		
		//grab values for custom padding
		?>		
	
				<?php
				//grab values for custom css
				$sth = $conn->prepare("SELECT * from $tbl_name_custom_class");  
				$sth->execute(array());
				$records = $sth->fetchAll();
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
						$media_width = $row['media_width'];
						//Display custom css based on media query selection
						if($media_width == 2){
						echo "." . $custom_class_name . "{";
						if(!empty($custom_class_width)){
							echo "width:" . $custom_class_width . " !important; ";
						}
						if(!empty($custom_class_height)){
							echo "height:" . $custom_class_height . " !important; ";
						}
						if(!empty($custom_class_font_size)){
							echo "font-size:" . $custom_class_font_size . " !important; ";
						}
						if(!empty($custom_class_text_align)){
							echo "text-align:" . $custom_class_text_align . " !important; ";
						}
						if(!empty($custom_class_text_float)){
							echo "float:" . $custom_class_text_float . " !important; ";
						}
						if(!empty($custom_class_margin)){
							echo "margin:" . $custom_class_margin . " !important; ";
						}
						if(!empty($custom_class_padding)){
							echo "padding:" . $custom_class_padding . " !important; ";
						}
						echo "}";
							
						}
						else {
							echo "";
						}
					}
				}
				//grab values for custom css
				?>
}
/* mobile */
@media only screen and (max-width:480px) {
	
		<?php
		//grab values for custom padding
		
        $sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id");
        $sth->execute(array(':eshot_id' => $eshot_id));
        $records = $sth->fetchAll();
        if(count($records) != 0) {
        foreach ($records as $row) {
        $cp_insert_name = $row['cp_insert_name'];
        $cp_insert = $row['cp_insert'];
        $cp_insert_value = $row['cp_insert_value'];

        if($cp_insert_value == 3){
        if(!empty($cp_insert)){
        echo "#style-" . $cp_insert_name . "{";
        echo $cp_insert . " !important;";
        echo "}";
        }
        }

        }
        }
		
		//grab values for custom padding
		?>	
	
}

</style>
</head>
<body bgcolor="ffffff" >
	
<!-- hidden preview content to show in email clients -->
<div style="font-size: 1px; color:#fff; display:none;"> </div>
<!-- end hidden content to show in email clients --> 
	

<!-- main wrapper -->

	<?php
				// Grab the base bgcolor value from DB.
				$sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id and eshot_column = 0");
				$sth->execute(array(':eshot_id' => $eshot_id));

				$records = $sth->fetchAll();
					if(count($records) != 0) {
						foreach ($records as $row) {
	?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="<?php echo $row['col_base_colour']; ?>">
	<?php
						}
				}
				// Grab the base bgcolor value frm DB.
	?>	
	
	
  <tr>
    <th><!-- email container -->
      
      <table class="container" width="640" align="center" border="0" cellpadding="0" cellspacing="0">



<?php

$sth = $conn->prepare("SELECT * from $tbl_name WHERE `eshot_id` = :eshot_id and eshot_display = 0 order by sortable asc");
		  
$sth->execute(array(':eshot_id' => $eshot_id));

$records = $sth->fetchAll();
if(count($records) != 0) {

    foreach ($records as $row) {
        $eshot_column = $row['eshot_column'];

					if($eshot_column == 1){
						include 'column_1_preview.php';
					}
					elseif($eshot_column == 2){
						include 'column_2_preview.php';
					}
					elseif($eshot_column == 3){
						include 'column_3_preview.php';
					}
					elseif($eshot_column == 4){
						include 'column_hr_preview.php';
					}
					elseif($eshot_column == 5){
						include 'column_view_in_browser_preview.php';
					}
                    elseif($eshot_column == 6){
                        include 'column_social_icons_preview.php';
                    }
                    elseif($eshot_column == 7){
                        include 'column_footer-template-1b-preview.php';
                    }
                    elseif($eshot_column == 8){
                        include 'column_footer-template-2-preview.php';
                    }
                    elseif($eshot_column == 9){
                        include 'column_centered_image_preview.php';
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
		  
</table>

<!-- end email container --></th>
</tr>
</table>
<!-- end main wrapper -->
	


</body>
</html>