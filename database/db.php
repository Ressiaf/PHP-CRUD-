<?php 

    session_start();

    $conn = mysqli_connect(
        '127.0.0.1:3307',
        'root',
        '' ,
        'php_crud'
    );

    #Connection test 
    // if (isset($conn)){
    //     echo 'DB is connected';
    // }
?>