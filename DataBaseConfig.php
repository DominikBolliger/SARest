<?php

class DataBaseConfig {

    protected $servername, $username, $password, $conn;

    function __construct(String $servername, String $username, String $password) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
    }

    public function createConnection() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname = sa", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }

    }

    public function closeConnection() {
        $this->conn = null;
    }

    public function selectAllBoxes()
    {
        $boxList = array();
        $statement = $this->conn->prepare("SELECT * FROM sa.box");
        if($statement->execute())
        {
            while($row = $statement->fetch()) {
                $box = Array(   'box_id' => $row['box_id'],
                    'box_pos_x' => $row['box_pos_x'],
                    'box_pos_y' => $row['box_pos_y'],
                    'box_pos_z' => $row['box_pos_z'],
                    'fk_box_type_id' => $row['fk_box_type_id']);
                array_push($boxList, $box);
            }
            return $boxList;
        }
    }
}