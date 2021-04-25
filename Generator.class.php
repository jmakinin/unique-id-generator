<?php

require './Database/Database.class.php';

class Generate{
    public $conn;
    /**
     * 
     * @param $table_name String - the table to use
     * 
     * @param $prefix_ String - the prefix settings of the IDs to generate
     * 
     * @param $column_name String - the name of the column to fetch the data from
     * 
     * @param $pad_value Integer - specifies the number of values of ID after prefix
     */

    function __construct(){
        $this->conn = new Database();

        
    }

    function generate ( $table_name, $prefix_, $column_name, $pad_value = 5 ){


        $sql = "SELECT COUNT('$column_name') as mk FROM $table_name";
        
        $execute_query  =  $this->conn->query($sql);

        $result = $execute_query->fetcharray(SQLITE3_ASSOC);

        $last_value = $result['mk'];


        /*
            typecast |$last_value|, add 1 and prepend with $prefix_
        */
            if (is_null($last_value)) {
                $new_id = 1;
            }
            else{
                $new_id = (int)$last_value + 1;
            }

        $new_id = $prefix_.(str_pad(($new_id), $pad_value, "0", STR_PAD_LEFT));

    return $new_id;	
    }
}


$instantiate = new Generate();


echo $instantiate->generate('members_data', 'OFBCM', 'member_id', 5);