<?php

    try{
        //host
        $host = "localhost";

        //database name
        $dbname = "cleanblog";

        //user
        $user = "root";

        //password
        $pass = "";

        //Connection variable
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

        //PDO EXCEPTION
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    //Check if the connection is true or not
    if($conn == true)
    {

    }
    else{
        echo "connection error";
    }

?>