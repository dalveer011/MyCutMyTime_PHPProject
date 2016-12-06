<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:24 PM
 */
class Orders
{
    private $orderid, $serviceid, $customerid, $appointmentstarttime, $appointmentendtime, $salonid, $orderdate;

    public function __construct()
    {
    }
    public function setOrderdate($orderdate){
        $this->orderdate = $orderdate;
    }
    public function getOrderdate(){
        return $this->orderdate;
    }
    /**
     * @return mixed
     */
    public function getOrderid()
    {
        return $this->orderid;
    }

    /**
     * @param mixed $orderid
     */
    public function setOrderid($orderid)
    {
        $this->orderid = $orderid;
    }

    /**
     * @return mixed
     */
    public function getServiceid()
    {
        return $this->serviceid;
    }

    /**
     * @param mixed $serviceid
     */
    public function setServiceid($serviceid)
    {
        $this->serviceid = $serviceid;
    }

    /**
     * @return mixed
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * @param mixed $customerid
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;
    }

    /**
     * @return mixed
     */
    public function getAppointmentstarttime()
    {
        return $this->appointmentstarttime;
    }

    /**
     * @param mixed $appointmentstarttime
     */
    public function setAppointmentstarttime($appointmentstarttime)
    {
        $this->appointmentstarttime = $appointmentstarttime;
    }

    /**
     * @return mixed
     */
    public function getAppointmentendtime()
    {
        return $this->appointmentendtime;
    }

    /**
     * @param mixed $appointmentendtime
     */
    public function setAppointmentendtime($appointmentendtime)
    {
        $this->appointmentendtime = $appointmentendtime;
    }

    /**
     * @return mixed
     */
    public function getSalonid()
    {
        return $this->salonid;
    }

    /**
     * @param mixed $salonid
     */
    public function setSalonid($salonid)
    {
        $this->salonid = $salonid;
    }
}