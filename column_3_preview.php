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
	$content_type_left = $row['content_type_left'];
	$content_type_right = $row['content_type_right'];
	$content = $row['content'];
	$content_right = $row['content_right'];
	$content_left = $row['content_left'];
	$padding_1 = $row['padding_1'];
	$padding_2 = $row['padding_2'];
	$padding_3 = $row['padding_3'];
	$padding_4 = $row['padding_4'];
	$cp_insert_name = $row['cp_insert_name'];
	$col_bg_colour = $row['col_bg_colour'];
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
	$ct_img_file_name_1  = $row['ct_img_file_name_1']; //new
	$ct_img_file_name_2  = $row['ct_img_file_name_2']; //new
	$ct_img_file_name_3  = $row['ct_img_file_name_3']; //new
	$ct_img_file_name_4  = $row['ct_img_file_name_4']; //new
	$ct_img_file_name_left_1  = $row['ct_img_file_name_left_1'];
	$ct_img_file_name_left_2  = $row['ct_img_file_name_left_2'];
	$ct_img_file_name_left_3  = $row['ct_img_file_name_left_3'];
	$ct_img_file_name_left_4  = $row['ct_img_file_name_left_4'];
	$ct_img_file_name_right_1  = $row['ct_img_file_name_right_1'];
	$ct_img_file_name_right_2  = $row['ct_img_file_name_right_2'];
	$ct_img_file_name_right_3  = $row['ct_img_file_name_right_3'];
	$ct_img_file_name_right_4  = $row['ct_img_file_name_right_4'];
	$ct_img_url_1 = $row['ct_img_url_1'];
	$ct_img_url_2 = $row['ct_img_url_2'];
	$ct_img_url_3 = $row['ct_img_url_3'];
	$ct_img_url_4 = $row['ct_img_url_4'];
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
	$text_align = $row['text_align'];
	$text_align_col_left = $row['text_align_col_left'];
	$text_align_col_right = $row['text_align_col_right'];
	$font_weight = $row['font_weight'];
	$font_family = $row['font_family'];
	$line_height = $row['line_height'];
	$font_size = $row['font_size'];
	$font_colour = $row['font_colour'];
