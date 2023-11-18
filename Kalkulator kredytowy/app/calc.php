<?php
require_once dirname(__FILE__).'/../config.php';

$amount = $_REQUEST ['amount'];
$rate = $_REQUEST ['rate'];
$length = $_REQUEST ['length'];

if (!(isset($amount) && isset($rate) && isset($length))) { $messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.'; }

if ($amount == "") { $messages [] = 'Nie podano kwoty kredytu'; }
if ($rate == "") { $messages [] = 'Nie podano oprocentowania kredytu'; }
if ($length == "") { $messages [] = 'Nie podano długości kredytu'; }

if (empty($messages)) {	
	if (!is_numeric($amount)) { $messages [] = 'Pierwsza wartość nie jest liczbą całkowitą'; }	
	if (!is_numeric($rate)) { $messages [] = 'Druga wartość nie jest liczbą całkowitą'; }	
	if (!is_numeric($length)) { $messages [] = 'Trzecia wartość nie jest liczbą całkowitą'; }		
}

if (empty($messages)) {
	$amount = intval($amount);
	$rate = intval($rate);
	$length = intval($length);
	
	$result = ($amount + ($amount * ($rate * $length) / 100)) / ($length * 12);
}

include 'calc_view.php';
?>
