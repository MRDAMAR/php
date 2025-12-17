<?php
class Database {
    public static function connect() {
        $host = "localhost:/D:/9320/курсач.fdb";
        $user = "SYSDBA";
        $password = "masterkey";
        return ibase_connect($host, $user, $password);
    }
}
