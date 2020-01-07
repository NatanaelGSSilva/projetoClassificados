<!DOCTYPE html>
<?php require 'config.php'; ?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script type="text/javascript" src="assets/js/fontawesome.js"></script> -->
    <script type="text/javascript" src="assets/js/script.js"></script>



    <title>Classificados</title>
</head>

<body>

    <nav class= "navbar navbar-inverse bg-dark">
     <div class= "container-fluid"> <!--Pegar de ponta a ponta da tela-->
         <div class= "navbar-header"><!--Pegar de ponta a ponta da tela-->
            <a href="./" class="navbar-brand">Classificados</a>
         </div>
     
     <?php  if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>   <!-- Se a sessao existir e nao estiver vazia vai mostrar -->
         
           <li class="mx-2"><a href="meus-anuncios.php">Meus Anuncios</a></li>
           <li class="mx-2"><a href="sair.php">Sair</a></li>
      <?php else: ?>

       <ul class= "nav navbar-item navbar-right"> <!-- colocar no outro canto -->
           <li class="mx-2"><a href="cadastra-se.php">Cadastra-se</a></li>
           <li class="mx-2"><a href="login.php">Login</a></li>

    <?php endif; ?>

       </ul>
     </div>
    </nav>  