<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:32 PM
 */
require_once 'Database.php';
require_once 'Address.php';

class Address_db
{
//This method will update the address for a customer when the customer wants to edit his/her profile
    //We also need to pass the customer id for that particular customer

    public function updateAddress ($addressObject, $cusid){

        $db = Database::getConnection();

        $streetaddress = $addressObject->getStreetadress();
        $city = $addressObject->getCity();
        $province = $addressObject->getProvince();
        $postalcode = $addressObject->getPostalcode();
        $phone = $addressObject->getPhone();

        $query = 'UPDATE customer
                    SET streetaddress = :streetaddress,
                        city = :city,
                        province = :province, 
                        postalcode = :postalcode,
                        phone = :phone
                    WHERE id = :cusid';

        $statement = $db->prepare($query);
        $statement->bindValue(':streetaddress', $streetaddress);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':province', $province);
        $statement->bindValue(':postalcode', $postalcode);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':cusid', $cusid);
        $statement->execute();
        $statement->closeCursor();
    }
}