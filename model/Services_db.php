<?php
class Services_db
{
    //This is a method which returns all the service descriptions within the services table corresponding to a particular salonid
    //Use this method to get all the servicedescriptions and then checking if the description exists in the serviceExists method

    public function getServiceDesctiptions ($salonid){

        $query = 'Select servicedescription from service where salonid = :salonid';

        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $result = $statement->fetchAll();
        $statement->closeCursor();

        return $result;
    }

    public function getServiceDetails($serviceid){

        $query = 'Select * from service where id = :serviceid';

        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':serviceid', $serviceid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result;
    }

    //Check if the same service exists or not
    //Returns true if the service exists.
    public function serviceExists($serviceDesc, $salonid){

        $query = 'Select servicedescription from service where salonid = :salonid AND servicedescription = :serviceDesc';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->bindValue(':serviceDesc', $serviceDesc);
        $statement->execute();
        $rowCount = $statement->rowCount();
        if ($rowCount > 0){
            return true;
        }else{
            return false;
        }
    }

    //Pass in a service description, to get the Service id
    //We might need service id while adding other data to other tables such as promotion

    public function getServiceId($serviceDesc, $salonid){
        $db = Database::getConnection();
        $query = 'SELECT * FROM service WHERE servicedescription = :servicedescription AND salonid = :salonid'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':servicedescription' , $serviceDesc);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['id'];
    }

    //Adds a service
    //It also checks if that particular service exists already for that particular salon
    //We are passing in a services object which will have the salon id.

    public function addService($service){

        $db = Database::getConnection();

        $servicedescription = $service->getServicedescription();
        $price = $service->getPrice();
        $salonid = $service->getSalonid();

        if($this->serviceExists($servicedescription, $salonid)){
            echo "This service already exists!";
        }else{
            $query = 'INSERT INTO service 
                      (servicedescription, price,salonid) 
                  VALUES 
                      (:servicedescription, :price, :salonid)';
            try{
                $statement = $db->prepare($query);
                $statement->bindValue(':servicedescription', $servicedescription);
                $statement->bindValue(':price', $price);
                $statement->bindValue(':salonid', $salonid);
                $statement->execute();
                $statement->closeCursor();
            }catch (PDOException $e){
                echo "There was a problem with the insert statement on services table. Here is the error: ". $e->getMessage();
            }
        }
    }

    //Returns all services for a particular salon id with details

    public function getAllServicesWithDetails ($salonid){
        $query = 'Select * from service where salonid = :salonid';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function deleteService($salonid, $serviceid){
        $query = 'Delete from service where salonid = :salonid AND id = :serviceid';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->bindValue(':serviceid', $serviceid);
        $statement->execute();
    }

    public function updateService($salonid, $serviceid, $servDesc, $price){
        $query = 'UPDATE service 
                SET servicedescription = :serviceDesc, 
                    price = :price
                WHERE
                    id = :serviceid    
                AND 
                    salonid = :salonid
                ';
        $db = Database::getConnection();
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->bindValue(':serviceid', $serviceid);
        $statement->bindValue(':serviceDesc', $servDesc);
        $statement->bindValue(':price', $price);
        $statement->execute();
        $statement->closeCursor();
    }
}