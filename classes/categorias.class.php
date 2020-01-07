<?php

class Categorias{

    public function getLista(){
        $array = array(); // se não entrar no if retorna um array vazio
        global $pdo;
        $sql =$pdo->query("SELECT * from categorias");
        if($sql->rowCount()>0){
            $array=$sql->fetchAll();

        }

        return $array;
    }
}
?>