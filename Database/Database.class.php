<?php
/**
 * 
 * Ensure php_sqlite3.dll is in the ext directory of PHP
 * AND OR
 * Ensure you have SQLite Driver enabled in PHP Configuration settings
 * 
 * Define a database directory structure for an SQLite Database
 * 
 * @param $_SERVER['APPDATA'] -- Users directory of SQLite Database
 */


class Database extends SQLite3{
    function __construct(){
        if(!file_exists($_SERVER['APPDATA'].'\churchms\data\ofbc_main.db')){
            mkdir($_SERVER['APPDATA'].'churchms/data/');

            die("Database is Unavailable");
            // echo "
            //     <script>
            //         alert('Database is either locked missing or corrupted');
            //         window.location.href = 'locked_corrupted.php';
            //     </script>
            // ";
        }
        else{

            $db = $_SERVER['APPDATA'].'\churchms\data\ofbc_main.db';
            $this->open($db);
        }
    }
}
