<?php
    require("classConnectionMySQL.php");

    //nueva instancia 
    $NewConn = new ConnectionMySQL();

    //nueva conexion
    $NewConn->CreateConnection();

    // datos
    $email=$_POST['email'];
    $oracion=$_POST['oracion'];
    $categoria=$_POST['categoria'];
    $autornombre=$_POST['autornombre'];
    $autorfecha=$_POST['autorfecha'];
    $autorinfo=$_POST['autorinfo'];

    //consultar
    $query="SELECT * FROM users WHERE first_name LIKE '$first_name'";
    $result=$NewConn->ExecuteQuery($query);
    if($result){
        while($row=$NewConn->GetRows($result)){
            echo "El usuario es: " .$row[1]." ".$row[2]." ".$row[3];
        }
        $NewConn->SetFreeResult($result);
    }else{
        echo "<h3> Error en la consulta </h3>";
    }

    //cerrar conexion
    $NewConn->CloseConnection();
?>