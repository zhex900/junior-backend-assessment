<?php

Class DB
{
    protected $host;
    protected $user;
    protected $password;
    protected $db;
    protected $db_type;
    protected $connection;

    function __construct($db_type, $host, $user, $password, $db)
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
        $this->db_type = $db_type;

    }

    public function open()
    {
        $this->connection = new PDO("$this->db_type:host=$this->host;dbname=$this->db", $this->user, $this->password);
// set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function fetchTable($table)
    {
        $sql = "SELECT * FROM $table";
        return $this->execute($sql)->fetchAll();
    }

    public function close()
    {
        $this->connection = null;
    }

    public function execute($sql, $parameters=[])
    {
        try {
            $query = $this->connection->prepare($sql);
            $query->execute($parameters);
//            echo "query run successfully" . PHP_EOL;
            return $query;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    public function updateProductImageUrl($product_id, $path)
    {
        $sql = "UPDATE migrated_data "
            . "SET image_url = ? "
            . "WHERE product_id = ? ";

        return $this->execute($sql,[$path,$product_id]);
    }
}