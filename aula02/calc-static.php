<?php 

class Calc
{
	public static function hello()
	{
		return 'Hello';
	}

	public static function somar(int $a,int $b){return $a + $b;}
	public static function subtrair(int $a,int $b){return $a - $b;}
	public static function multiplicar(int $a,int $b){return $a * $b;}
	public static function dividir(int $a,int $b){return $a / $b;}
}


echo Calc::hello();
echo '<br>';
echo Calc::somar(5,5);
echo '<br>';
echo Calc::subtrair(10,3);
echo '<br>';
echo Calc::multiplicar(2,4);
echo '<br>';
echo Calc::dividir(40,8);