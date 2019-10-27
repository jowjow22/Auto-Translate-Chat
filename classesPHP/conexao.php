<?php 

class Conexao{
	private $pdo;
	public function conectar($nome, $host, $usuario, $senha)
	{
		global $pdo;
		try 
		{
			$pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
		} catch (PDOException $e) {
		  $msgErro = $e->getMessage();
		}
		
	}
}
Class Usuario
{
	private $pais,$paisSelect;
	public function cadastrar($nome, $nascimento, $login, $senha, $img,$nmImg, $bio, $idPais)
	{

		$diretorio = "img/users/";
		global $pdo;
		//verificar se ja existe o email cadastrado
		$sql = $pdo->prepare("SELECT cd_user FROM tb_user WHERE nm_login = :l");
		$sql->bindValue(":l",$login);
		$sql->execute();
		if ($sql->rowCount() > 0)
		{
			return false;
		}
		else //caso nao, cadastrar
		{
			$dir ="img/user/".$nmImg;
		move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nmImg);
			$sql = $pdo->prepare('INSERT INTO tb_user (nm_user, dt_nascimento, nm_login,nm_status, nm_password, img_user,txt_bio,id_pais) VALUES (:n, :nas, :l,:sts, :s, :img, :bio, :idP)');
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":nas",$nascimento);
			$sql->bindValue(":l",$login);
			$sql->bindValue(":sts","Offline");
			$sql->bindValue(":s",md5($senha));
			$sql->bindValue(":img",$dir);
			$sql->bindValue(":bio",$bio);
			$sql->bindValue(":idP",$idPais);
			$sql->execute();

			return true;

		}
		
	}
	public function logar($login, $senha)
	{
		global $pdo;
		//verifica se o email e senha estão cadastrados, se sim, 
		$sql = $pdo->prepare("SELECT cd_user FROM tb_user WHERE nm_login = :l AND nm_password = :s");
		$sql->bindValue(":l",$login);
		$sql->bindValue(":s",md5($senha));
		$sql->execute();
		if ($sql->rowCount() > 0) {
			//entra no sistema
			$dadoCD = $sql->fetch();
			session_start();
			$_SESSION['cd_user'] = $dadoCD['cd_user'];
			$sql = $pdo->prepare('UPDATE tb_user SET nm_status = "Online" WHERE cd_user = :c');
			$sql->bindValue(":c",$_SESSION['cd_user']);
			$sql->execute();
			return true; //logado com sucesso
		}
		else{
			return false; //nao foi possivel logar
		}
	}
	public function selPaises(){
		global $pdo,$pais,$paisSelect;
		$paisSelect = $pdo->prepare("SELECT * FROM tb_paises");
		$paisSelect->execute();
		$pais;
	}

	public function CadastrarMsgs($origem, $destino, $msg){
		global $pdo;
		$sql=$pdo->prepare('INSERT into tb_msg values(null,:m, :o, :d)');
		$sql->bindValue(':m', $msg);
		$sql->bindValue(':o', $origem);
		$sql->bindValue(':d', $destino);
		$sql->execute();
	}
	public function listarMsg(){
		global $pdo;
		$sql=$pdo->prepare('SELECT m.*, u.nm_user from tb_user u, tb_msg m where u.cd_user=m.id_origem ORDER BY m.cd_msg ASC');
		$todas=$pdo->query($sql);
			while ($msg= $todas->fetch_array()) {
				if ($msg['nm_user']==$_SESSION['cd_user']) {
					echo '<div class="row no-gutters your-message"><div class="col-xl-10 offset-xl-6"><div class="chat-bubble"><p>"'.$msg['txt_msg'].'"</p></div></div></div>';
				}
				else{
					echo '<div class="row no-gutters friend-message"><div class="col-xl-10 offset-xl-6"><div class="chat-bubble"><p>'.$msg['txt_msg'].'</p></div></div></div>';
				}
			}
	}
}

?>