<?php


define("DB_HOST", 'localhost:3307');
define("DB_USER", 'root');
define("DB_PASSWORD", '');
define("DB_DATABASE", "assignment_db");

if(!$con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE)){
    die("failed to connect!");
};


