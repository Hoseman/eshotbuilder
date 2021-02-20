<?php				
					$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					// count the results
					// insert sortable list id into DB
					$eshot_id = $_GET['eshot_id'];
					$eshot_name = $_GET['eshot_name'];
					$id = $row['id'];
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
						$href_left = $row['href_left'];
						$href_right = $row['href_right'];
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
						$ct_img_url_left_1 = $row['ct_img_url_left_1'];
						$ct_img_url_left_2 = $row['ct_img_url_left_2'];
						$ct_img_url_left_3 = $row['ct_img_url_left_3'];
						$ct_img_url_left_4 = $row['ct_img_url_left_4'];
						$ct_img_url_right_1 = $row['ct_img_url_right_1'];
						$ct_img_url_right_2 = $row['ct_img_url_right_2'];
						$ct_img_url_right_3 = $row['ct_img_url_right_3'];
						$ct_img_url_right_4 = $row['ct_img_url_right_4'];
						$ct_img_alt_left_1 = $row['ct_img_alt_left_1'];
						$ct_img_alt_left_2 = $row['ct_img_alt_left_2'];
						$ct_img_alt_left_3 = $row['ct_img_alt_left_3'];
						$ct_img_alt_left_4 = $row['ct_img_alt_left_4'];
						$ct_img_alt_right_1 = $row['ct_img_alt_right_1'];
						$ct_img_alt_right_2 = $row['ct_img_alt_right_2'];
						$ct_img_alt_right_3 = $row['ct_img_alt_right_3'];
						$ct_img_alt_right_4 = $row['ct_img_alt_right_4'];
						$ct_img_alt_1 = $row['ct_img_alt_1'];
						$ct_img_alt_2 = $row['ct_img_alt_2'];
						$ct_img_alt_3 = $row['ct_img_alt_3'];
						$ct_img_alt_4 = $row['ct_img_alt_4'];
						$text_align_col_left = $row['text_align_col_left'];
						$text_align_col_right = $row['text_align_col_right'];
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
          <th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="col-row" bgcolor="<?php echo $col_bg_colour; ?>" style="padding:<?php echo $padding_1; ?>px <?php echo $padding_2; ?>px <?php echo $padding_3; ?>px <?php echo $padding_4; ?>px; <?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?> <?php if(!empty($font_weight)){ echo "font-weight:".$font_weight.";";  } ?> <?php if(!empty($font_family)){ echo "font-family:".$font_family.";";  } ?> <?php if(!empty($line_height)){ echo "line-height:".$line_height.";";  } ?> <?php if(!empty($font_size)){ echo "font-size:".$font_size.";";  } ?> <?php if(!empty($font_colour)){ echo "color:".$font_colour.";";  } ?>">
          <table cellpadding="0" cellspacing="0" width="100%">
              <tr> 
                <!-- box!! -->
                <th width="300" valign="top" class="col-2-promos" style="<?php if(!empty($text_align_col_left)){ echo "text-align:".$text_align_col_left.";";  } ?><?php if(!empty($font_weight)){ echo "font-weight:".$font_weight.";";  } ?>">
                <!-- offer button --> 
                    
								

								<?php
									
									if(empty($content_left)){
								?>


					
								<div class="content-type-select">  
								  	<form method="post" action="column-content-type-text-left.php" class="form-right">
										<input type="hidden" value="<?php echo $row['id']; ?>" name="id" >
										<input type="hidden" value="<?php echo $row['eshot_id']; ?>" name="eshot_id" >
										<input type="hidden" value="<?php echo $row['eshot_name']; ?>" name="eshot_name" >
										<textarea rows="4" cols="50" name="content_left"><?php echo $row['content_left']; ?></textarea>
										
										<input type="submit" name="submit" value="submit">
									</form>
								</div>
									


					
								<?php 
									}
									else{

                                        echo "<span style='width:100%; display:block; font-family:".$font_family."'>" . $row['content_left'] . "</span>";

										if($find_us_on == 1){
										    echo "<span style='margin-right:2px;font-size:12px; font-family:".$font_family."'>Find us on: </span>";
                                        }

                                        if($social_icon_1 == 1){ echo '<a href="'.$si_link_1.'" target="_blank"><img alt="Facebook" class="social-icon" src="'.$si_url_1.'" style="outline:0; width:'.$si_width.'px !important; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                                        if($social_icon_2 == 1){ echo '<a href="'.$si_link_2.'" target="_blank"><img alt="Twitter" class="social-icon" src="'.$si_url_2.'" style="outline:0; width:'.$si_width.'px !important; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                                        if($social_icon_3 == 1){ echo '<a href="'.$si_link_3.'" target="_blank"><img alt="LinkedIn" class="social-icon" src="'.$si_url_3.'" style="outline:0; width:'.$si_width.'px !important; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                                        if($social_icon_4 == 1){ echo '<a href="'.$si_link_4.'" target="_blank"><img alt="YouTube" class="social-icon" src="'.$si_url_4.'" style="outline:0; width:'.$si_width.'px !important; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }
                                        if($social_icon_5 == 1){ echo '<a href="'.$si_link_5.'" target="_blank"><img alt="Instagram" class="social-icon" src="'.$si_url_5.'" style="outline:0; width:'.$si_width.'px !important; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="'.$si_width.'" border="0"></a>'; }

//                                        if($social_icon_1 == 1){ echo '<a href="#" target="_blank"><img alt="Facebook" class="social-icon" src="http://eshotbuilder.bigmarketing.co.uk/images/facebook.png" style="outline:0; width:'.$si_width.'px; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="21" border="0"></a>'; }
//                                        if($social_icon_2 == 1){ echo '<a href="#" target="_blank"><img alt="Twitter" class="social-icon" src="http://eshotbuilder.bigmarketing.co.uk/images/twitter.png" style="outline:0; width:'.$si_width.'px; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="21" border="0"></a>'; }
//                                        if($social_icon_3 == 1){ echo '<a href="#" target="_blank"><img alt="LinkedIn" class="social-icon" src="http://eshotbuilder.bigmarketing.co.uk/images/youtube.png" style="outline:0; width:'.$si_width.'px; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="21" border="0"></a>'; }
//                                        if($social_icon_4 == 1){ echo '<a href="#" target="_blank"><img alt="YouTube" class="social-icon" src="http://eshotbuilder.bigmarketing.co.uk/images/linkedin.png" style="outline:0; width:'.$si_width.'px; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="21" border="0"></a>'; }
//                                        if($social_icon_5 == 1){ echo '<a href="#" target="_blank"><img alt="Instagram" class="social-icon" src="http://eshotbuilder.bigmarketing.co.uk/images/instagram.png" style="outline:0; width:'.$si_width.'px; padding-left:0px; padding-right:'.$si_padding.'px; margin-top:'.$si_margin_top.'px;" width="21" border="0"></a>'; }

								?>

                                        <span class="button-edit"><a style="font-size:15px; font-weight:bold;" href="column-edit.php?content_type=custom_footer_1_left&content_id=<?php echo $row['id'] ?>&content_position=left&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a></span>

								<?php	
									}
								?>
									

									
									


                <!-- end offer button --> 
                </th>
                <!-- end box --> 



                <!-- box -->
                <th width="300" valign="top" class="col-2-promos" style="<?php if(!empty($text_align_col_right)){ echo "text-align:".$text_align_col_right.";";  } ?>">
                 <!-- offer button --> 
                    		 
							  
							  	<?php

									
										if(empty($content_right)){
										?>
											
												
											<div class="content-type-select">

											<form method="post" action="column-content-type-text-right.php" class="form-right">
												<input type="hidden" value="<?php echo $row['id']; ?>" name="id" >
												<input type="hidden" value="<?php echo $row['eshot_id']; ?>" name="eshot_id" >
												<input type="hidden" value="<?php echo $row['eshot_name']; ?>" name="eshot_name" >
<!--											<textarea rows="4" cols="50" name="content_right">--><?php //echo $row['content_right']; ?><!--</textarea>-->
                                                <input type="text" value="" name="content_right" placeholder="http://your link goes in here">


												<input type="submit" name="submit" value="submit">
											</form>
											</div>
												

										<?php 
											}
										else{
										?>

                                            <img src="<?php echo "https://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_1.$row['content_right']; ?>" alt="logo" style="outline:0; width: 100px!important; <?php if(!empty($text_align_col_right)){ echo "float:".$text_align_col_right.";";  } ?>" width="100" height="auto" border="0">





								  		<span class="button-edit">
											<a href="column-edit.php?content_type=custom_footer_1_right&content_id=<?php echo $row['id']; ?>&content_position=right&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
								  		</span>
												

								  		
										<?php
										}
										?>
									



								  
                <!-- end offer button --> 
                </th>
                <!-- end box --> 
                
              </tr>
            </table>
	 </th>
	
</tr>

<tr>
	<th>
        <div class="menu-left-4"><a href="delete.php?id=<?php echo $id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name ?>" onclick="return confirm('Are you sure to delete this record?');"><i class="fa fa-fw">&#xf014</i> Delete</a></div>
		<div class="menu-left-3"><a href="duplicate.php?id=<?php echo $id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name ?>" onclick="return confirm('Are you sure to duplicate this row?');"><i class="fa fa-fw">&#xf0c5</i> Duplicate</a></div>
		<div class="menu-left-2">
				<form method="post" action="reorder.php" >
				<label><i class="fa fa-fw">&#xf074</i> Reorder</label>
				<input type="text" value="<?php echo $row['sortable']; ?>" name="reorder" class="reorder-field">
				<input type="hidden" value="<?php echo $row['id']; ?>" name="id" >
				<input type="hidden" value="<?php echo $row['eshot_id']; ?>" name="eshot_id" >
				<input type="hidden" value="<?php echo $row['eshot_name']; ?>" name="eshot_name" >	
				<input type="submit" name="submit" value="submit" class="reorder-button">
			</form>
		</div>
	</th>
</tr>