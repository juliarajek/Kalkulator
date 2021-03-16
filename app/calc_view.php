<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
</head>
<body>
<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/inna_chroniona.php" class="pure-button">kolejna chroniona strona</a>
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>
<form action="<?php print(_APP_URL);?>/app/calc.php" method="post" class="pure-form pure-form-stacked">
<legend>Kalkulator kredytowy</legend>	
<fieldset>
    <label for="id_x"> Podaj kwote kredytu: </label>
    <input id="id_x" type="text" name="x" value="<?php out($x) ?>" /> <br/><br>

    <label for="id_y"> Podaj na ile lat: </label>
    <input id="id_y" type="text" name="y" value="<?php out($y) ?>" /> <br><br>

    <label for="id_z"> Podaj oprocentowanie: </label>
    <input id="id_z" type="text" name="z" value="<?php out($z) ?>" /> <br><br>
</fieldset>	
<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/> <br>
</form>	
<?php
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
<br>
<?php if (isset($wynik)){ ?>
<?php echo 'Odsetki łącznie: '.$wynik; ?> <br>
<?php $razem = $wynik + $x;?>
<?php echo 'Łącznie do spłaty: '.$razem; ?>
<?php } ?>
    
</body>
</html>