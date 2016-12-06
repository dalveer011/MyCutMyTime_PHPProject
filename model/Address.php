<?php

/**
 * Created by PhpStorm.
 * User: DALVEERSINGH
 * Date: 10/23/2016
 * Time: 10:01 AM
 */
class Address
{
    private $streetadress;
    private $city;
    private $province;
    private $postalcode;
    private $phone;

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

    public function getStreetadress()
    {
        return $this->streetadress;
    }

    public function setStreetadress($streetadress)
    {
        $this->streetadress = $streetadress;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }

    public function getPostalcode()
    {
        return $this->postalcode;
    }

    public function setPostalcode($postalcode)
    {
        $this->postalcode = $postalcode;
    }
}