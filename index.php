<?php
declare(strict_types=1);
require_once("Database.php");

$db = new Database();

$query = "SELECT * FROM users";
$db->query($query);
$rows = $db->resultset();
//var_dump($rows);
foreach($rows as $key=>$row){
    
    echo "Name: ".$row->name." and Email: ".$row->email."<br/>";
}
echo $db->rowCount();

?>