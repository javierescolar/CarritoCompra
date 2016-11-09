<?php

Class Estadisticas {
    
     static function get5BestSellers() {
        $bd = BD::getConexion();
        $select = "SELECT productos.image,productos.name,productos.price,count(*) as timesSold 
                    FROM carroproductos 
                    inner join carros on carros.id = carroproductos.idCart
                    inner join productos on carroproductos.idProduct = productos.id
                    where carros.datebuy >= date_sub(curdate(), interval 30 day)
                    group by productos.name order by timesSold desc  LIMIT 5";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $productos = $sentencia->fetchAll();
        return $productos;
    }
    
    static function get10BestCustomers() {
        $bd = BD::getConexion();
        $select = "select usuarios.name,usuarios.username,count(*) as compras 
                    from carros 
                    inner join usuarios on usuarios.id = carros.idUser
                    where carros.datebuy >= date_sub(curdate(), interval 30 day) 
                    GROUP by usuarios.name 
                    order by compras desc LIMIT 10";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
    
    static function get10LastBuys() {
        $bd = BD::getConexion();
        $select = "select carros.id as idCarrito,
                    productos.name,
                    productos.price
                    from carros 
                    inner join usuarios on usuarios.id = carros.idUser
                    inner join carroproductos on carroproductos.idCart = carros.id
                    inner join productos on carroproductos.idProduct = productos.id
                    where carros.datebuy >= date_sub(curdate(), interval 30 day) 
                    AND finalized = 1 
                    order by carros.id desc LIMIT 10";
        $sentencia = $bd->prepare($select);
        $sentencia->execute();
        $compras = $sentencia->fetchAll();
        return $compras;
    }
    
}
