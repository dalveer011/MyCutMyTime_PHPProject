<?php

/**
 * Created by PhpStorm.
 * User: mazhar
 * Date: 2016-12-01
 * Time: 12:15 AM
 */
class Reviews_db
{
    public function addReviews($review){

        $db = Database::getConnection();

        $reviewTitle = $review->getReviewtitle();
        $reviewDesc = $review->getReviewdescription();
        $rating = $review->getRating();
        $salonId = $review->getSalonid();
        $customerId = $review->getCustomerid();

        $query = 'INSERT INTO review 
                      (reviewtitle, reviewdescription, rating, salonid, customerid) 
                  VALUES 
                      (:reviewtitle, :reviewdescription, :rating, :salonid, :customerid)';
        try
        {
            $statement = $db->prepare($query);
            $statement->bindValue(':reviewtitle', $reviewTitle);
            $statement->bindValue(':reviewdescription', $reviewDesc);
            $statement->bindValue(':rating', $rating);
            $statement->bindValue(':salonid', $salonId);
            $statement->bindValue(':customerid', $customerId);
            $statement->execute();
            $statement->closeCursor();

        }catch (PDOException $e){
            echo "There was a problem with the insert statement on reviews table. Here is the error: ". $e->getMessage();
        }
    }

    public function getReviewBySalonId($salonid){

        $db = Database::getConnection();

        $query = 'Select * from review WHERE salonid = :salonid';
        $statement = $db->prepare($query);
        $statement->bindValue(':salonid', $salonid);
        $statement->execute();
        $reviews = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $reviews;
    }
    public function getReviewById($reviewId){

        $db = Database::getConnection();

        $query = 'Select * from review WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $reviewId);
        $statement->execute();
        $review = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $review;
    }
    public function deleteReview($reviewId){
        $db = Database::getConnection();
        $query = 'delete  from review WHERE id = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $reviewId);
        $statement->execute();
        $statement->closeCursor();
    }

    public function updateReportAbuse($id){

        $db = Database::getConnection();

        $query = 'UPDATE review
                    SET abusestatus = 1
                    WHERE id = :reviewid';

        $statement = $db->prepare($query);
        $statement->bindValue(':reviewid', $id);
        $statement->execute();
        $statement->closeCursor();
    }
    public function takeActionReviews($email, $action, $reviewid)
    {
        $db = Database::getConnection();
         if ($action == "deactivate") {
            $query = "update role set activationtoken='deactivated' where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
             $statement->closeCursor();
             //I am deleting it in reviews in this email method;
             SendingEmail::sendingDeactivationEmail($email,$reviewid);
        } else {
            //getting salon owner email
            SendingEmail::sendSalonOwnerResponseForReportedAbuse($reviewid);
//             changing status of review
             $query = "update review set abusestatus=0 where id=:id";
             $statement = $db->prepare($query);
             $statement->bindValue(':id',$reviewid);
             $statement->execute();
             $statement->closeCursor();
        }
    }
    public function getSalonEmailByReviewId($reviewid){

        $db = Database::getConnection();

        $query = 'select salonid from review
                    WHERE id = :reviewid';
        $statement = $db->prepare($query);
        $statement->bindValue(':reviewid', $reviewid);
        $statement->execute();
        $salon = $statement->fetchAll(PDO::FETCH_ASSOC);
        $salonid = $salon['salonid'];
        $statement->closeCursor();
        $salon_db = new Salons_db();
        return $salon_db->getSalonEmailById($salonid);
    }
}