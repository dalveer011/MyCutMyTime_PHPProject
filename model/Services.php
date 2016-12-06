<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:28 PM
 */
class Services
{
    private $serviceid, $servicedescription, $price, $salonid;

    public function __construct($servicedescription, $price, $salonid)
    {
        $this->servicedescription = $servicedescription;
        $this->price = $price;
        $this->salonid = $salonid;
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
    public function getServicedescription()
    {
        return $this->servicedescription;
    }

    /**
     * @param mixed $servicedescription
     */
    public function setServicedescription($servicedescription)
    {
        $this->servicedescription = $servicedescription;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
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