<?php
    //$dsn = 'mysql:host=press4wardgroupcom.ipagemysql.com;dbname=php2final';//
    $dsn = 'mysql:host=localhost;dbname=php2final';
    $username = 'mgs_user';
    $password = 'Exuma2018';

    //$username = 'root';
    //$password = 'Exuma2018';
   

    // mgs_user, mgs_admin and root all have same password of Exuma2018

// Create database connection for MAMP
    //$conn = mysqli_connect( $dsn, $username, $password, $db);
    //$link = mysqli_init();
    //$success = mysqli_real_connect($link, $dsn, $username, $password, $db, $port);


    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
