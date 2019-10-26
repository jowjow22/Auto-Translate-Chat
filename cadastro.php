<?php 
require_once('classesPHP/conexao.php');
$res = "";
$c = new Conexao;
$c->conectar("db_autoTranslateChat","localhost","root","");
$u = new Usuario;
$u->selPaises();
if ($_POST) {
if($_POST['senha']==$_POST['confirmaSenha']){
		if (!empty($_POST['nome']) && !empty($_POST['nascimento']) && !empty($_POST['login']) && !empty($_POST['senha']) && !empty($_FILES['imagem']) && !empty($_POST['bio']) && !empty($_POST['pais'])) {
						$nome = $_POST['nome'];
						$nascimento = $_POST['nascimento'];
						$login = $_POST['login'];
						$senha = $_POST['senha'];
						$extensao = strtolower(substr($_FILES['imagem']['name'], -4));
						$img = $_FILES['imagem'];
						$nmImg = $login.$extensao;
						$bio = $_POST['bio'];
						$idPais = $_POST['pais'];
			if($u->cadastrar($nome, $nascimento, $login, $senha, $img,$nmImg, $bio, $idPais)){
					$res = '<div class="alert alert-success mt-5" id="msg-success" role="alert">
					 			cadastrado com sucesso!
							</div>';

				}
				else{
					$res = '<div class="alert alert-danger mt-5" id="msg-fail" role="alert">
					 			usuario existente!
							</div>';
				}
			}
			else{
				$res = '<div class="alert alert-danger mt-5" id="msg-fail" role="alert">
					 			Preencha todos os campos!
							</div>';
			}
		}
		else{
				$res = '<div class="alert alert-danger mt-5" id="msg-fail" role="alert">
					 			As senhas nao correspondem!
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
		<div class="row bg">
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 bg-pink"></div>
			<div class="col-md-6 col-lg-6 col-xl-6 col-sm-6 bg-normal"></div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row principal-cadastro">
		<div class="col-md-5 col-lg-5 col-xl-5 col-sm-5 offset-md-1 bg-white cadastro-area">
			<form enctype="multipart/form-data" method="post">
				<h2>Cadastre-se!</h2><br>
				<input type="text" name="nome" placeholder="nome e sobrenome"><br>
				<input type="date" name="nascimento"><br>
				<input type="text" name="login" placeholder="Nome de Login"><br>
				<input type="password" name="senha" placeholder="*****"><br>
				<input type="password" name="confirmaSenha" placeholder="confirme a Senha"><br>
				<input type="file" accept="img/*" name="imagem" id="file" style="display: none;"><label for="file" class="button" name="imagem"><i class="material-icons">photo</i>&nbsp;Escolha uma imagem </label><br>
				<textarea name="bio"></textarea><br>
				<select name="pais">
					<?php while($pais = $paisSelect->fetch(PDO::FETCH_ASSOC)){ ?>
						<option value="<?php echo $pais['cd_pais'] ?>"><img src="img/b.jpg"><?php echo $pais['nm_pais'] ?></option>
					<?php } ?>
				</select><br>
				<a href="index.php">Já tem Conta? Faça Login!</a><br>
				<input type="submit" name="" value="Entrar"><br>
			</form>
		</div>
		<div class="col-md-5 col-lg-5 col-xl-5 col-sm-5 bg-invert">
			<strong>
				<h2>Olá, Amigo!</h2><br>
			<p>Entre com seus dados pessoais e<br>faça muitas amizades!</p>
			<?php echo $res ?>
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
