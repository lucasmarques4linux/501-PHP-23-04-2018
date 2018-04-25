<?php 

// Pilhas
//  FIlO - Fist In Last Out

$pilha = new SplStack();

$pilha->push(1);
$pilha->push(2);
$pilha->push(3);
$pilha->push(4);

foreach ($pilha as $item) {
	echo $item . '<br>';
}