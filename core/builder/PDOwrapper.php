<?php

class Database
{
    static private $dbh;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    public static function get_dbh()
    {
        return self::$dbh;
    }

    public static function connect($host, $dbname, $username, $password)
    {
        try {
            self::$dbh = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public static function sql($query, $args, $debug_mode = false)
    {
        $sth = self::$dbh->prepare($query);
        $sth->execute($args);
        if ($debug_mode) {
          echo $sth->debugDumpParams();
        }
        return $sth->fetchAll();
    }
}

function sql($query, ...$args)
{
    if (!empty($args) and is_array($args[0]) and count($args) == 1)
        return Database::sql($query, $args[0]);
    return Database::sql($query, $args);
}

function dsql($query, ...$args)
{
    $DEBUG_MODE = true;
    if (!empty($args) and is_array($args[0]) and count($args) == 1)
        return Database::sql($query, $args[0], $DEBUG_MODE);
    return Database::sql($query, $args, $DEBUG_MODE);
}
