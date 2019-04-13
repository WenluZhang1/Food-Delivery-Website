<?php
class MySQLDatabase {

    private $link = null;
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpassword = 'zhangwenlu';
    private $db = 'food_delivery';

    function connect() {
        $this->link = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpassword);
        if(!$this->link) {
            die('Not connected : ' . mysqli_connect_error());
        }
        $database = mysqli_select_db($this->link, $this->db);
        if(!$database){
            die ('Cannot use : ' . $this->db);
        }
    }

    function query($query) {
        $result = mysqli_query($this->link, $query);
        if($result) {
            return $result;
        }
        else {
            die(mysqli_error($this->link));
        }
        return null;
    }

    function disconnect() {
        mysqli_close($this->link);
    }
}
?>