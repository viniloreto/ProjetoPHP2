<?php 



 function listaProdutos($conexao){
  $produtos = [];
  $resultado = mysqli_query($conexao, "SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on c.id=p.categoria_id");

      while($produto = mysqli_fetch_assoc($resultado)){
    array_push($produtos,$produto);
  }
  return $produtos;
}
function listaMeusProdutos($conexao){
  $produtos = [];
  $resultado = mysqli_query($conexao, "SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on c.id=p.categoria_id and p.fk_user = '{$_SESSION['userId']}'");

      while($produto = mysqli_fetch_assoc($resultado)){
    array_push($produtos,$produto);
  }
  return $produtos;
}

function ListaProdutoEditar($conexao,$id){
  $resultado = mysqli_query($conexao, "SELECT p.*, c.nome as categoria_nome FROM produtos as p join categorias as c on c.id=p.categoria_id and p.id = {$id}");  
    $testando = mysqli_fetch_assoc($resultado);
  return $testando;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado,$fk_user) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado, fk_user)
    values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado}, {$fk_user})";
    $resultado = mysqli_query($conexao, $query);


    return $resultado;
}
function AlteraProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado,$id) {
      $query = "UPDATE  produtos  set nome='{$nome}', preco ={$preco} , descricao ='{$descricao}' , categoria_id = {$categoria_id} , usado = {$usado} 
      where produtos.id = $id";     
    $resultado = mysqli_query($conexao, $query);

    return $resultado;
}

function removeProduto($conexao, $id){
  $query = "DELETE FROM produtos WHERE id = {$id}";
  return mysqli_query($conexao, $query);
}

