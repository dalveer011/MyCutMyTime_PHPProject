<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:18 PM
 */
include_once 'Database.php';

class Salons_db
{
    //This method will add a salon.
    //It's going to check within if the email provided already exists or not.

    public function addSalon1($salon){

        $db = Database::getConnection();

        $name = $salon->getName();
        $email = $salon->getEmail();
        $phone = $salon->getPhone();
        $streetaddress = $salon->getStreetaddress();
        $city = $salon->getCity();
        $province = $salon->getProvince();
        $postalcode = $salon->getPostalcode();
        $salonownerid = $salon->getSalonownerid();

        if($this->salonEmailExists($email)){
            echo "Salon's email already exists!";
        }else{
            $query = 'INSERT INTO salon 
                      (name, email, phone, salonownerid, streetaddress, city, province, postalcode) 
                  VALUES 
                      (:name, :email, :phone, :salonwonerid, :streetaddress, :city, :province, :postalcode)';
            try{
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':phone', $phone);
                $statement->bindValue(':salonwonerid', $salonownerid);
                $statement->bindValue(':streetaddress', $streetaddress);
                $statement->bindValue(':city', $city);
                $statement->bindValue(':province', $province);
                $statement->bindValue(':postalcode', $postalcode);
                $statement->execute();
                $statement->closeCursor();
            }catch (PDOException $e){
                echo "There was a problem with the insert statement on salons table. Here is the error: ". $e->getMessage();
            }
        }
    }

    //To get corresponding salon Id by providing the email of the salon
    //It returns the salon's id
    public function getSalonId ($email){
        $db = Database::getConnection();

        $query = 'SELECT * FROM salon WHERE email = :email'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['id'];
    }

    //To get corresponding salon Id by providing the name of the salon
    //This method can be used to get the salonid while creating the reviews object and adding a review on the backend.
    //If same name exists then, we cannot use this method.
    public function getSalonIdByName ($name){
        $db = Database::getConnection();
        $query = 'SELECT * FROM salon WHERE name = :name'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['id'];
    }

    //Find out the salonowner id for a particular salon. Salon object will be passed to this method.
    public function getSalonOwnerIdForSalon ($salon){
        $db = Database::getConnection();
        $email = $salon->getEmail();

        $query = 'SELECT * FROM salon WHERE email = :email'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['salonownerid'];
    }

    //Check if the salon's Email Exists... We pass in an email address.
    //This is going to check on the backend if this email exists.
    public function salonEmailExists($email){
        $query = 'Select email from salon where email = :email';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $rows = $statement->rowCount();
        if ($rows > 0){
            return true;
        }else{
            return false;
        }
    }


    public function addSalon($salon){

        $db = Database::getConnection();

        $name = $salon->getName();
        $email = $salon->getEmail();
        $phone = $salon->getPhone();
        $streetaddress = $salon->getStreetaddress();
        $city = $salon->getCity();
        $province = $salon->getProvince();
        $postalcode = $salon->getPostalcode();
        $salonownerid = $salon->getSalonownerid();

        if($this->salonEmailExists($email)){
            echo "Salon's email already exists!";
        }else{
            $query = 'INSERT INTO salon 
                      (name, email, phone, salonownerid, streetaddress, city, province, postalcode) 
                  VALUES 
                      (:name, :email, :phone, :salonwonerid, :streetaddress, :city, :province, :postalcode)';
            try{
                $statement = $db->prepare($query);
                $statement->bindValue(':name', $name);
                $statement->bindValue(':email', $email);
                $statement->bindValue(':phone', $phone);
                $statement->bindValue(':salonwonerid', $salonownerid);
                $statement->bindValue(':streetaddress', $streetaddress);
                $statement->bindValue(':city', $city);
                $statement->bindValue(':province', $province);
                $statement->bindValue(':postalcode', $postalcode);
                $statement->execute();
                $statement->closeCursor();
            }catch (PDOException $e){
                echo "There was a problem with the insert statement on salons table. Here is the error: ". $e->getMessage();
            }
        }
    }

    public function listSalonBySalonOwnerId($salonOwnerId){

        $db = Database::getConnection();
        $query = "Select * from salon where salonownerid = $salonOwnerId";
        $statement  = $db->query($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function analysis()
    {

        $db = Database::getConnection();
        $query = "Select * from analysis ORDER by id";
        $statement = $db->query($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;

    }

    //It will get all salons when we pass in the salonwoner's id
    //Use this method to get all salons in the addPromotion form

    public function getSalons ($salonownerid){
        $query = 'Select name from salon where salonownerid = :salonownerid';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonownerid', $salonownerid);
        $statement->execute();
        $salons = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $salons;

    }

    //Gets all salon

    public function getAllSalons (){
        $query = 'Select * from salon';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->execute();
        $salons = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $salons;
    }

    //Gets the distinct salon name for customers whose order is completed
    //Used in write a review php file

    public function getAllSalonsWhereCustomerHasAppointments($cusid){
        $query = 'SELECT DISTINCT name FROM salon JOIN orders ON salon.id = orders.salonid 
                  WHERE customerid = :customerid 
                  AND orders.status = 1 ';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':customerid', $cusid);
        $statement->execute();
        $salons = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $salons;
    }

    //Get the name of the salon by passing in the salon id.

    public function getSalonName ($salonid){

        $query = 'Select * from salon where id = :salonid';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $salons = $statement->fetch(PDO::FETCH_ASSOC);

        return $salons['name'];
    }

    public function getSalonDetails($salonid){
        $query = 'Select * from salon where id = :salonid';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $salonDetails = $statement->fetch(PDO::FETCH_ASSOC);

        return $salonDetails;
    }
public function getSalonEmailById($salonid){

        $db = Database::getConnection();
        $query = "Select * from salon where salonid = :salonid";
        $statement  = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result['email'];
    }
}


