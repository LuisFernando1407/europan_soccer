<?php
    include ('../database/connection.php');

    Class Query extends Connection {

        function __construct(){
            parent::open();
        }

        function statusConnection(){
            parent::statusConnection();
        }

        /* Query generic */
        function execute($query){
            $result = pg_query($this->con, $query);
            if (!$result){
                echo "Query não pode ser processada :( ";
            }

            if(pg_num_rows($result) > 0){
                while ($row = pg_fetch_array($result)){
                    echo "<pre>" . var_export($row, true) . "</pre>";
                }
            }else{
                echo "0 registros encontrados.";
            }

            $this->close();

        }

    }

?>