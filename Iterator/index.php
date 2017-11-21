<?php
include_once("Iterator.php");

$data = array(1,2,3,4,5,6,7,8,9);
$single = new singleside($data);

while ($single->valid()){

	echo $single->current()."<br>";

	$single->next();
}