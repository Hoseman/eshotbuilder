<?php
require_once 'config.php';
require_once 'functions.php';

$id = $_GET['id'];
$eshot_id = $_GET['eshot_id'];
$eshot_name = $_GET['eshot_name'];


try {

// database connection
$conn = new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

// query
$sql = "DELETE FROM $tbl_name WHERE id =  :id";
$q = $conn->prepare($sql);
$q->execute(array(':id'=>$id,));
$url = './eshot-builder.php?eshot_id='.$eshot_id.'&eshot_name='.$eshot_name;
redirect($url);
}


catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>

