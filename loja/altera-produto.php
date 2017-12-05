<?php include('cabecalho.php');



$nome = "";
$preco ="";
$descricao = "";
$categoria_id = 0;
$id = 0;
$usado = false;

if(isset($_POST['btneditar'])){
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$descricao = $_POST['descricao'];
	$categoria_id = $_POST['categoria_id'];
	$id = $_POST['id1'];
	if(array_key_exists('usado', $_POST)){
		$usado = "true";
	} else{
		$usado = "false";
	}
}


if (AlteraProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado, $id)){?>
<p class="text-success">Produto <?= $nome; ?>, <?= $preco; ?> alterado com sucesso</p>
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
