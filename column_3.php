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
						$content = $row['content'];
						$content_left = $row['content_left'];
						$content_right = $row['content_right'];
						$content_type_left = $row['content_type_left'];
						$content_type_right = $row['content_type_right'];
						$content_type = $row['content_type'];
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
                        $ct_img_alt_left_1 = $row['ct_img_alt_left_1'];
                        $ct_img_alt_left_2 = $row['ct_img_alt_left_2'];
                        $ct_img_alt_left_3 = $row['ct_img_alt_left_3'];
                        $ct_img_alt_left_4 = $row['ct_img_alt_left_4'];
                        $ct_img_alt_right_1 = $row['ct_img_alt_right_1'];
                        $ct_img_alt_right_2 = $row['ct_img_alt_right_2'];
                        $ct_img_alt_right_3 = $row['ct_img_alt_right_3'];
                        $ct_img_alt_right_4 = $row['ct_img_alt_right_4'];
						$ct_img_url_left_1 = $row['ct_img_url_left_1'];
						$ct_img_url_left_2 = $row['ct_img_url_left_2'];
						$ct_img_url_left_3 = $row['ct_img_url_left_3'];
						$ct_img_url_left_4 = $row['ct_img_url_left_4'];
						$ct_img_url_right_1 = $row['ct_img_url_right_1'];
						$ct_img_url_right_2 = $row['ct_img_url_right_2'];
						$ct_img_url_right_3 = $row['ct_img_url_right_3'];
						$ct_img_url_right_4 = $row['ct_img_url_right_4'];
						$text_align = $row['text_align'];
						$text_align_col_left = $row['text_align_col_left'];
						$text_align_col_right = $row['text_align_col_right'];
						$font_weight = $row['font_weight'];
						$font_family = $row['font_family'];
						$line_height = $row['line_height'];
						$font_size = $row['font_size'];
						$font_colour = $row['font_colour'];
					}
