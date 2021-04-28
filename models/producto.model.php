<?php
    class Producto extends Conectar
    {
        public function getProduct(){
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM productos";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
        public function getProductId($prod_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM productos WHERE id_producto = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

         function deleteProduct($prod_id)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM productos WHERE id_producto = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        function updateProduct($prod_id, $nombre, $categoria, $imagen, $material, $talla, $stock, $precio)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "UPDATE productos SET nombre = ?, categoría = ?, imagen = ?, material = ?, talla = ?, stock = ?, precio = ? WHERE id_producto = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(8,$prod_id);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$categoria);
            $sql->bindValue(3,$imagen);
            $sql->bindValue(4,$material);
            $sql->bindValue(5,$talla);
            $sql->bindValue(6,$stock);
            $sql->bindValue(7,$precio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insertProduct($nombre, $categoria, $imagen, $material, $talla, $stock, $precio)
        {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "INSERT INTO (nombre, categoría, imagen, material, talla, stock, precio) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$nombre);
            $sql->bindValue(2,$categoria);
            $sql->bindValue(3,$imagen);
            $sql->bindValue(4,$material);
            $sql->bindValue(5,$talla);
            $sql->bindValue(6,$stock);
            $sql->bindValue(7,$precio);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>