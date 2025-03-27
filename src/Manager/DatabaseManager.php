<?php
namespace App\Manager;
use PDO;
use PDOException;
class DatabaseManager
{
    private static ?PDO $pdo = null;
    private static function connectDB(): PDO
    {
        $host = 'localhost';
        $dbName = 'pokedex';
        $user = 'root';
        $password = '';
        try {
            return new PDO(
                "mysql:host=$host;dbname=$dbName;charset=utf8",
                $user,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            die("Erreur de connexion à la base de données : " . $e->getMessage());
        }
    }
    protected static function getConnexion(): PDO
    {
        if (self::$pdo === null) {
            self::$pdo = self::connectDB();
        }
        return self::$pdo;
    }
}
