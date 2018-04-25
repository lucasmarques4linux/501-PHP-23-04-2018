<?php 

$array = new ArrayIterator([1,2,3,4,5]);

echo "<pre>";
// print_r($array);

foreach ($array as $key => $value) {
	echo $key . '-' . $value . '<br>';
}