<?php
    //conecta a la db
    include("database/db.php");
    //si recibo por metodo post una accion con el nombre save task 
    // guarda titulo y descripcion en sus respectivas variables ($)
    if(isset($_POST["save_task"])){
        $title = $_POST['title'];
        $description = $_POST['description'];
    // luego guarda en variable query la acciona realizar en la db
        $query ="INSERT INTO task(Title , Description) VALUES ('$title' , '$description')";    
    //por ultimo guarda el resultado en una variable , si este no existe corta el proceso
        $result = mysqli_query($conn , $query);
        if (!$result) { die("Query Failed"); }
     // en cambio si existe va a redirigirnos al index mediante la propiedad header 
     // pero antes vamos a guardar en seccion algunos datos para mostrar un alert (:
        $_SESSION['message'] = 'Task saved succefully 📂✨';
        $_SESSION['message_type'] = 'success';
        header("Location: index.php");
    }
?>