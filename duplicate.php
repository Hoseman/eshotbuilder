<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';

$eshot_id = $_GET['eshot_id'];
$eshot_name = $_GET['eshot_name'];
$id = $_GET['id'];

$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sth = $conn->prepare("SELECT * from $tbl_name where id = $id");  
		$sth->execute(array());
		$records = $sth->fetchAll();
		if(count($records) != 0) {
			foreach ($records as $row) {
				$eshot_id = $row['eshot_id'];
				$eshot_display = $row['eshot_display'];
				$eshot_name = $row['eshot_name'];
				$eshot_url = $row['eshot_url'];
				$eshot_column = $row['eshot_column'];
				$sortable = $row['sortable'];
				$content_type = $row['content_type'];
				$content_type_left = $row['content_type_left'];
				$content_type_right = $row['content_type_right'];
				$content = $row['content'];
				$content_left = $row['content_left'];
				$content_right = $row['content_right'];
				$padding_1 = $row['padding_1'];
				$padding_2 = $row['padding_2'];
				$padding_3 = $row['padding_3'];
				$padding_4 = $row['padding_4'];
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
				$ct_img_file_name_left_1  = $row['ct_img_file_name_left_1'];
				$ct_img_file_name_left_2  = $row['ct_img_file_name_left_2'];
				$ct_img_file_name_left_3  = $row['ct_img_file_name_left_3'];
				$ct_img_file_name_left_4  = $row['ct_img_file_name_left_4'];
				$ct_img_file_name_right_1  = $row['ct_img_file_name_right_1'];
				$ct_img_file_name_right_2  = $row['ct_img_file_name_right_2'];
				$ct_img_file_name_right_3  = $row['ct_img_file_name_right_3'];
				$ct_img_file_name_right_4  = $row['ct_img_file_name_right_4'];
				$col_bg_colour = $row['col_bg_colour'];
				$bg_colour_custom = $row['bg_colour_custom'];
				
				$text_align = $row['text_align'];
				$text_align_col_left = $row['text_align_col_left'];
				$text_align_col_right = $row['text_align_col_right'];
				$font_weight = $row['font_weight'];
				$font_family = $row['font_family'];
				$font_colour = $row['font_colour'];
				$line_height = $row['line_height'];
				$font_size = $row['font_size'];
				$font_colour_custom = $row['font_colour_custom'];

	
				
				//$custom_class = $row['custom_class'];
				
					try {
						$sql = "INSERT INTO $tbl_name (eshot_id, eshot_display, eshot_name, eshot_url, eshot_column, sortable, content_type, content_type_left, content_type_right, content, content_left, content_right, padding_1, padding_2, padding_3, padding_4, href, href_left, href_right, alt_value, alt_value_left, alt_value_right, img_url, img_url_left, img_url_right, img_file_name, img_file_name_left, img_file_name_right, ct_img_file_name_left_1, ct_img_file_name_left_2, ct_img_file_name_left_3, ct_img_file_name_left_4, ct_img_file_name_right_1, ct_img_file_name_right_2, ct_img_file_name_right_3, ct_img_file_name_right_4, col_bg_colour, bg_colour_custom, text_align, text_align_col_left, text_align_col_right, font_weight, font_family, font_colour, line_height, font_size, font_colour_custom) 
						VALUES (:eshot_id, :eshot_display, :eshot_name, :eshot_url, :eshot_column, :sortable, :content_type, :content_type_left, :content_type_right, :content, :content_left, :content_right, :padding_1, :padding_2, :padding_3, :padding_4, :href, :href_left, :href_right, :alt_value, :alt_value_left, :alt_value_right, :img_url, :img_url_left, :img_url_right, :img_file_name, :img_file_name_left, :img_file_name_right, :ct_img_file_name_left_1, :ct_img_file_name_left_2, :ct_img_file_name_left_3, :ct_img_file_name_left_4, :ct_img_file_name_right_1, :ct_img_file_name_right_2, :ct_img_file_name_right_3, :ct_img_file_name_right_4, :col_bg_colour, :bg_colour_custom, :text_align, :text_align_col_left, :text_align_col_right, :font_weight, :font_family, :font_colour, :line_height, :font_size, :font_colour_custom)";
						$q = $conn->prepare($sql);
						$q->execute(array(
							  ':eshot_id'=>$eshot_id,
							  ':eshot_display'=>$eshot_display,
							  ':eshot_name'=>$eshot_name,
							  ':eshot_url'=>$eshot_url,
							  ':eshot_column'=>$eshot_column,
							  ':sortable'=>$sortable,
							  ':content_type'=>$content_type,
							  ':content_type_left'=>$content_type_left,
							  ':content_type_right'=>$content_type_right,
							  ':content'=>$content,
							  ':content_left'=>$content_left,
							  ':content_right'=>$content_right,
							  ':padding_1'=>$padding_1,
							  ':padding_2'=>$padding_2,
							  ':padding_3'=>$padding_3,
							  ':padding_4'=>$padding_4,
							  ':href'=>$href,
							  ':href_left'=>$href_left,
							  ':href_right'=>$href_right,
							  ':alt_value'=>$alt_value,
							  ':alt_value_left'=>$alt_value_left,
							  ':alt_value_right'=>$alt_value_right,
							  ':img_url'=>$img_url,
							  ':img_url_left'=>$img_url_left,
							  ':img_url_right'=>$img_url_right,
							  ':img_file_name'=>$img_file_name,
							  ':img_file_name_left'=>$img_file_name_left,
							  ':img_file_name_right'=>$img_file_name_right,
							  ':ct_img_file_name_left_1'=>$ct_img_file_name_left_1,
							  ':ct_img_file_name_left_2'=>$ct_img_file_name_left_2,
							  ':ct_img_file_name_left_3'=>$ct_img_file_name_left_3,
							  ':ct_img_file_name_left_4'=>$ct_img_file_name_left_4,
							  ':ct_img_file_name_right_1'=>$ct_img_file_name_right_1,
							  ':ct_img_file_name_right_2'=>$ct_img_file_name_right_2,
							  ':ct_img_file_name_right_3'=>$ct_img_file_name_right_3,
							  ':ct_img_file_name_right_4'=>$ct_img_file_name_right_4,
							  ':col_bg_colour'=>$col_bg_colour,
							  ':bg_colour_custom'=>$bg_colour_custom,
							  ':text_align'=>$text_align,
							  ':text_align_col_left'=>$text_align_col_left,
							  ':text_align_col_right'=>$text_align_col_right,
							  ':font_weight'=>$font_weight,
							  ':font_family'=>$font_family,
							  ':font_colour'=>$font_colour,
							  ':line_height'=>$line_height,
							  ':font_size'=>$font_size,
							  ':font_colour_custom'=>$font_colour_custom
						 ));
					}
				
				catch(PDOException $e) {
					echo 'ERROR: ' . $e->getMessage();
				}
				
			}
		}



$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);


?>