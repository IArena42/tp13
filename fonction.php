<?php
    // Fonction de connexion 
    function dbconnect()
{
    static $connect = null ;
    if($connect === null)
    {
        $connect = mysqli_connect('localhost','root','','employees');

        if(!$connect )
        {
            die('erreur : '.mysqli_connect_error());

        }
        mysqli_set_charset($connect ,'utf8mb4');
    }
    return $connect ;
}

function getAllLine($sql) {
    $result = mysqli_query(dbconnect(), $sql);
    $return = array();
    while($row = mysqli_fetch_assoc($result)) {
        $return[] = $row;
    }
    mysqli_free_result($result);
    return $return;
} 

function getOneLine($sql) {
    $result = mysqli_query(dbconnect(), $sql);
    return mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $return;
}

?>