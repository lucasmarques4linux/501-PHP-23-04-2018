<?php 

class Impares extends FilterIterator
{
	public function accept()
	{
		$num = $this->getInnerIterator()->current();
		$impar = $num % 2 === 1;
		return $impar;
	}
}
$array = new ArrayIterator([1,2,3,4,5]);
$impares = new Impares($array);
echo "<pre>";
// print_r($array);

foreach ($array as $key => $value) {
	echo $key . '-' . $value . '<br>';
}
echo '<hr>';
foreach ($impares as $key => $value) {
	echo $key . '-' . $value . '<br>';
}