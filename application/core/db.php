<?php

class DB
{
    protected static $pdo;

    static function init() {
        $host = '127.0.0.1';
        $db   = 'mvc';
        $user = 'root';
        $pass = '';
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            self::$pdo = new PDO($dsn, $user, $pass, $opt);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }
    }

    public static function select($col, $table) {
        $stmt = self::$pdo->query('SELECT ? FROM ?');
        $stmt->execute($col, $table);
        return $stmt->fetch();
    }
}