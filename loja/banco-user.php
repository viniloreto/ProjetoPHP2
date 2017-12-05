<?php





  function LogarUsuario($conexao,$userLogin, $userPassword){
  
      $stmt = mysqli_query($conexao, "SELECT * FROM user WHERE nm_login_user = '{$userLogin}' AND cd_password_user = '{$userPassword}'");
      $row = mysqli_fetch_assoc($stmt);
      

      if($row['cd_user']){
      session_start();
        $_SESSION['userId'] = $row['cd_user'];
        $_SESSION['username'] = $row['nm_user'];
        $_SESSION['userLogin'] = $row['nm_login_user'];


        header("location:produto-lista.php");
      }else{
        die("Usuario ou senha incorretos  </br> <a href='index.php'><button type='button' n class='btn btn-primary'>Voltar</button></a>");
        
      }
   
  }

  function ChecarSession(){
    if(!isset($_SESSION['userId'])){
      header("location:index.php");
      exit();
    }
  }
  function Deslogar(){
    $_SESSION['userId'] = "";
    $_SESSION['username'] = "";
    $_SESSION['userLogin'] = "";
    session_destroy();
    header("location:index.php");
  }

  function CadastrarUsuario($conexao, $nome, $nm_login_user, $cd_password_user){

    $query = "insert into user (nm_user, nm_login_user,cd_password_user)
    values ('{$nome}', '{$nm_login_user}', '{$cd_password_user}')";
    $resultado = mysqli_query($conexao, $query);


    return $resultado;
  }


  function ConfereUsuarioExistente($conexao, $nm_login_user){

    $stmt = mysqli_query($conexao, "SELECT * FROM user WHERE nm_login_user = '{$nm_login_user}'");
    $rows = mysqli_fetch_assoc($stmt);


    if($rows['nm_login_user']!=null){
      die("Usuario ja cadastrado  </br> <a href='index.php'><button type='button' n class='btn btn-primary'>Voltar</button></a>");
    }else 
     return true;
  }

  function ConfereSenhaIgual($senha1, $senha2){

    if($senha1 == $senha2)
      return true;
    else 
      die("As senhas nao conferem  </br> <a href='index.php'><button type='button' n class='btn btn-primary'>Voltar</button></a>");
  }

function ListaFoto($conexao, $cd_user){
$sql = mysqli_query($conexao,"SELECT foto FROM user  where cd_user = $cd_user");
$row = mysqli_fetch_assoc($sql);
return $row;
}

function DeleteFoto($conexao, $cd_user){
    $row = ListaFoto($conexao, $cd_user);
    if(unlink("fotos/".$row['foto']))
      return true;
    else
      return false;
}
