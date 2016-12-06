<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:25 PM
 */
class Reviews
{
    private $id, $reviewtitle, $reviewdescription, $rating, $salonid, $customerid;

    public function __construct($reviewtitle, $reviewdescription, $rating, $salonid, $customerid)
    {
        $this->reviewtitle = $reviewtitle;
        $this->reviewdescription = $reviewdescription;
        $this->rating = $rating;
        $this->salonid = $salonid;
        $this->customerid = $customerid;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getReviewtitle()
    {
        return $this->reviewtitle;
    }

    /**
     * @param mixed $reviewtitle
     */
    public function setReviewtitle($reviewtitle)
    {
        $this->reviewtitle = $reviewtitle;
    }

    /**
     * @return mixed
     */
    public function getReviewdescription()
    {
        return $this->reviewdescription;
    }

    /**
     * @param mixed $reviewdescription
     */
    public function setReviewdescription($reviewdescription)
    {
        $this->reviewdescription = $reviewdescription;
    }

    /**
     * @return mixed
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * @param mixed $rating
     */
    public function setRating($rating)
    {
        $this->rating = $rating;
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
}