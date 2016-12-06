<?php

/**
 * Created by PhpStorm.
 * User: DALVEERSINGH
 * Date: 11/5/2016
 * Time: 11:50 AM
 */
class JSONConverter
{
 public function convertToJSON($query){
     $db = Database::getConnection();
     $statement = $db->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll(PDO::FETCH_ASSOC);

     return json_encode($result);
 }
    public function convertToJSONConditionalQuery($query,$assArray){
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        foreach ($assArray as $key=>$value){
            $statement->bindValue($key,$value);
        }
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($result);
    }
}