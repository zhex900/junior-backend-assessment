<?php
require_once("./DB.php");
require_once("./config.php");

$mysql = new DB("mysql", $servername, $username, $password, $dbname);
$mysql->open();
$original_data = $mysql->fetchTable("original_data");
$gender_conversion = array('F'=>'women','M'=>'men');

array_walk($original_data, function($row) use ($mysql,$gender_conversion) {
    $sql = "INSERT INTO migrated_data (sku, name, image_url)
    VALUES (?,?,?)";

    $g = trim(strtoupper($row['gender']));
    $gender = $g!="F" && $g != "M" ? "F" : $g;
    $sku = $gender_conversion[$gender]."_".$row['product_code'];
    $name = $row['product_label'];
    $image_url ="";
    $mysql->execute($sql,array($sku,$name,$image_url));
});

$mysql->close();