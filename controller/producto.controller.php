<?php
    require_once "../config/conn.php";
    require_once "../models/producto.model.php";

    $producto = new Producto();

    switch ($_GET["op"]) {
        case 'listar':
            $datos = $producto->getProduct();
            $data = Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["id_producto"];
                $sub_array[] = $row["nombre"];
                $sub_array[] = $row["categoria"];
                $sub_array[] = $row["imagen"];
                $sub_array[] = $row["material"];
                $sub_array[] = $row["talla"];
                $sub_array[] = $row["stock"];
                $sub_array[] = $row["precio"];
                $sub_array[] = '<button type=button onClick="editar('.$row["id_producto"].');" id="'.$row["id_producto"].'"class=btn btn-warning">Editar</button>';
                $sub_array[] = '<button type=button onClick="eliminar('.$row["id_producto"].');" id="'.$row["id_producto"].'"class=btn btn-warning">Editar</button>';
                $data[] = $sub_array;
            }

            $result = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );
            echo json_encode($result);
            break;
    }
?>