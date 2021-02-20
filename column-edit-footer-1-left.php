<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];
$col_bg_colour = $_POST['col_bg_colour'];
$font_size = $_POST['font_size'];
$font_colour = $_POST['font_colour'];
$text_align_col_left = $_POST['text_align_col_left'];
$font_family = $_POST['font_family'];
$font_weight = $_POST['font_weight'];
$line_height = $_POST['line_height'];
$content_left = $_POST['content_left'];
$social_icon_1 = $_POST['social_icon_1'];
$social_icon_2 = $_POST['social_icon_2'];
$social_icon_3 = $_POST['social_icon_3'];
$social_icon_4 = $_POST['social_icon_4'];
$social_icon_5 = $_POST['social_icon_5'];
$si_margin_top = $_POST['si_margin_top'];
$si_padding = $_POST['si_padding'];
$si_width = $_POST['si_width'];
$si_url_1 = $_POST['si_url_1'];
$si_url_2 = $_POST['si_url_2'];
$si_url_3 = $_POST['si_url_3'];
$si_url_4 = $_POST['si_url_4'];
$si_url_5 = $_POST['si_url_5'];
$si_link_1 = $_POST['si_link_1'];
$si_link_2 = $_POST['si_link_2'];
$si_link_3 = $_POST['si_link_3'];
$si_link_4 = $_POST['si_link_4'];
$si_link_5 = $_POST['si_link_5'];
$column_edit_id = $_POST['column_edit_id'];
$find_us_on = $_POST['find_us_on'];


$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];



//echo "<pre>";
//print_r($_POST);
//echo "</pre>";
//
//exit;


try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, font_colour=?, font_size=?, text_align_col_left=?, font_family=?, font_weight=?, line_height=?, content_left=?, social_icon_1=?, social_icon_2=?, social_icon_3=?, social_icon_4=?, social_icon_5=?, si_margin_top=?, si_padding=?, si_width=?, si_url_1=?, si_url_2=?, si_url_3=?, si_url_4=?, si_url_5=?, si_link_1=?, si_link_2=?, si_link_3=?, si_link_4=?, si_link_5=?, find_us_on=? WHERE id=?";
    $q = $conn->prepare($sql);
    $q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$font_colour,$font_size,$text_align_col_left,$font_family,$font_weight,$line_height,$content_left,$social_icon_1,$social_icon_2,$social_icon_3,$social_icon_4,$social_icon_5,$si_margin_top,$si_padding,$si_width,$si_url_1,$si_url_2,$si_url_3,$si_url_4,$si_url_5,$si_link_1,$si_link_2,$si_link_3,$si_link_4,$si_link_5,$find_us_on,$column_edit_id));
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);

