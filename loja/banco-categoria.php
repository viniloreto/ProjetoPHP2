<?php function listaCategoria($conexao){
  $categorias = [];
  $resultado = mysqli_query($conexao, "SELECT * FROM categorias");
  while($categoria = mysqli_fetch_assoc($resultado)){
    array_push($categorias,$categoria);
  }
  return $categorias;
}
