<?php 
	require_once('classesPHP/conexao.php');
	$u = new Usuario;
	$c = new Conexao;
	$c->conectar("db_autoTranslateChat","localhost","root","");
	if ($_POST) {
		$u->atualChat($_POST['id']);
		$userF;
	}

?>