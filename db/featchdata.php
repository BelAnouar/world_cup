<?php

require_once("./db/conn.php");



function getData()
{
    global $connection;
    $query = "select * from groupe ";

    $result = mysqli_query($connection, $query);
    return $result;
}
