<?php 

class dbconn {

    protected function connect(){
        try {

            $dsn = "mysql:host=localhost;dbname=job_tracker";
            $dbUser = "husto";
            $dbPassword = "0730";

            $conn = new PDO($dsn, $dbUser, $dbPassword);
            return $conn; // Return the connection
        
        }catch(PDOException $e){
        
            echo "Connection Failed" . $e->getMessage();
            die(); // Kill Connection if error
        
        }
    }
}


?>