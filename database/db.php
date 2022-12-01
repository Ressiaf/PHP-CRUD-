<?php 

    session_start();

    $conn = mysqli_connect(
        '127.0.0.1:3307',
        'root',
        '' ,
        'php_crud'
    );

    #connection test 
    if (isset($conn)){
        echo 'DB is connected';
    }
?>