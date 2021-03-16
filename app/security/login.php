<?php
require_once dirname(__FILE__).'/../../config.php';

//pobranie parametrów
function logowanie(&$form){
	$form['login'] = isset ($_REQUEST ['login']) ? $_REQUEST ['login'] : null;
	$form['hasło'] = isset ($_REQUEST ['hasło']) ? $_REQUEST ['hasło'] : null;
}


function sprawdzenielogowania(&$form,&$messages){
	if ( ! (isset($form['login']) && isset($form['hasło']))) {
		return false;
	}

	
	if ( $form['login'] == "") {
		$messages [] = 'Nie podano loginu';
	}
	if ( $form['hasło'] == "") {
		$messages [] = 'Nie podano hasła';
	}

	
	if (count ( $messages ) > 0) return false;

	
	if ($form['login'] == "admin" && $form['hasło'] == "admin") {
		session_start();
		$_SESSION['role'] = 'admin';
		return true;
	}
	if ($form['login'] == "user" && $form['hasło'] == "user") {
		session_start();
		$_SESSION['role'] = 'user';
		return true;
	}
	
	$messages [] = 'Niepoprawny login lub hasło';
	return false; 
}


$form = array();
$messages = array();

logowanie($form);

if (!sprawdzenielogowania($form,$messages)) {
	//jeśli błąd logowania to wyświetl formularz z tekstami z $messages
	include _ROOT_PATH.'/app/security/login_view.php';
} else { 
	header("Location: "._APP_URL);
	
	//"forward"
	//include _ROOT_PATH.'/index.php';
}