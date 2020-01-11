<?php
class Anuncios{

    public function getMeusAnuncios(){
        global $pdo;
        $array = array(); // array vazio porque se ele não entrar no if ele continua criado porem soque vazio
        $sql = $pdo->prepare("SELECT *,(select anuncios_imagens.url 
        from anuncios_imagens where anuncios_imagens.id_anuncio = anuncios.id limit 1) 
        as url FROM anuncios WHERE id_usuario=:id_usuario"); // pegar uma unica foto 
        $sql->bindValue(":id_usuario", $_SESSION['cLogin']);
        $sql->execute();

        if($sql->rowCount() > 0){
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getAnuncio($id){// função para buscar um anuncio
        $array = array();
        global $pdo;

        $sql = $pdo->prepare("SELECT * from anuncios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();


        if($sql->rowCount() >0){ // se ouve algum retorno
            $array = $sql->fetch();
        }
        return $array;
    }

    public function addAnuncio($titulo, $categoria, $valor, $descricao, $estado){
        global $pdo;
        $sql = $pdo->prepare("INSERT INTO anuncios SET titulo = :titulo,
         id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao,
          valor = :valor, estado=:estado");

          $sql->bindValue(":titulo", $titulo);// preencher os detalhes agora
          $sql->bindValue(":id_categoria", $categoria);// preencher os detalhes agora
          $sql->bindValue(":id_usuario", $_SESSION['cLogin']);// Dono do produto que esta adicionando ele
          $sql->bindValue(":descricao", $descricao);// preencher os detalhes agora
          $sql->bindValue(":valor", $valor);// preencher os detalhes agora
          $sql->bindValue(":estado", $estado);// preencher os detalhes agora
          $sql->execute();
         
    }
    public function editAnuncio($titulo, $categoria, $valor, $descricao, $estado,$id){
        global $pdo;
        $sql = $pdo->prepare("UPDATE anuncios SET titulo = :titulo,
         id_categoria = :id_categoria, id_usuario = :id_usuario, descricao = :descricao,
          valor = :valor, estado=:estado WHERE id=:id");

          $sql->bindValue(":titulo", $titulo);// preencher os detalhes agora
          $sql->bindValue(":id_categoria", $categoria);// preencher os detalhes agora
          $sql->bindValue(":id_usuario", $_SESSION['cLogin']);// Dono do produto que esta adicionando ele
          $sql->bindValue(":descricao", $descricao);// preencher os detalhes agora
          $sql->bindValue(":valor", $valor);// preencher os detalhes agora
          $sql->bindValue(":estado", $estado);// preencher os detalhes agora
          $sql->bindValue(":id", $id);// preencher os detalhes agora

          $sql->execute();
         
    }

    public function excluirAnuncio($id){ // tem que fazer 2 coisas(tem que excluir as imagens e o anuncio)
        global $pdo;
        $sql = $pdo->prepare("DELETE FROM anuncios_imagens WHERE id_anuncio = :id_anuncio"); // vai remover o registro de imagens
        $sql->bindValue(":id_anuncio", $id);
        $sql->execute(); 

        $sql = $pdo->prepare("DELETE FROM anuncios WHERE id = :id"); 
        $sql->bindValue(":id", $id);
        $sql->execute(); 

        



    }


}

