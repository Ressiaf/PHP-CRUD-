<?php 
    //conecto a la db
    include("database/db.php");
    // si recibo por el metodo get , un id existente
    if (isset($_GET['id'])){
        // lo guardo en una variable y esa variable en otra
        //que es la query a realizar a la db
        $id= $_GET['id'];
        $query= "DELETE FROM task WHERE ID = $id";
        // uso esa query , mas los datos de mi db para hacer
        // un pedido de accion delete  , si estos datos fallan voy a cortar la sentencia
        $result= mysqli_query($conn , $query);
        if(!$result){ 
            die("Query Failed"); 
        }
        //en caso de que sean reales voy a redirigir a index.php
        // pero antes voy a guardar en seccion un mensaje para dar como alert 
        $_SESSION['message'] = "Task removed Successfully 🗑 ✨";
        $_SESSION['message_type'] = "danger";
        header("Location: index.php");
    }
?>