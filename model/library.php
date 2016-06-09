<?php

include_once($PROJECT_ROOT . 'model/connectBDD.php');
include_once($PROJECT_ROOT . 'model/sessions.php');

function getUserLibrary($id)
{
	global $bdd;

	$req = $bdd->prepare('SELECT cards.* FROM library INNER JOIN cards ON library.idCard = cards.id WHERE library.idUser = ? ORDER BY color, name');
	$req->execute(array($id));

	return $req->fetchAll();
}

function addCardToLibrary($idUser, $idCard)
{
	global $bdd;

	$req = $bdd->prepare('INSERT INTO library(idUser, idCard) VALUES (:us, :ca)');
	$req->execute(array(
				'us' => $idUser,
				'ca' => $idCard));
}
