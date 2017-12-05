<?php include('cabecalho.php');



$nome = $_POST["nome"];
$preco = $_POST["preco"];
$descricao = $_POST["descricao"];
$categoria_id = $_POST['categoria_id'];
$fk_user = $_SESSION['userId'];

if(array_key_exists('usado', $_POST)){
	$usado = "true";
} else{
	$usado = "false";
}



if (insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado,$fk_user)){?>
<p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> adicionado com sucesso</p>

<a href="produto-lista.php"><input class="btn btn-primary" name="btnvoltar" type="submit" value="Voltar a Lista de Produtos"></a>
<?php } else {
	$msg = mysqli_error($conexao);
	?>
	<p class="text-danger">Produto <?= $nome ?> não adicionado: <?= $msg ?></p>

	<a href="produto-lista.php"><input class="btn btn-primary" name="btnvoltar" type="submit" value="Voltar a Lista de Produtos"></a>
	<?php
}
mysqli_close($conexao);
?>
<?php include('rodape.php'); ?>
