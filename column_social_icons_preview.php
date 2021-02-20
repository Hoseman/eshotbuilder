<?php				
					$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					// count the results
					// insert sortable list id into DB
					$id = $row['id'];
					$eshot_id = $_GET['eshot_id'];
					$sth = $conn->prepare("SELECT * from $tbl_name WHERE `id` = :id");
					$sth->execute(array(':id' => $id));
					$records = $sth->fetchAll();
					$count = count($records);

					foreach ($records as $row) {
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
						$col_bg_colour = $row['col_bg_colour'];
						$href = $row['href'];
						$alt_value = $row['alt_value'];
						$img_url = $row['img_url'];
						$img_file_name = $row['img_file_name'];
						$text_align = $row['text_align'];
						$font_weight = $row['font_weight'];
						$font_family = $row['font_family'];
						$line_height = $row['line_height'];
						$font_size = $row['font_size'];
						$font_colour = $row['font_colour'];
                        $social_icon_1 = $row['social_icon_1'];
                        $social_icon_2 = $row['social_icon_2'];
                        $social_icon_3 = $row['social_icon_3'];
                        $social_icon_4 = $row['social_icon_4'];
                        $social_icon_5 = $row['social_icon_5'];
                        $si_margin_top = $row['si_margin_top'];
                        $si_padding = $row['si_padding'];
                        $si_width = $row['si_width'];
                        $si_link_1 = $row['si_link_1'];
                        $si_link_2 = $row['si_link_2'];
                        $si_link_3 = $row['si_link_3'];
                        $si_link_4 = $row['si_link_4'];
                        $si_link_5 = $row['si_link_5'];
                        $find_us_on = $row['find_us_on'];

                        if(empty($row['si_url_1'])){
                            $si_url_1 = 'http://eshotbuilder.bigmarketing.co.uk/images/facebook.png';
                        }
                        else {
                            $si_url_1 =  "http://" . $eshot_domain ."/". $eshot_url . $row['si_url_1'];
                        }
                        if(empty($row['si_url_2'])){
                            $si_url_2 = 'http://eshotbuilder.bigmarketing.co.uk/images/twitter.png';
                        }
                        else {
                            $si_url_2 =  "http://" . $eshot_domain ."/". $eshot_url . $row['si_url_2'];
                        }
                        if(empty($row['si_url_3'])){
                            $si_url_3 = 'http://eshotbuilder.bigmarketing.co.uk/images/youtube.png';
                        }
                        else {
                            $si_url_3 =  "http://" . $eshot_domain ."/". $eshot_url . $row['si_url_3'];
                        }
                        if(empty($row['si_url_4'])){
                            $si_url_4 = 'http://eshotbuilder.bigmarketing.co.uk/images/linkedin.png';
                        }
                        else {
                            $si_url_4 =  "http://" . $eshot_domain ."/". $eshot_url . $row['si_url_4'];
                        }
                        if(empty($row['si_url_5'])){
                            $si_url_5 = 'http://eshotbuilder.bigmarketing.co.uk/images/instagram.png';
                        }
                        else {
                            $si_url_5 =  "http://" . $eshot_domain ."/". $eshot_url . $row['si_url_5'];
                        }
					}
?>
<tr>
	
	  <th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="banner" 
		  bgcolor="<?php echo $col_bg_colour; ?>" 
		  style="padding:
				 <?php echo $padding_1; ?>px <?php echo $padding_2; ?>px <?php echo $padding_3; ?>px <?php echo $padding_4; ?>px; 
				 <?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?> 
				 <?php if(!empty($font_weight)){ echo "font-weight:".$font_weight.";";  } ?>
		  		 <?php if(!empty($font_family)){ echo "font-family:".$font_family.";";  } ?>
		  		 <?php if(!empty($line_height)){ echo "line-height:".$line_height.";";  } ?>
				 <?php if(!empty($font_size)){ echo "font-size:".$font_size.";";  } ?>
				 <?php if(!empty($font_colour)){ echo "color:".$font_colour.";";  } ?>
				 ">
		  

		  
			<div class="content-type-select">
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
						$content_type = $row['content_type'];
                    ?>

                    <?php

                        if($text_align == 'left'){
                            $icon_padding = "padding-left:0px; padding-right:".$si_padding."px;";
                        }
                        elseif($text_align == 'center'){
                            $icon_padding = "padding-left:".$si_padding."px; padding-right:".$si_padding."px;";
                        }
                        elseif($text_align == 'right'){
                            $icon_padding = "padding-right:0px; padding-left:".$si_padding."px;";
                        }
                        elseif($text_align == ''){
                            $icon_padding = "padding-right:0px; padding-left:0px;";
                        }
                        else {
                            echo "There was an error!";
                        }
                        if($find_us_on == 1){
                            echo "<span style='font-family:".$font_family.";font-color:".$font_colour.";margin-right:2px;font-size:12px;'>Find us on: </span>";
                        }


                        if($social_icon_1 == 1){ echo '<a href="'.$si_link_1.'" target="_blank"><img alt="Facebook" src="'.$si_url_1.'" style="outline:0; width:'.$si_width.'px !important; '.$icon_padding.' margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                        if($social_icon_2 == 1){ echo '<a href="'.$si_link_2.'" target="_blank"><img alt="Twitter" src="'.$si_url_2.'" style="outline:0; width:'.$si_width.'px !important; '.$icon_padding.' margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                        if($social_icon_3 == 1){ echo '<a href="'.$si_link_3.'" target="_blank"><img alt="LinkedIn" src="'.$si_url_3.'" style="outline:0; width:'.$si_width.'px !important; '.$icon_padding.' margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                        if($social_icon_4 == 1){ echo '<a href="'.$si_link_4.'" target="_blank"><img alt="YouTube" src="'.$si_url_4.'" style="outline:0; width:'.$si_width.'px !important; '.$icon_padding.' margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                        if($social_icon_5 == 1){ echo '<a href="'.$si_link_5.'" target="_blank"><img alt="Instagram" src="'.$si_url_5.'" style="outline:0; width:'.$si_width.'px !important; '.$icon_padding.' margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }



					}//end foreach
				
				?>
			

	

		  	</div>
		 
	  </th>
	
</tr>

