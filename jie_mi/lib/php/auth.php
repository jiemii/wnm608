<?php

function MYSQLIAuth()
{
    return [
        "localhost",  // mysql host
        "jie_mi", // mysql user name
        "Langzi395693!", // mysql user password
        "jie_mi" // mysql database name
    ];
}


function PDOAuth()
{
    return [
        "mysql:host=localhost; dbname=jie_mi", // host and database name 
        "jie_mi", // mysql user name
        "Langzi395693!", // mysql user password
        [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]
    ];
}
