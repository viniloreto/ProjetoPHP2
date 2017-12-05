<?php include('cabecalho1.php'); 


if(isset($_POST['logar'])){
		LogarUsuario($conexao,$_POST['usuario'], $_POST['senha']);
	}


?>
			<h1>Bem vindo!!</h1>

 <div class="container">
            <div class="row marcador" >
                <div class="col-sm-6">
                    <h3>Cadastre-se</h3>
                   <form method="POST" action="cadastra-usuario.php">
                    	
	                        <div class="form-group">
	                            <label for="nome1" class="col-sm-2 col-form-label">Nome:</label>
	                            <input type="text" class="form-control" name="nome1" required="">
	                        </div>
                    	
                        <div class="form-group">
                            <label for="usuario1">Nome de Usuario:</label>
                            <input type="text" class="form-control" name="usuario1" required="">
                        </div>
                        <div class="form-group">
                            <label for="senha1">Senha:</label>
                            <input type="password" class="form-control" name="senha1" required="">
                        </div>
                        <div class="form-group">
                            <label for="senha2">Senha:</label>
                            <input type="password" class="form-control" name="senha2" required="">
                        </div>
                       <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
                    </form> 
                </div>
                <div class="col-sm-6">
                    <h3>Login</h3>
                    <form method="POST">
                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input type="text" class="form-control" name="usuario" placeholder="Digite seu nome de usuario" required="">
                    </div>
                    <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required="">
                    </div>
                    <button type="submit" name="logar" class="btn btn-primary">Entrar</button>
                </form>
                </div>
            </div>
        </div>


			
<?php include('rodape.php'); ?>