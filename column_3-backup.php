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
						$content_type_left = $row['content_type_left'];
						$content_type = $row['content_type'];
						$content_type_right = $row['content_type_right'];
					}
?>  
<tr>
          <th valign="top" class="col-row" bgcolor="ffffff" style="padding:20px 20px 20px 20px;">
          <table cellpadding="0" cellspacing="0" width="100%">
              <tr> 
                <!-- box -->
                <th width="200" valign="top" class="col-3-promos" style="text-align:left;">
                <!-- offer button --> 
                    <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
                        <tr>
                          <th style="padding: 0px;" align="center" class="button" >
								<div class="content-type-select">
									
									
									<?php
									if($content_type_left == "") {
									?>

										<form method="post" action="column-content-type-left.php" class="form-left" >
											<select name="content_type_left">
												<option value="">Please choose...</option>
												<option value="image">Image</option>
												<option value="text">Text</option>
											</select>
											<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
											<input type="submit" name="submit" value="submit">
										</form>

									<?php
									}
									elseif($content_type_left == "image"){
									?>
										<img src="http://placehold.it/640x157" alt="DELETE" width="100%" height="auto" border="0" style="outline:0;" />
									<?php			
									}
									else {
									?>
										<form method="post" action="column-content-type-text-left.php" class="form-left">
											<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >

											<textarea rows="4" cols="50" name="content_left"><?php echo $row['content_left']; ?></textarea>

											<input type="submit" name="submit" value="submit">
										</form>

									<?php
									}
									?>
							  
								  <!--<img src="http://placehold.it/559x70" alt="BOOK A TEST DRIVE" width="190" height="37" border="0" style="outline:0;"/>-->
							  
							    </div>
                          </th>
                        </tr>
                    </table>
                <!-- end offer button --> 
                </th>
                <!-- end box --> 
				  
                
                <!-- box -->
                <th width="200" valign="top" class="col-3-promos" style="text-align:right;">
                 <!-- offer button --> 
                    <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
                        <tr>
                          <th style="padding: 0px;" align="center" class="button">
							  <div class="content-type-select">
							  
							  <?php
								if($content_type == "") {
								?>

									<form method="post" action="column-content-type.php" class="form-left" >
										<select name="content_type">
											<option value="">Please choose...</option>
											<option value="image">Image</option>
											<option value="text">Text</option>
										</select>
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
										<input type="submit" name="submit" value="submit">
									</form>

								<?php
								}
								elseif($content_type == "image"){
								?>
									<img src="http://placehold.it/640x157" alt="DELETE" width="100%" height="auto" border="0" style="outline:0;" />
								<?php			
								}
								else {
								?>
									<form method="post" action="column-content-type-text.php" class="form-left">
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >

										<textarea rows="4" cols="50" name="content"><?php echo $row['content']; ?></textarea>
										
										<input type="submit" name="submit" value="submit">
									</form>

								<?php
								}
								?>

							  
								  <!--<img src="http://placehold.it/559x70" alt="VISIT OUR FACEBOOK PAGE" width="190" height="37" border="0" style="outline:0;"/>-->
							  
							  </div>
                          </th>
                        </tr>
                    </table>
                <!-- end offer button --> 
                </th>
                <!-- end box --> 
				  
				  
				<!-- box -->
                <th width="200" valign="top" class="col-3-promos" style="text-align:right;">
                 <!-- offer button --> 
                    <table class="buttonTable" border="0" cellspacing="0" cellpadding="0" width="190" >
                        <tr>
                          <th style="padding: 0px;" align="center" class="button">
							  	<div class="content-type-select">
							  	<?php
								if($content_type_right == "") {
								?>

									<form method="post" action="column-content-type-right.php" class="form-left" >
										<select name="content_type_right">
											<option value="">Please choose...</option>
											<option value="image">Image</option>
											<option value="text">Text</option>
										</select>
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
										<input type="submit" name="submit" value="submit">
									</form>

								<?php
								}
								elseif($content_type_right == "image"){
								?>
									<img src="http://placehold.it/640x157" alt="DELETE" width="100%" height="auto" border="0" style="outline:0;" />
								<?php			
								}
								else {
								?>
									<form method="post" action="column-content-type-text-right.php" class="form-left">
										<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >

										<textarea rows="4" cols="50" name="content_right"><?php echo $row['content_right']; ?></textarea>
										
										<input type="submit" name="submit" value="submit">
									</form>

								<?php
								}
								?>

							  
								  <!--<img src="http://placehold.it/559x70" alt="VISIT OUR FACEBOOK PAGE" width="190" height="37" border="0" style="outline:0;"/>-->
							 
							  </div>
                          </th>
                        </tr>
                    </table>
                <!-- end offer button --> 
                </th>
                <!-- end box -->  
				  
                
              </tr>
            </table>
           </th>
	  
</tr>

<tr>
	<th>
		<div class="menu-left-2"><a href="#">Edit</a></div>
		<div class="menu-left-2"><a href="delete.php?id=<?php echo $id = $row['id']; ?>" onclick="return confirm('Are you sure to delete this record?');">Delete</a></div>
		<div class="menu-left-2">
			<form method="post" action="reorder.php" >
				<label>Reorder</label>
				<input type="text" value="<?php echo $row['sortable'] ?>" name="reorder" class="reorder-field">
				<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
				<input type="submit" name="submit" value="submit" class="reorder-button">
			</form>
		</div>
	</th>
</tr>