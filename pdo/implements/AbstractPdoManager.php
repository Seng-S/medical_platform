<?php
  abstract class AbstractPdoManager {
    const DRIVER = 'mysql';
    const HOST= 'localhost';
    const PORT='3306';
    const DATABASE_NAME = 'medical_db';
    const USER = 'root';
    const PASSWORD = '';
    protected static $instance = null;
    public static function instance() {
        if (self::$instance === null)
        {
            $opt  = array(
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => TRUE,
            );
            $dsn = 'mysql:host='.self::HOST.';port='.self::PORT.';dbname='.self::DATABASE_NAME;
            self::$instance = new PDO($dsn, self::USER, self::PASSWORD, $opt);
        }
        return self::$instance;
    }

  }
?>