?>  
<tr>
          <th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="col-row" bgcolor="<?php echo $col_bg_colour; ?>" style="padding:<?php echo $padding_1; ?>px <?php echo $padding_2; ?>px <?php echo $padding_3; ?>px <?php echo $padding_4; ?>px; <?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?> <?php if(!empty($font_weight)){ echo "font-weight:".$font_weight.";";  } ?> <?php if(!empty($font_family)){ echo "font-family:".$font_family.";";  } ?> <?php if(!empty($line_height)){ echo "line-height:".$line_height.";";  } ?> <?php if(!empty($font_size)){ echo "font-size:".$font_size.";";  } ?> <?php if(!empty($font_colour)){ echo "color:".$font_colour.";";  } ?>">
          <table cellpadding="0" cellspacing="0" width="100%">
              <tr> 
                <!-- box -->
                <th width="200" valign="top" class="col-3-promos" style="<?php if(!empty($text_align_col_left)){ echo "text-align:".$text_align_col_left.";";  } ?>">
                <!-- offer button --> 

									
									
									<?php
									if($content_type_left == "") {
									?>
									<!-- IF THE CONTENT IS EMPTY -->
									<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
									<div class="content-type-select">

											<form method="post" action="column-content-type-left.php" class="form-left" >
												<select name="content_type_left">
													<option value="">Please choose...</option>
													<option value="image">Image</option>
													<option value="text">Text</option>
													<option value="custom-table-3">Custom Table - 3 Rows</option>
													<option value="custom-table-4">Custom Table - 4 Rows</option>
												</select>
												<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
												<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
												<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
												<input type="submit" name="submit" value="submit">
											</form>

									</div>
									</th>
									</tr>
									</table>
									<!-- IF THE CONTENT IS EMPTY -->
									
									<!-- IF THE CONTENT IS AN IMAGE -->
									<?php
									}
									elseif($content_type_left == "image"){
									?>
									
									<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
									<tr>
									<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
									<div class="content-type-select">
									
									<?php if(!empty($href_left)){ echo '<a href="http://'. $href_left .'">'; } ?>
									<img src="<?php if(empty($img_file_name_left)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_left;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />	
											<?php if(!empty($href_left)){ echo '</a>'; }	?>
									
									<span class="button-edit">
										<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=left&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
									</span>
										
									</div>
									</th>
									</tr>
									</table>
									<!-- IF THE CONTENT IS AN IMAGE -->
					
									<!-- IF THE CONTENT IS TEXT -->	
									<?php			
									}
									elseif($content_type_left == "text"){
												if(empty($content_left)){
												?>
												<div class="content-type-select">
													<form method="post" action="column-content-type-text-left.php" class="form-right">
														<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
														<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
														<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
														<textarea rows="4" cols="50" name="content_left"><?php echo $row['content_left']; ?></textarea>

														<input type="submit" name="submit" value="submit">
													</form>
												</div>
					
												<?php
												} else {
													echo $row['content_left'];
												?>
												<span class="button-edit">
													<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=left&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
												</span>
									<!-- IF THE CONTENT IS TEXT -->
									<?php
												}
									}
									elseif($content_type_left == "custom-table-3") {
									?>
					
											<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->
											
											<table class="buttonTable" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
											<tr>
											<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
											<div class="content-type-select">

							
											
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
											
												<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=left&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
												</span>
											</div>
											</th>
											</tr>
											</table>

											<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS --> 
					
									<?php
									}
									elseif($content_type_left == "custom-table-4") {
									?>
											<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS -->
											<table class="buttonTable" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
											<tr>
											<th style="padding: 0px;" align="<?php if(!empty($text_align_col_left)){ echo $text_align_col_left;  } ?>" class="button" >
											<div class="content-type-select">

							
											
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
											
											

											<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=left&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
											</span>
										</div>
										</th>
										</tr>
										</table>
										<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS -->   
					
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
                <th width="200" valign="top" class="col-3-promos" style="<?php if(!empty($text_align)){ echo "text-align:".$text_align.";";  } ?>">
                 <!-- offer button --> 
                    
							  	
							  	<?php
								if($content_type == "") {
								?>
								
								<!-- IF THE CONTENT IS EMPTY -->
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
                        		<tr>
                          		<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button">
							  	<div class="content-type-select">

									<form method="post" action="column-content-type.php" class="form-left" >
										<select name="content_type">
											<option value="">Please choose...</option>
											<option value="image">Image</option>
											<option value="text">Text</option>
											<option value="custom-table-3">Custom Table - 3 Rows</option>
											<option value="custom-table-4">Custom Table - 4 Rows</option>
										</select>
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
										<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
										<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
										<input type="submit" name="submit" value="submit">
									</form>
								
								</div>
								</th>
								</tr>
								</table> 
								<!-- IF THE CONTENT IS EMPTY -->
					
					
								<?php
								}
								elseif($content_type == "image"){
								?>
								
								<!-- IF THE CONTENT IS AN IMAGE -->
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
                        		<tr>
                          		<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button">
							  	<div class="content-type-select">
									
								  	<?php if(!empty($href)){ echo '<a href="http://'. $href .'">'; } ?>
								  <img src="<?php if(empty($img_file_name)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />	
								  	<?php if(!empty($href)){ echo '</a>'; }	?>
								  
								  	<span class="button-edit">
										<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=middle&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
									</span>
									
								</div>
								</th>
								</tr>
								</table>
								<!-- IF THE CONTENT IS AN IMAGE -->
					
								<!-- IF THE CONTENT IS TEXT -->
								<?php			
								}
								elseif($content_type == "text"){
										 if(empty($content)){
										?>
											<div class="content-type-select">
											<form method="post" action="column-content-type-text.php" class="form-right">
												<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
												<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
												<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
												<textarea rows="4" cols="50" name="content"><?php echo $row['content']; ?></textarea>
												<input type="submit" name="submit" value="submit">
											</form>
											</div>	
										<?php		 
										 }
										 else {
											 	echo $row['content'];
										?>
										<span class="button-edit">
											<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=middle&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
										</span>
					
								<!-- IF THE CONTENT IS TEXT -->
								  		<?php
												 
											}	
								} 
							
								elseif($content_type == "custom-table-3") {
								?>
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->
										<table class="buttonTable" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
										<tr>
										<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
										<div class="content-type-select">
							
											
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
													

											<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=middle&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
											</span>
										</div>
										</th>
										</tr>
										</table>
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS --> 
								<?php
								}
								elseif($content_type == "custom-table-4") {
								?>
								
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS -->
										<table class="buttonTable" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
										<tr>
										<th style="padding: 0px;" align="<?php if(!empty($text_align)){ echo $text_align;  } ?>" class="button" >
										<div class="content-type-select">

							
											
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
											
											

											<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_right'] ?>&content_id=<?php echo $row['id']; ?>&content_position=middle&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
											</span>
										</div>
										</th>
										</tr>
										</table>
										<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 4 ROWS -->  
									
								<?php
								}
								else{
										echo "There was an error!";
									}
								?>

							  
								  
							  

                <!-- end offer button --> 
                </th>
                <!-- end box --> 
				  
				  
				<!-- box -->
                <th width="200" valign="top" class="col-3-promos" style="<?php if(!empty($text_align_col_right)){ echo "text-align:".$text_align_col_right.";";  } ?>">
                 <!-- offer button --> 

							  	<?php
								if($content_type_right == "") {
								?>
								
								<!-- IF THE CONTENT IS EMPTY -->
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
								<tr>
								<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" class="button">
								<div class="content-type-select">

									<form method="post" action="column-content-type-right.php" class="form-left" >
										<select name="content_type_right">
											<option value="">Please choose...</option>
											<option value="image">Image</option>
											<option value="text">Text</option>
											<option value="custom-table-3">Custom Table - 3 Rows</option>
											<option value="custom-table-4">Custom Table - 4 Rows</option>
										</select>
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
										<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
										<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
										<input type="submit" name="submit" value="submit">
									</form>
									
								</div>
                          		</th>
                        		</tr>
                    			</table>	
								<!-- IF THE CONTENT IS EMPTY -->
					
								<?php
								}
								elseif($content_type_right == "image"){
								?>
								
								<!-- IF THE CONTENT IS AN IMAGE -->
								<table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
								<tr>
								<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" class="button">
								<div class="content-type-select">
									
									<?php if(!empty($href_right)){ echo '<a href="http://'. $href_right .'">'; } ?>
									<img src="<?php if(empty($img_file_name_right)){echo "http://placehold.it/190x37";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name_right;}?>" alt="<?php echo $alt_value; ?>" width="190" height="auto" border="0" style="outline:0;" />	
									<?php if(!empty($href_right)){ echo '</a>'; }	?>
									
									<span class="button-edit">
										<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=right&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
									</span>
									
								</div>
								</th>
								</tr>
								</table>
								<!-- IF THE CONTENT IS AN IMAGE -->
								
								<!-- IF THE CONTENT IS TEXT-->
								<?php			
								}
								elseif($content_type_right == "text"){
										if(empty($content_right)){
										?>
											<div class="content-type-select">
											<form method="post" action="column-content-type-text-right.php" class="form-right">
												<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
												<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
												<input type="hidden" value="<?php echo $row['eshot_name'] ?>" name="eshot_name" >
												<textarea rows="4" cols="50" name="content_right"><?php echo $row['content_right']; ?></textarea>
												<input type="submit" name="submit" value="submit">
											</form>
											</div>	

										<?php	
											} else{
												echo $row['content_right'];
										?>
									<span class="button-edit">
										<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=right&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
									</span>
								<!-- IF THE CONTENT IS TEXT-->
										<?php
											}
								}
								elseif($content_type_right == "custom-table-3") {
								?>
								<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->
										<table class="buttonTable" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
										<tr>
										<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" class="button" >
										<div class="content-type-select">
							
											
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
													

											<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_left'] ?>&content_id=<?php echo $row['id']; ?>&content_position=right&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
											</span>
										</div>
										</th>
										</tr>
										</table>
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->  
								<?php
								}
								elseif($content_type_right == "custom-table-4") {
								?>
								
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->
										<table class="buttonTable" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>"border="0" cellspacing="0" cellpadding="0" width="190" >
										<tr>
										<th style="padding: 0px;" align="<?php if(!empty($text_align_col_right)){ echo $text_align_col_right;  } ?>" class="button" >
										<div class="content-type-select">

							
											
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
											
											

											<span class="button-edit">
												<a href="column-edit.php?content_type=<?php echo $row['content_type_right'] ?>&content_id=<?php echo $row['id']; ?>&content_position=right&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a>
											</span>
										</div>
										</th>
										</tr>
										</table>
									<!-- IF THE CONTENT IS A CUSTOM TABLE WITH 3 ROWS -->   
					
					
								<?php	
								}
								else {
									echo "There was an error!";
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
		<div class="menu-left-4"><a href="delete.php?id=<?php echo $id = $row['id']; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name ?>" onclick="return confirm('Are you sure to delete this record?');"><i class="fa fa-fw">&#xf014</i> Delete</a></div>
		<div class="menu-left-3"><a href="duplicate.php?id=<?php echo $id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name ?>" onclick="return confirm('Are you sure to duplicate this row?');"><i class="fa fa-fw">&#xf0c5</i> Duplicate</a></div>
		<div class="menu-left-2">
			<form method="post" action="reorder.php" >
				<label><i class="fa fa-fw">&#xf074</i> Reorder</label>
				<input type="text" value="<?php echo $row['sortable'] ?>" name="reorder" class="reorder-field">
				<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
				<input type="hidden" value="<?php echo $row['eshot_id'] ?>" name="eshot_id" >
				<input type="hidden" value="<?php echo $row['eshot_name']; ?>" name="eshot_name" >
				<input type="submit" name="submit" value="submit" class="reorder-button">
			</form>
		</div>
	</th>
</tr>