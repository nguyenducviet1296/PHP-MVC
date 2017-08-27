<?php
$dsn = "mysql:host=127.0.0.1; dbname=bookstore";
$username = 'root';
$passwd = '';
global $connect;
$connect = new PDO($dsn, $username, $passwd) or die("MySQL Connection Error");

function redirect($url)
{
    session_write_close();
    header("Location:" . $url);
    exit;
}


