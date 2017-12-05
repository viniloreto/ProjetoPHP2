<?php include('cabecalho.php'); 




$id = $_SESSION['userId'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>Meu Perfil</title>
  <meta charset="UTF-8"/>
</head>
<body>

  <header>




  </header>

  <div class="row">
   
    
    <div class="col">
      <p>Nome: <?php  echo $_SESSION['username']; ?></p>
      <p>Login: <?php  echo $_SESSION['userLogin']; ?></p>
      <form action="foto-Upload.php" method="post" enctype="multipart/form-data">
        <label for="addimg">Adicione uma foto: </label>
        <input required type="file" name="addimg"/><br/><br/>
        <input type="hidden" value="<?php echo $id; ?>" name="id">
        <input type="submit" name="enviaimg" class="btn btn-primary" value="Enviar foto"/>
      </form>
    </div>
    <div class="col" >
     <Div class="col-sm-5" >
       <?php $aux = ListaFoto($conexao, $_SESSION['userId']);
       $aux1 = "fotos/".$aux['foto'];
       ?>
       <img  width='200px' height='auto' src="<?php echo $aux1 ?>"/>
     </Div>
   </div>

 </div>




 <hr/>
 <h1>Meus Produtos Cadastrados</h1><br/>
 <table class="table table-striped">
  <tr>
    <thead>
      <th>Produto</th>
      <th>Preço</th>
      <th>Descrição</th>
      <th>Categoria</th>
    </thead>
  </tr>
  <?php $produtos = listaMeusProdutos($conexao);
  foreach ($produtos as $produto) {?>
  <tr>
    <td><?=$produto['nome']?></td>
    <td><?=$produto['preco']?></td>
    <td><?=substr($produto['descricao'],0, 40)?></td>
    <td><?=$produto['categoria_nome']?>
      <td>
        <form action="remove-produto.php" method="post">
          <input type="hidden" name="id" value="<?=$produto['id']?>">
          <button class="btn btn-danger">Remover</button>
        </form>
      </td>
      <td>
        <form action="produto-formulario-editar.php" method="post">
          <input type="hidden" name="id" value="<?=$produto['id']?>">
          <button class="btn btn-danger" >Editar</button>
        </form>
      </td>
    </tr>
    <?php }
    ?>
  </table>

</body>
</html>
