<?php include('cabecalho.php');
include('conecta.php');
include('banco-categoria.php');
include('banco-produto.php');


$id = $_POST['id'];

$test = ListaProdutoEditar($conexao,$id)	;

	
?>
		<h1>Formulário de produtos</h1>
		<form action="altera-produto.php" method="post">
			<table class="table ">
				<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="nome" name="nome" value="<?php echo $test['nome'] ?>" /><br/><td>
			</tr>
			<tr>
			<td>Preço:</td>
			<td><input class="form-control" type="number" name="preco" value="<?php echo $test['preco'] ?>"/><br/></td>
		</tr>
		<tr>
			<td>Descrição:</td>
			<td><textarea class="form-control" name="descricao"><?php echo $test['descricao'] ?></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="checkbox" name="usado" value="<?php echo $test['usado'] ?>">Usado</input></td>
		</tr>
		<tr>
			<td>Categorias</td>
			<td>
				<select name="categoria_id" class="form-control">
				<?php $categorias = listaCategoria($conexao);
				foreach ($categorias as $categoria) {
				if($categoria['id'] == $test['categoria_id']){?>
					<option value="<?=$categoria['id']?>" selected="selected"> <?=$categoria['nome'] ?></option>	
			    <?php }else {?>
				<option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
			<?php } }?>
		</select>
		</table>
			<input type="hidden" name="id1" value="<?php echo $test['id'] ?>">
			<input class="btn btn-primary" name="btneditar" type="submit" value="Editar">
			<a href="produto-lista.php"><input class="btn btn-primary" name="btnvoltar" type="button" value="Voltar"></a>


		</form>
<?php include('rodape.php'); ?>
