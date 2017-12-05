<?php include('cabecalho.php');


$id = $_POST['id'];

removeProduto($conexao, $id);
header("Location: produto-lista.php?removido=true");
die();
?>
