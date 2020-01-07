<?php require 'pages/header.php'; ?>


<div class="container">
    <h1>Login</h1>
    <?php 
    require 'classes/usuarios.class.php'; 
    $u  = new Usuarios();
    if(isset($_POST['email']) && !empty($_POST['email'])){ // se algum envio ocorreu

       
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];

        if($u->login($email,$senha)){
            ?>
            <script type="text/javascript">window.location.href="./";</script> <!--Direcionamento para pagina inicial-->
            <?php
        }else{
          ?>

          <div class="alert alert-danger">
            Usuario ou senha errados
          </div>
          <?php
        }
       

    }

    ?>

    <form method="POST" >
    
  <div class="form-group">
    <label for="email">Digite Seu E-mail</label>
    <input type="email" class="form-control" placeholder="Digite seu E-mail" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="senha">Digite Sua Senha</label>
    <input type="password" class="form-control" placeholder="Digite sua senha" id="senha" name="senha">
  </div>

  
  <button type="submit" value="Fazer Login" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php  require 'pages/footer.php'; ?>