<?php require_once dirname(__FILE__) .'/../config.php';
$amount = 0;
$length = 0;
$rate = 0;
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>

<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
	<label for="kwota_label">Kwota: </label>
	<input id="kwota_label" type="text" name="amount" value="<?php print($amount); ?>" /><br />
	<label for="oprocentowanie_label">Oprocentowanie roczne: </label>
	<input id="oprocentowanie_label" type="text" name="rate" value="<?php print($rate); ?>" /><br />
	<label for="lata_label">Długość trwania kredytu: </label>
	<input id="lata_label" type="text" name="length" value="<?php print($length); ?>" /><br />
	<input type="submit" value="Oblicz" />
</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($result)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Wysokość raty: '. round($result, 2); ?>
</div>
<?php } ?>

</body>
</html>