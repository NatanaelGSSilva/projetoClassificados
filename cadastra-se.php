<?php require 'pages/header.php'; ?>


<div class="container">
    <h1>Cadastra-se</h1>
    <?php 
    require 'classes/usuarios.class.php'; 
    $u  = new Usuarios();
    if(isset($_POST['nome']) && !empty($_POST['nome'])){ // se algum envio ocorreu

        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)){
            if($u->cadastrar($nome,$email,$senha,$telefone)){
                ?>
            <div class="alert alert-sucess">
                <strong>Parabéns</strong>Cadastrado com Sucesso. <a href="login.php" class="alert-link">Faça o login agora</a>
                
            </div>
            <?php
            }else{
                ?>
            <div class="alert alert-warning">
                Este Usuario ja Existe <a href="login.php" class="alert-link">Faça o login agora</a>
                
            </div>
            <?php
            }
        }else{
            ?>
            <div class="alert alert-Warning">
                Preencha todos os campos
                
            </div>
            <?php
        }

      
    }

    ?>

    <form method="POST" >
    <div class="form-group">
    <label for="nome">Seu Nome</label>
    <input type="text" class="form-control" placeholder="Digite seu nome" id="nome" name="nome">
  </div>
  <div class="form-group">
    <label for="email">Digite Seu E-mail</label>
    <input type="email" class="form-control" placeholder="Digite seu E-mail" id="email" name="email">
  </div>
  <div class="form-group">
    <label for="senha">Digite Sua Senha</label>
    <input type="password" class="form-control" placeholder="Digite sua senha" id="senha" name="senha">
  </div>
  <div class="form-group">
    <label for="email">Digite Seu Telefone</label>
    <input type="text" class="form-control" placeholder="Digite seu Telefone" id="tel" name="telefone">
  </div>
  
  <button type="submit" value="Cadastrar" class="btn btn-primary">Cadastrar</button>
    </form>
</div>

<?php  require 'pages/footer.php'; ?>