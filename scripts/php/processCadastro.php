<?php
require_once('../../../cadastro.php');

if ($_POST) {
	$nome = $_POST['nome'];
	$nascimento = $_POST['nascimento'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
	$img = $_FILES['imagem'];
	$nmImg = $login.$extensao;
	$bio = $_POST['bio'];
	$idPais = $_POST['pais'];
	echo '<script type="text/javascript">window.location = "../../cadastro.php"</script>';
	$a = 1;

}

?>