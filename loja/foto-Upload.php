<?php 
include('conecta.php');
include('banco-categoria.php');
include('banco-produto.php');
include('banco-user.php');
session_start();
$id = $_POST['id'];
if(isset($_POST['enviaimg'])){
if ( isset( $_FILES[ 'addimg' ][ 'name' ] ) && $_FILES[ 'addimg' ][ 'error' ] == 0 ) {
    
    $addimg_tmp = $_FILES[ 'addimg' ][ 'tmp_name' ];
    $nome = $_FILES[ 'addimg' ][ 'name' ];
 
    // Pega a extensão
    $extensao = pathinfo ( $nome, PATHINFO_EXTENSION );
 
    // Converte a extensão para minúsculo
    $extensao = strtolower ( $extensao );
 
    // Somente imagens, .jpg;.jpeg;.gif;.png
    // Aqui eu enfileiro as extensões permitidas e separo por ';'
    // Isso serve apenas para eu poder pesquisar dentro desta String
    if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ) {
        // Cria um nome único para esta imagem
        // Evita que duplique as imagens no servidor.
        // Evita nomes com acentos, espaços e caracteres não alfanuméricos
        $novoNome = uniqid ( time () ) . '.' . $extensao;
    
        // Concatena a pasta com o nome
        $destino = 'fotos/' . $novoNome;
 
        // tenta mover o addimg para o destino
        if ( move_uploaded_file ( $addimg_tmp, $destino ) ) {
            
            if(mysqli_query($conexao,"SELECT foto FROM user where cd_user = $id")) {
                $sql = mysqli_query($conexao,"UPDATE user set foto='$novoNome' where cd_user = $id");   
                header("location:home.php");    
            }else{
            if(DeleteFoto($conexao, $id)){
                $sql = mysqli_query($conexao,"UPDATE user set foto='$novoNome' where cd_user = $id");   
                header("location:home.php");
            }else
                  echo "Foto não foi apagada. provavelmente você precisa de mais privilegios para remover esta foto.";
       }
   }   
        
        else
            echo 'Erro ao salvar o addimg. Aparentemente você não tem permissão de escrita.<br />';
    }
    else
        echo 'Você poderá enviar apenas addimgs "*.jpg;*.jpeg;*.gif;*.png"<br />';
}
else
    echo 'Você não enviou nenhum addimg!';

}
