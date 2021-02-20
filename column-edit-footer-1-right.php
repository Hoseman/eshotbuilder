<?php
require_once 'config.php';
require_once 'functions.php';
$padding_1 = $_POST['padding_1'];
$padding_2 = $_POST['padding_2'];
$padding_3 = $_POST['padding_3'];
$padding_4 = $_POST['padding_4'];
$col_bg_colour = $_POST['col_bg_colour'];

$text_align_col_right = $_POST['text_align_col_right'];

$footer_logo_right = $_POST['footer_logo_right'];
$column_edit_id = $_POST['column_edit_id'];

$eshot_id = $_POST['eshot_id'];
$eshot_name = $_POST['eshot_name'];





try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE $tbl_name SET padding_1=?, padding_2=?, padding_3=?, padding_4=?, col_bg_colour=?, text_align_col_right=?, content_right=? WHERE id=?";
    $q = $conn->prepare($sql);
    $q->execute(array($padding_1,$padding_2,$padding_3,$padding_4,$col_bg_colour,$text_align_col_right,$footer_logo_right,$column_edit_id));
}
catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);

