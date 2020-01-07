<?php require 'pages/header.php'; ?> <!--Sessao esta no header-->
<?php
if(empty($_SESSION['cLogin'])){ // se a sessao estiver vazia
    ?>
    <script type = "text/javascript">window.location.href="login.php";</script> <!--Se eu nãoestiver logado automaticamente ele vai para pagina de login-->
    <?php
    exit;
}
?>

<div class="container">
<h1>Meus Anuncios</h1>

<a href="add-anuncio.php" class="btn btn-default">Adicionar Anúncio</a>

<table class="table table-striped">
  <thead>
      <tr>
        <th>Foto</th>
        <th>Titulo</th>
        <th>Valor</th>
        <th>Acões</th>
      </tr>
  </thead>

  <?php
    require 'classes/anuncios.class.php';
    $a = new Anuncios(); // instanciando a classe 
    $anuncios = $a->getMeusAnuncios();
    foreach($anuncios as $anuncio):
        ?>
            <!-- Parte do HTML -->
            <td><img src="assets/images/anuncios/<?php echo $anuncio['url']; ?>" alt="imagemAnuncio" border="0"></td>
            <td><?php echo $anuncio['titulo']; ?></td>
            <td> R$ <?php echo number_format($anuncio['valor'],2); ?></td>
            <td></td>
    <?php endforeach; ?>
  
</table>
</div>



<?php require 'pages/footer.php'; ?>



