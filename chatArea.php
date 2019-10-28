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
	if ($_POST) {
		 $u->cadastrarMsg($_POST['textarea'], 1, 2);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- materialize css -->
	<script src="node_modules/jquery/dist/jquery.js"></script>
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
					<i class="material-icons" data-target="#adicionar" data-toggle="modal">person_add</i>
          			<i class="material-icons">message</i>
          			<i class="material-icons">menu</i>
				</span>
				<form class="search">
					<input placeholder="Pesquise Aqui!" type="text" name=""><button type="submit"><i class="material-icons">search</i></button>
				</form>
				<div class="friend-messages" data-spy="scroll">
					<?php while ($amizade = $amg->fetch(PDO::FETCH_ASSOC)) {
						if($amizade['id_adicionou'] == $_SESSION['cd_user']){
							$sql = $pdo->prepare("select * from tb_user where cd_user = :c");
							$sql->bindValue(":c",$amizade['id_adicionado']);
							$sql->execute();
							$amgDados = $sql->fetch(PDO::FETCH_ASSOC);
						?>
				<div class="friend"  onclick="selUser(<?php echo $amgDados['cd_user']?>)">
					<img src="<?php echo $amgDados['img_user']; ?>" class="user-image float-left">
					<div class="status <?php echo $amgDados['nm_status'] ?>"></div>
					<form method="post" id="friend-id-<?php echo $amgDados['cd_user'];?>" class="">
					<input type="hidden" name="id" value="<?php echo $amgDados['cd_user']; ?>">
					</form>
					<span class="time float-right">2:40</span>
					<h6><?php echo $amgDados['nm_login']; ?></h6>
					<p class="">minha ultima mensagem é esse nude</p>
					</div>
					<hr>

				<?php }

					else{
							$sql = $pdo->prepare("select * from tb_user where cd_user = :c");
							$sql->bindValue(":c",$amizade['id_adicionou']);
							$sql->execute();
							$amgDados = $sql->fetch(PDO::FETCH_ASSOC);
							?>
					<div class="friend" onclick="selUser(<?php echo $amgDados['cd_user']?>)">
					<img src="<?php echo $amgDados['img_user']; ?>" class="user-image float-left">
					<div class="status <?php echo $amgDados['nm_status'] ?>"></div>
					<form method="post" id="friend-id-<?php echo $amgDados['cd_user'];?>" class="">
					<input type="hidden" name="id" value="<?php echo $amgDados['cd_user']; ?>">
					</form>
					<span class="time float-right">2:40</span>
					<h6><?php echo $amgDados['nm_login']; ?></h6>
					<p class="">minha ultima mensagem é esse nude</p>
					</div>
					<hr>
				<?php }}?>

				</div>	
			</div>
			<div class="col-md-8">
				<div class="atual-chat">
					<img src="" id="p-chat-img" style="opacity: 0;" class="user-image">
					<h6 class="nm_user"></h6>
					<div class="status" id="atual-chat-status"></div><p class="text-muted" id="status"></p>
					<span class="atual-chat-icons float-right">
						<i class="material-icons">video_call</i>
	          			<i class="material-icons">phone</i>
	          			<i class="material-icons" data-toggle="modal" data-target="#modalSaida">exit_to_app</i>
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
	<div class="modal fade" id="modalSaida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Poxa :c, não quer ficar mais um pouco?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Deseja mesmo sair da sua conta?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="sair" class="btn btn-danger">Sair</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="adicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title" id="exampleModalLabel">Qual amizade deseja fazer hoje?</h5>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<div class="script"></div>
<script type="text/javascript">
		$(document).on('click', '#sair', function(){
		window.location = "index.php";
		});
		function selUser(id){
		$(document).ready(function(){
			var sel = "#friend-id-"+id;
				var dados = $(sel).serialize();
				//tratar erros
				$.ajax({
					type: 'POST',
					url: 'tratamentoDados.php',
					data: dados,
					success: function(retorno){
							$('.script').html(retorno);
							$('.chat-bubble').animate({"margin-top":"30px","opacity":"1"},"slow");
							}
						});
						return false;
		});
	}

	$(document).on('submit','#form',function(){
				var dados = $(this).serialize();
				//tratar erros
				$.ajax({
					type: 'POST',
					url: 'chatArea.php',
					data: dados,
					success: function(retorno){
							$('#msg').val("");
					}
				});
				return false;
		});
</script>
<script src="node_modules/popper.js/dist/umd/popper.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
</body>
