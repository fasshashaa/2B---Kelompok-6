<?php
// config/database.php
class Database {
    private $host = '160.19.166.42';
    private $db_name = '2B_klp6';
    private $username = '2B_klp6';
    private $password = 'wWsOIVYp7Nmvj96_';
    private $conn;

    public function connect() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
$db = (new Database())->connect();
if ($db) {
    echo "Database connected!";
} else {
    echo "Failed to connect to database.";
}
