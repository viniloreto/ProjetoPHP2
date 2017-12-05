<?php 
include('cabecalho1.php');





$nome = $_POST["nome1"];
$nm_login_user = $_POST["usuario1"];
$cd_password_user = $_POST["senha1"];
$cd_password_user2 = $_POST['senha2'];


if(ConfereUsuarioExistente($conexao, $nm_login_user)){
	if(ConfereSenhaIgual($cd_password_user,$cd_password_user2)){
		if (CadastrarUsuario($conexao, $nome, $nm_login_user, $cd_password_user)){?>
		<p class="text-success">Nome: <?= $nome; ?>, Username: <?= $nm_login_user; ?> adicionado com sucesso</p>
		<a href="index.php"><input class="btn btn-primary" name="btnvoltar" type="submit" value="Voltar a Lista de Produtos">
			<?php } else {
				$msg = mysqli_error($conexao);
				?>
				<p class="text-danger">Usuario <?= $nome ?> não adicionado: <?= $msg ?></p>
				<a href="index.php"><input class="btn btn-primary" name="btnvoltar" type="submit" value="Voltar a Lista de Produtos">
					<?php
				}
				mysqli_close($conexao);
			}
		}else
		include('rodape.php'); ?>
