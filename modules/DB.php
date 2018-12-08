<?php

class DB
{

    private static $connect;

    public static function get_connect()
    {
        if (!isset(static::$connect)) {
            static::$connect = new PDO(DB_HOST_AND_NAME, DB_USER, DB_PASS);
        }
        return static::$connect;
    }
}