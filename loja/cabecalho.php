<?php include('banco-user.php');
include('conecta.php');
include('banco-categoria.php');
include('banco-produto.php');

session_start();
ChecarSession();
if(isset($_POST['deslogar']))
	Deslogar();
?>
<?php $aux = ListaFoto($conexao, $_SESSION['userId']);
						$aux1 = "fotos/".$aux['foto'];

						?>
<!DOCTYPE html>
<html>
<head>
	<title>Minha loja</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="loja.css">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="home.php">Meu Perfil</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="container">
  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
      			<li class="nav-item">
					<a class="nav-link" href="produto-formulario.php">Adiciona Produto</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="produto-lista.php">Todos os Produtos</a>
				</li>
       		</ul>
    	</div>
    	<form method="post" class="form-inline my-2 my-lg-0 fixed-right">
    		<img  style="border-radius: 25px; float: right;" width='50px' height='auto' src="<?= $aux1 ?>"/>
      		<span class="nav-link" style="color: darkgrey"><?= $_SESSION['username']; ?> - <input type="submit" name="deslogar" value="Logout"/></span>
    	</form>
  </div>
</nav>
	<div class="container">
		<div class="principal">
