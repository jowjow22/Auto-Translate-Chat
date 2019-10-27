<?php 	
	require_once('classesPHP/conexao.php');
	 session_start();
	 if (!isset($_SESSION['cd_user']))
	 {
		    header("location: index.php");
		    exit;
  	}
	$u = new Usuario;
	$c = new Conexao;
	$c->conectar("db_autoTranslateChat","localhost","root","");
	$u->userDados($_SESSION['cd_user']);
	$u->selAmigos($_SESSION['cd_user']);
	$userDados = $user->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- materialize css -->
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="node_modules/bootstrap/compiler/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="node_modules/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="node_modules/material-icons/iconfont/material-icons.css">
</head>
<body>

<div class="container">
	<div class="row no-gutters">
		<div class="col-md-4 border-right">
			 <div class="user-bar">
				<img src="<?php echo $userDados['img_user']; ?>" class="user-image">
				<h6><?php echo $userDados['nm_user']; ?></h6><br>
				<div class="status <?php echo $userDados['nm_status'];?>"></div><p class=""><?php echo $userDados['nm_status']; ?></p>
			</div>
				<span class="user-bar-icons float-right">
					<i class="material-icons">cached</i>
          			<i class="material-icons">message</i>
          			<i class="material-icons">menu</i>
				</span>
				<form class="search">
					<input placeholder="Pesquise Aqui!" type="text" name=""><button type="submit"><i class="material-icons">search</i></button>
				</form>
				<div class="friend-messages" data-spy="scroll">
					<?php while ($amgDados = $amg->fetch(PDO::FETCH_ASSOC)) {?>
					<div class="friend">
					<img src="<?php echo $amgDados['img_user']; ?>" class="user-image float-left">
					<div class="status <?php echo $amgDados['nm_status'] ?>"></div>
					<span class="time float-right">2:40</span>
					<h6><?php echo $amgDados['nm_login']; ?></h6>
					<p class="">minha ultima mensagem é esse nude</p>
					</div>
					<hr>
				<?php } ?>

				</div>	
			</div>
			<div class="col-md-8">
				<div class="atual-chat">
					<img src="img/b.jpg" class="user-image">
					<h6>Web Namoradita</h6>
					<div class="status online"></div><p class="text-muted">Online</p>
					<span class="atual-chat-icons float-right">
						<i class="material-icons">video_call</i>
	          			<i class="material-icons">phone</i>
	          			<i class="material-icons">settings_applications</i>
					</span>
				</div>
				<div class="chat-area">
					<div class="messages-area">
						<div class="row no-gutters friend-message">
							<div class="col-xl-10">
								<div class="chat-bubble">
									<p>eae manito!</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa!</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters friend-message">
							<div class="col-xl-10">
								<div class="chat-bubble">
									<p>eae manito!  asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters friend-message">
							<div class="col-xl-10">
								<div class="chat-bubble">
									<p>eae manito! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
						<div class="row no-gutters your-message">
							<div class="col-xl-10 offset-xl-6">
								<div class="chat-bubble">
									<p>opa! asdasdasd asdasdasd asdadasd asdadasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdasd asdasdas asdasdas adsad</p>
								</div>
							</div>
						</div>
					</div>
						<form class="send-messages-area" method="post" id="form">
							<textarea placeholder="Mande Mensagens!" name="textarea" id="msg"></textarea><button type="submit" class="float-right"><i class="material-icons">send</i></button>
						</form>
						<!-- <input type="hidden" name="">https://codepen.io/FilipRastovic/pen/pXgqKK</input> -->
						
				</div>
			</div>
		</div>
	</div>
<script src="node_modules/jquery/dist/jquery.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
</body>
</html>