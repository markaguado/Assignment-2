<?php


define("DB_HOST", 'localhost');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_DATABASE", "assignment_db");

if(!$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)){
    die("failed to connect!");
};