?>


		<tr>
          <th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="col-row" bgcolor="<?php echo $col_bg_colour; ?>" style="padding:<?php echo $padding_1; ?>px <?php echo $padding_2; ?>px <?php echo $padding_3; ?>px <?php echo $padding_4; ?>px; <?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?> <?php if(!empty($font_weight)){ echo "font-weight:".$font_weight.";";  } ?> <?php if(!empty($font_family)){ echo "font-family:".$font_family.";";  } ?> <?php if(!empty($line_height)){ echo "line-height:".$line_height.";";  } ?> <?php if(!empty($font_size)){ echo "font-size:".$font_size.";";  } ?> <?php if(!empty($font_colour)){ echo "color:".$font_colour.";";  } ?>">
          <table cellpadding="0" cellspacing="0" width="100%">
              <tr> 
				  
				  
				  

				  
				  
				  
                <!-- box -->
                <th width="200" align="<?php echo $text_align_col_left ?>" valign="top" class="col-3-promos" style="<?php if(!empty($text_align_col_left)){ echo "text-align:".$text_align_col_left.";";  } ?>">
                <!-- offer button --> 

                     

							  	<?php
								if($content_type_left == "") {
								?>
					
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" >
                        		<tr>
                        		<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
							
								<img src="http://placehold.it/190x37" alt="ALT TAG HERE" width="190" height="37" border="0" style="outline:0;"/>
									
								</th>
                        		</tr>
                    			</table>	

					
								

								<?php
								}
								elseif($content_type_left == "image") {
								?>
								
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" >
                        		<tr>
                        		<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
								
								<?php if(!empty($href_left)){ echo '<a href="http://'. $href_left .'">'; } ?>
									
							 	<img src="<?php if(empty($img_file_name_left)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_left;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />	
							  
								<?php if(!empty($href_left)){ echo '</a>'; }	?>
									
								</th>
                        		</tr>
                    			</table>
								

					
								<?php	
								}
	

								elseif($content_type_left == "text"){
										echo $content_left;
								}

								

								elseif($content_type_left == "custom-table-3") {
								?>
									
					
									 <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_1)){ echo '<a href="'. $ct_img_url_left_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_1;}?>" alt="<?php echo $ct_img_alt_left_1; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_2)){ echo '<a href="'. $ct_img_url_left_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_2;}?>" alt="<?php echo $ct_img_alt_left_2; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_2)){ echo '</a>'; }	?>
															
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_3)){ echo '<a href="'. $ct_img_url_left_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_3;}?>" alt="<?php echo $ct_img_alt_left_3; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_3)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
									</th>
									</tr>
									</table>
					
					
								<?php
								}

						

								elseif($content_type_left == "custom-table-4") {
								?>
									
									 <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_1)){ echo '<a href="'. $ct_img_url_left_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_1;}?>" alt="<?php echo $ct_img_alt_left_1; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_2)){ echo '<a href="'. $ct_img_url_left_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_2;}?>" alt="<?php echo $ct_img_alt_left_2; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_2)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_3)){ echo '<a href="'. $ct_img_url_left_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_3;}?>" alt="<?php echo $ct_img_alt_left_3; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_3)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_left_4)){ echo '<a href="'. $ct_img_url_left_4 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_left_4)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_left_4;}?>" alt="<?php echo $ct_img_alt_left_4; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_left_4)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
									</th>
									</tr>
									</table>	
											
								<?php
								}

						

								else {
									echo "There was an error!";
								}
								
						
								?>
							  
							  

                <!-- end offer button --> 
                </th>
                <!-- end box --> 
				  
				  
				  
                
                <!-- box -->
                <th width="200" align="<?php echo $text_align ?>" valign="top" class="col-3-promos" style="<?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?>">
                 <!-- offer button --> 


                                <?php
								if($content_type == "") {
								?>
					
									<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
                        			<tr>
                          			<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
							  
									<img src="http://placehold.it/190x37" alt="ALT TAG HERE" width="190" height="37" border="0" style="outline:0;"/>
										
									</th>
									</tr>
									</table>	
					
								<?php
								}
								elseif($content_type == "image") {
								?>	
					
									<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
                        			<tr>
                          			<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
									
									<?php if(!empty($href)){ echo '<a href="http://'. $href .'">'; } ?>
							  
									<img src="<?php if(empty($img_file_name)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />	
							  
									<?php if(!empty($href)){ echo '</a>'; }	?>
										
									</th>
									</tr>
									</table>
					
								<?php	
								}
									//IF THE CONTENT IS TEXT
									elseif($content_type == "text"){
											echo $content;
									}
									//IF THE CONTENT IS TEXT

									//IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS
									elseif($content_type == "custom-table-3") {
								?>
									
					
									 <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
											
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_1)){ echo '<a href="'. $ct_img_url_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_1;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_2)){ echo '<a href="'. $ct_img_url_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_2;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_2)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_3)){ echo '<a href="'. $ct_img_url_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_3;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_3)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
										
									</th>
									</tr>
									</table>
					
					
								<?php
								}
								//IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS
						
								//IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS
								elseif($content_type == "custom-table-4") {
								?>
									
									 <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
											
										
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_1)){ echo '<a href="'. $ct_img_url_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_1;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_2)){ echo '<a href="'. $ct_img_url_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_2;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_2)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_3)){ echo '<a href="'. $ct_img_url_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_3;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_3)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_4)){ echo '<a href="'. $ct_img_url_4 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_4)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_4;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_4)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
										
										
									</th>
									</tr>
									</table>	
											
								<?php
								}
								//IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS
						
								//IF ANYTHING ELSE THROW AN ERROR
								else {
									echo "There was an error!";
								}
								//IF ANYTHING ELSE THROW AN ERROR
						
								?>
							  
							  

                <!-- end offer button --> 
                </th>
                <!-- end box --> 
				  
				  
				  
				  
				<!-- box -->
                <th width="200" align="<?php echo $text_align_col_right ?>" valign="top" class="col-3-promos" style="<?php if(!empty($text_align_col_right)){ echo "text-align:".$text_align_col_right.";";  } ?>">
                 <!-- offer button --> 


                            	<?php
								if($content_type_right == "") {
								?>
									
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" >
                        		<tr>
                          		<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo "text-align:".$text_align_col_right.";";  } ?>" class="button" >
									
									<img src="http://placehold.it/190x37" alt="ALT TAG HERE" width="190" height="37" border="0" style="outline:0;"/>
									
								</th>
                        		</tr>
                    			</table>	
								<?php
								}
								elseif($content_type_right == "image") {
								?>
					
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" >
                        		<tr>
                          		<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo "text-align:".$text_align_col_right.";";  } ?>" class="button" >
									
								  <?php if(!empty($href_right)){ echo '<a href="http://'. $href_right .'">'; } ?>
									
								  <img src="<?php if(empty($img_file_name_right)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_right;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />
							  
								<?php if(!empty($href_right)){ echo '</a>'; }	?>
									
								</th>
                        		</tr>
                    			</table>	
					
								<?php	
								}
									//IF THE CONTENT IS TEXT
									elseif($content_type_right == "text"){
											echo $content_right;
									}
									//IF THE CONTENT IS TEXT

									//IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS
									elseif($content_type_right == "custom-table-3") {
								?>
									
					
									<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_1)){ echo '<a href="'. $ct_img_url_right_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_1;}?>" alt="<?php echo $ct_img_alt_right_1; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_2)){ echo '<a href="'. $ct_img_url_right_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_2;}?>" alt="<?php echo $ct_img_alt_right_2; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_2)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_3)){ echo '<a href="'. $ct_img_url_right_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_3;}?>" alt="<?php echo $ct_img_alt_right_3; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_3)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
									</th>
									</tr>
									</table>
					
					
								<?php
								}
								//IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS
						
								//IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS
								elseif($content_type_right == "custom-table-4") {
								?>
									
									 <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
											<table align="center" border="0" cellpadding="0" cellspacing="0" class="custom-offer" width="190">
												<tbody>
													<tr>
														<td style="padding: 0px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_1)){ echo '<a href="'. $ct_img_url_right_1 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_1)){echo "http://placehold.it/190x210";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_1;}?>" alt="<?php echo $ct_img_alt_right_1; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_1)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_2)){ echo '<a href="'. $ct_img_url_right_2 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_2)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_2;}?>" alt="<?php echo $ct_img_alt_right_2; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_2)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_3)){ echo '<a href="'. $ct_img_url_right_3 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_3)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_3;}?>" alt="<?php echo $ct_img_alt_right_3; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_3)){ echo '</a>'; }	?>
														</td>
													</tr>
													<tr>
														<td style="padding: 3px 0px 3px 0px;">
															<?php if(!empty($ct_img_url_right_4)){ echo '<a href="'. $ct_img_url_right_4 .'">'; } ?>
															<img src="<?php if(empty($ct_img_file_name_right_4)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$ct_img_file_name_right_4;}?>" alt="<?php echo $ct_img_alt_right_4; ?>" width="190" height="auto" border="0" style="outline:0;" />
															<?php if(!empty($ct_img_url_right_4)){ echo '</a>'; }	?>
														</td>
													</tr>
												</tbody>
											</table>
									</th>
									</tr>
									</table>	
											
								<?php
								}
								//IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS
						
								//IF ANYTHING ELSE THROW AN ERROR
								else {
									echo "There was an error!";
								}
								//IF ANYTHING ELSE THROW AN ERROR
						
								?>
							  
							  

                <!-- end offer button --> 
                </th>
                <!-- end box -->   
				  
				  
				<?php			
				}
				?>	 
				  
                
              </tr>
            </table>
           </th>
        </tr>