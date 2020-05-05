<?php

function compare($a, $b){
	return ($a['name']> $b['name']); // enter the key by which you want to sort the array
}
$testArray = array( 
    array("name"=>"Chirag", "age"=>"30"), 
    array("name"=>"Anuj", "age"=>"20"),
    array("name"=>"Vikas", "age"=>"24"),
    array("name"=>"Naman", "age"=>"28"), 
); 

usort($testArray, "compare");

echo "<pre>";
print_r($testArray);

?>