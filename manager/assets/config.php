<?php
    $dev =true;
    if(!$dev){
        if(!isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'on'){
            $link = "https://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
            echo"<script>window.location.assign('$link')</script>";
        }
        $host = 'localhost'; $dbname = 'premazce_mad'; $user = 'premazce_root'; $pass = '070premium#';
    }
    else{
        // $host = 'localhost'; $dbname = 'projects_coinprofit'; $user = 'root'; $pass = '';
        $host = 'localhost'; $dbname = 'chegspharm'; $user = 'root'; $pass = '';
    }
    
    # connect to the database
    try {
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        $DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); # set error attribute
    }
    catch(PDOException $e) {
        echo $e->getMessage(); # log errors to a file
    }

    $con = mysqli_connect($host,$user,$pass,$dbname);
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    $connect = mysqli_connect($host,$user,$pass,$dbname);
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>
