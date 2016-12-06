<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-11-01
 * Time: 2:36 PM
 */
class Promotions
{
    private $promotionid, $serviceid, $promotion, $startdate, $enddate;

    public function __construct($serviceid, $promotion, $startdate, $enddate)
    {
        $this->serviceid = $serviceid;
        $this->promotion = $promotion;
        $this->startdate = $startdate;
        $this->enddate = $enddate;
    }

    /**
     * @return mixed
     */
    public function getPromotionid()
    {
        return $this->promotionid;
    }

    /**
     * @param mixed $promotionid
     */
    public function setPromotionid($promotionid)
    {
        $this->promotionid = $promotionid;
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
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * @param mixed $promotion
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * @param mixed $startdate
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return mixed
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * @param mixed $enddate
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;
    }
}