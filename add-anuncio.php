<?php require 'pages/header.php'; ?> <!--Sessao esta no header-->
<?php
if(empty($_SESSION['cLogin'])){ // se a sessao estiver vazia
    ?>
    <script type = "text/javascript">window.location.href="login.php";</script> <!--Se eu nãoestiver logado automaticamente ele vai para pagina de login-->
    <?php
    exit;
}

require 'classes/anuncios.class.php'; 

$a = new Anuncios();
if(isset($_POST['titulo']) && !empty($_POST['titulo'])){
    $titulo = addslashes($_POST['titulo']);
    $categoria = addslashes($_POST['categoria']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

    // tudo que tenho que fazer agora é adicionar essa galeria aqui agora e pronto

    $a->addAnuncio($titulo, $categoria, $valor, $descricao, $estado);
    ?>
    <div class="alert alert-success">
    Produto Adicionado com Sucesso!
    </div>
    <?php
}

?>




<div class="container">
    <h1>Meus Anúncios - Adicionar Anúncios</h1>

    <form  method="POST" enctype = "multipart/form-data" > <!--Formulario aceita data-->
    
    
        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" class="form-control">
               <?php 
               require 'classes/categorias.class.php';
               $c = new Categorias();
               $cats = $c->getLista();
               foreach($cats as $cat):
                
               ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo utf8_encode($cat['nome']); ?></option>
               <?php
               endforeach; ?>
    
            </select>
    
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control">
    
            </select>
    
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="text" name="valor" id="valor" class="form-control">
    
            </select>
    
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" class="form-control"></textarea>
           
    
            </select>
    
        </div>

         <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado" class="form-control">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
    
            </select>
    
            </select>
    
        </div>

        <input type="submit" value="Adicionar" class="btn btn-default">
    </form>


</div>

<?php require 'pages/footer.php'; ?>