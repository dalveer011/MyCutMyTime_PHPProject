<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:11 PM
 */
class Salons
{
    private $salonid, $name, $email, $phone, $streetaddress, $city, $province, $postalcode, $salonownerid;

    public function __construct($name, $email, $phone, $salonownerid, $streetaddress, $city, $province, $postalcode)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->streetaddress = $streetaddress;
        $this->city = $city;
        $this->province = $province;
        $this->postalcode = $postalcode;
        $this->salonownerid = $salonownerid;
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

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getStreetaddress()
    {
        return $this->streetaddress;
    }

    /**
     * @param string $streetaddress
     */
    public function setStreetaddress($streetaddress)
    {
        $this->streetaddress = $streetaddress;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     */
    public function setProvince($province)
    {
        $this->province = $province;
    }

    /**
     * @return string
     */
    public function getPostalcode()
    {
        return $this->postalcode;
    }

    /**
     * @param string $postalcode
     */
    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }

    /**
     * @return mixed
     */
    public function getSalonownerid()
    {
        return $this->salonownerid;
    }

    /**
     * @param mixed $salonownerid
     */
    public function setSalonownerid($salonownerid)
    {
        $this->salonownerid = $salonownerid;
    }
}