<?php
/**
 * Created by PhpStorm.
 * User: jake
 * Date: 18/2/19
 * Time: 11:25 AM
 */
require_once("./DB.php");
require_once("./config.php");

$data = array_map('str_getcsv', file($data_file));
array_shift($data); // remove the header row

$mysql = new DB("mysql", $servername, $username, $password, $dbname);
$mysql->open();

array_walk($data, function($row) use ($mysql){

    $sql = "INSERT INTO original_data (product_code, product_label, gender)
    VALUES (?,?,?)";
    $mysql->execute($sql,$row);

});

$mysql->close();



