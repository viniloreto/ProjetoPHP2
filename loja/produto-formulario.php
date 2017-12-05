<?php include('cabecalho.php');

?>
<h1>Formulário de produtos</h1>
<form action="adiciona-produto.php" method="post">
	<table class="table ">
		<tr>
			<td>Nome:</td>
			<td><input class="form-control" type="nome" name="nome"/><br/><td>
			</tr>
			<tr>
				<td>Preço:</td>
				<td><input class="form-control" type="number" name="preco"/><br/></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><textarea class="form-control" name="descricao"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" name="usado" value="true">Usado</input></td>
			</tr>
			<tr>
				<td>Categorias</td>
				<td>
					<select name="categoria_id" class="form-control">
						<?php $categorias = listaCategoria($conexao);
						foreach ($categorias as $categoria) {?>
						<option value="<?=$categoria['id']?>"><?=$categoria['nome']?></option>
						<?php } ?>
					</select>
				</table>

				<input class="btn btn-primary" type="submit" value="Cadastrar">

			</form>
			<?php include('rodape.php'); ?>
