<?php 
require_once('classesPHP/conexao.php');
session_start();
	if (isset($_SESSION['cd_user']))
	{
	 	session_destroy();
  	}
  	else{
  		session_destroy();
  	}
$res = "";
$c = new Conexao;
$c->conectar("db_autoTranslateChat","localhost","root","");
$u = new Usuario;
if ($_POST) {
	if (!empty($_POST['login']) && !empty($_POST['senha'])) {
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		if ($u->logar($login,$senha)) {
			$res = '<script> window.location = "chatArea.php"</script>';

		}
		else{
			$res = '<div class="alert alert-danger mt-5" id="msg-fail" role="alert">
					 	Login ou senha incorretos!
					</div>';
		}
	}
	else{
	$res = '<div class="alert alert-danger mt-5" id="msg-fail" role="alert">
			Preencha todos os campos!
			</div>';
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/estiloLogin.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="node_modules/material-icons/iconfont/material-icons.css">
</head>
<body>
	<div class="container-fluid bg-fluid">
		<div class="row bg-login">
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 bg-pink"></div>
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 bg-normal"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row principal">
			<div class="col-md-5 col-lg-5 col-xl-5 col-sm-5 offset-md-1 bg-white login-area">
			<form method="post">
				<h2>Entre!</h2><br>
				<input type="text" name="login" placeholder="Usuário"><br>
				<input type="password" name="senha" placeholder="*****"><br><br>
				<a href="cadastro.php">Não tem Conta? Cadastre-se</a><br>
				<input type="submit" name="" value="Entrar">
			</form>
		</div>
	<div class="col-md-5 col-lg-5 col-xl-5 col-sm-5 bg-invert">
		<strong>
				<h2>Olá, Amigo!</h2><br>
				<p>Entre com seus dados pessoais e<br>faça muitas amizades!</p>
				<?php echo $res;?>
			</strong>
		</div>
	</div>
</div>
        <script>
            setTimeout(function(){ 
                var msg = document.getElementById("msg-success");
                msg.style.opacity = "0";   
            }, 2000);
            setTimeout(function(){ 
                var msg = document.getElementById("msg-fail");
                 msg.style.opacity = "0";  
            }, 2000);
        </script>
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
</body>
</html>
