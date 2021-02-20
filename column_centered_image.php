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
    $column_centered_image_width = $row['column_centered_image_width'];
    $image_responsive = $row['image_responsive'];
}
?>
<tr>

    <th valign="top" <?php if(!empty($cp_insert_name)){ echo 'id="style-' . $cp_insert_name . '"';  } ?> class="banner-centered"
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



                <?php if(!empty($href)){ echo '<a href="'. $href .'">'; } ?>
                <img <?php if($image_responsive == "yes"){ echo 'class="center-image"'; } else { echo ""; } ?> src="<?php if(empty($img_file_name)){echo "http://placehold.it/280x180";}else{echo "http://".$eshot_domain."/".$eshot_url.$img_file_name;}?>" alt="<?php echo $alt_value; ?>" width="<?php if(!empty($column_centered_image_width)){ echo $column_centered_image_width; } else { echo "260"; } ?>px" height="auto" border="0" style="outline:0; width:<?php if(!empty($column_centered_image_width)){ echo $column_centered_image_width; } else { echo "260"; } ?>px;" />
                    <?php if(!empty($href)){ echo '</a>'; }	?>


                    <span class="button-edit"><a href="column-edit.php?content_type=<?php echo $row['content_type']; ?>&content_id=<?php echo $row['id']; ?>&eshot_id=<?php echo $row['eshot_id']; ?>&eshot_name=<?php echo $row['eshot_name']; ?>"><i class="fa fa-fw">&#xf040</i> Edit</a></span>
                <?php



            }//end foreach

            ?>




        </div>

    </th>

</tr>

<tr>
    <th>

        <div class="menu-left-4"><a href="delete.php?id=<?php echo $id; ?>&eshot_id=<?php echo $eshot_id; ?>&eshot_name=<?php echo $eshot_name ?>" onclick="return confirm('Are you sure to delete this record?');"><i class="fa fa-fw">&#xf014</i> Delete</a></div>
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