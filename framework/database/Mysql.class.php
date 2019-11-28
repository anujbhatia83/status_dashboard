<?php

/*
**================================================================
**framework/database/Mysql.class.php
**Database operation class
**================================================================
*/

class Mysql{

    protected $conn = false;  //DB connection resources
    protected $sql;           //sql statement

    /**
     * Constructor, to connect to database, select database and set charset
     * @param $config string configuration array
    */

    public function __construct($config = array()){
        $host = $config['host'];
        $user = $config['user'];
        $password = $config['password'];
        $dbname = $config['dbname'];
        $port = $config['port'];
        $charset = $config['charset'];
        //echo $user;
        //$this->conn = mysql_connect("$host:$port",$user,$password) or die('Database connection error');
       //$this->conn =  mysqli_connect($host, $user, $password, $dbname, $port) or die("Failed to connect to MySQL: ");

        $this->conn=mysqli_connect("localhost", "employee_status", "employee_status", "employee_status", "3306") or die("Failed to connect to MySQL: ");

       mysqli_select_db($this->conn, "employee_status") or die('Database selection error');
       //$this->setChar($charset);

    }

    /**
     * Set charset
     * @access private
     * @param $charset string charset
     */

    private function setChar($charest){
        $sql = 'set names '.$charest;
        $this->query($sql);
    }

    /**
     * Execute SQL statement
     * @access public
     * @param $sql string SQL query statement
     * @return $result，if succeed, return resrouces; if fail return error message and exit
     */

    public function query($sql){        
        $this->sql = $sql;

        // Write SQL statement into log
        $str = $sql . "  [". date("Y-m-d H:i:s") ."]" . PHP_EOL;
        file_put_contents("log.txt", $str,FILE_APPEND);
        //$result = mysql_query($this->sql,$this->conn);
        $result=mysqli_query($this->conn, $this->sql);

        if (! $result) {
            die($this->errno().':'.$this->error().'<br />Error SQL statement is '.$this->sql.'<br />');
        }

        return $result;
    }

    /**
     * Get the first column of the first record
     * @access public
     * @param $sql string SQL query statement
     * @return return the value of this column
     */

    public function getOne($sql){
        $result = $this->query($sql);
        
        $row = mysqli_fetch_row($result);

        if ($row) {
            return $row[0];
        } else {
            return false;
        }

    }

    /**
     * Get one record
     * @access public
     * @param $sql SQL query statement
     * @return array associative array
     */

    public function getRow($sql){
        if ($result = $this->query($sql)) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    /**
     * Get all records
     * @access public
     * @param $sql SQL query statement
     * @return $list an 2D array containing all result records
     */

    public function getAll($sql){
        $result = $this->query($sql);
        $list = array();

        while ($row = mysqli_fetch_assoc($result)){
            $list[] = $row;
        }

        return $list;

    }

    /**
     * Get the value of a column
     * @access public
     * @param $sql string SQL query statement
     * @return $list array an array of the value of this column
     */

    public function getCol($sql){
        $result = $this->query($sql);
        $list = array();

        while ($row = mysqli_fetch_row($result)) {
            $list[] = $row[0];
        }

        return $list;
    }
 
    /**
     * Get last insert id
     */

    public function getInsertId(){
        return mysqli_insert_id($this->conn);
    }

    /**
     * Get error number
     * @access private
     * @return error number
     */

    public function errno(){
        return mysqli_errno($this->conn);
    }

    /**
     * Get error message
     * @access private
     * @return error message
     */

    public function error(){
        return mysqli_error($this->conn);
    }

}