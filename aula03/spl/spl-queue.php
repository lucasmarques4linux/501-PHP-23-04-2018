<?php 

// Filas
// FIFO - Fist In Fist Out

$fila = new SplQueue();

$fila->enqueue(1);
$fila->enqueue(2);
$fila->enqueue(3);
$fila->enqueue(4);

foreach ($fila as $item) {
	echo $item . '<br>';
}