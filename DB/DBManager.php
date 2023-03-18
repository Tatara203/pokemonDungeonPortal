<?php
    function getDb(): PDO{
        $dsn = 'mysql:dbname=pokedun; host=127.0.0.1; charset=utf8';
        $usr = 'pokeadmin';
        $passwd = '02Gir@farig27';

        $db = new PDO($dsn, $usr, $passwd);
        return $db;
    }