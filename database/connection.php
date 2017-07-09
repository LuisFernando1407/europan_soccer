<?php
/**
 * Created by PhpStorm.
 * User: luisfernando
 * Date: 09/07/17
 * Time: 10:14
 */

Class Connection{
    protected $host = "localhost";
    protected $user = "postgres";
    protected $pswd = "mpg4v5r66u";
    protected $dbname = "soccer";
    protected $con = null;

    function __construct(){}

    function open(){
        $this->con = @pg_connect(
            "host=$this->host dbname=$this->dbname user=$this->user password=$this->pswd
        ");
        return $this->con;
    }

    function close(){
        @pg_close($this->con);
    }

    function statusConnection(){
        if(!$this->con){
            echo "<h3>O sistema não está conectado à  [$this->dbname] em [$this->host].</h3>";
            exit;
        }else{
            echo "<h3>O sistema está conectado à  [$this->dbname] em [$this->host].</h3>";
        }
    }
}