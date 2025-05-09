<?php
class mysqlii {
    public $connect_error;
    public $db_host;
    public $db_user;
    public $db_pass;
    public $db_name;
    

    public function __construct($db_host, $db_user, $db_pass, $db_name) {
        $this->db_host = $db_host;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    public function connect_error() {
        echo "Error connecting to db";
    }
}

$db_server = 'localhost';
$db_name = 'vms';
$db_user = 'root';
$db_pass = '';

$conn = new mysqlii($db_server, $db_user, $db_pass, $db_name);

echo $conn->connect_error();