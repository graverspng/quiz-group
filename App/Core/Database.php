<?php
class Database {
    public $dbconn;
    private $config;

    function __construct() // Connect to the database
    {
        $this->config = require "../app/config.php"; // Load database config

        // Build DSN string for MySQL connection
        $dsn = "mysql:host=" . $this->config['host'] . ";dbname=" . $this->config['dbname'];

        // Establish PDO connection
        try {
            $this->dbconn = new PDO($dsn, $this->config['user'], $this->config['password']);
            $this->dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbconn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle connection errors
            die("Database connection failed: " . $e->getMessage());
        }
    }

    // Method to prepare a query
    public function prepare($query) {
        return $this->dbconn->prepare($query);
    }

    // Method to execute a query with parameters
    public function execute($query, $params = []) {
        $stmt = $this->prepare($query);
        $stmt->execute($params);
        return $stmt; // Return the statement for further use (e.g., fetch results)
    }

    function __destruct() // Close the database connection when the object is destroyed
    {
        $this->dbconn = null;
    }
}
?>
