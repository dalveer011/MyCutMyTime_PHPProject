<?php

/**
 * Created by PhpStorm.
 * User: DALVEERSINGH
 * Date: 11/6/2016
 * Time: 10:45 AM
 */
class Orders_db
{
    public function bookAppointment($myAppointment){
        $serviceid = $myAppointment->getServiceid();
        $orderdate = $myAppointment->getOrderdate();
        $salonid = $myAppointment->getSalonid();
        $customerid = $myAppointment->getCustomerid();
        $starttime = $myAppointment->getAppointmentstarttime();
        $endtime = $myAppointment->getAppointmentendtime();

        $db = Database::getConnection();
        $statement = $db->prepare("insert into orders(serviceid,customerid,salonid,appointmentstarttime,
                                    appointmentendtime,orderdate,status) 
                                    values(:serviceid,:customerid,:salonid,:appointmentstarttime,
                                    :appointmentendtime,:orderdate,:status)");
        $statement->bindValue(':serviceid',$serviceid);
        $statement->bindValue(':customerid',$customerid);
        $statement->bindValue(':salonid',$salonid);
        $statement->bindValue(':appointmentstarttime',$starttime);
        $statement->bindValue(':appointmentendtime',$endtime);
        $statement->bindValue(':orderdate',$orderdate);
        $statement->bindValue(':status',0);
        $statement->execute();
        $statement->closeCursor();
    }
    public function getAvailableTime($salonId,$date){
    $db = Database::getConnection();
    $query = "select appointmentendtime,appointmentstarttime from orders where salonid=:salonid and orderdate=:date";
    $statement = $db->prepare($query);
    $statement->bindValue(':salonid',$salonId);
    $statement->bindValue(':date',$date);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
 public function getSalonIdForCompleteOrders($cusid){

        $db = Database::getConnection();
        $query = 'Select salonid from order where status = 1 AND customerid = :customerId';
        $statement = $db->prepare($query);
        $statement->bindValue(':customerId',$cusid);
        $statement->execute();
        $salonIds = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $salonIds;
    }
    public function getAppointmentDetails($custid){
        $db = Database::getConnection();
        $query = "SELECT sal.name,sal.streetaddress,sal.city,sal.province,sal.postalcode,
		o.orderdate,o.appointmentstarttime,o.appointmentendtime,o.customerid,o.id,
		ser.servicedescription
	FROM salon sal
	JOIN orders o
    on sal.id = o.salonid 
	JOIN service ser
    on ser.id = ser.salonid
	WHERE customerid=:custid and status=0";

        $statement = $db->prepare($query);
        $statement->bindValue(':custid',$custid);
        $statement->execute();
        if($statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }else {
            return "No Appointments for Now";
        }
    }


    public function getAppointmentDetailsforOwner($salonid){
        $db = Database::getConnection();
        $query = "SELECT c.firstname,c.lastname,o.orderdate,o.appointmentstarttime,o.appointmentendtime,o.customerid,o.id
	FROM customer c
	JOIN orders o
    on c.id = o.customerid
	WHERE salonid=:salonid and status=0";
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid',$salonid);
        $statement->execute();
        if($statement->rowCount() == 0){
            return "No Appointments for Now";
        }else {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    public function  cancelAppointment($id){
        $db = Database::getConnection();
        $query = "delete from orders where id=:id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
        $statement->execute();
        $statement->closeCursor();
    }
    public function  appointmentDone($id){
        $db = Database::getConnection();
        $query = "update orders set status = :status where id=:id";
        $statement = $db->prepare($query);
        $statement->bindValue(':id',$id);
        $statement->bindValue(':status',1);
        $statement->execute();
        $statement->closeCursor();
    }

}