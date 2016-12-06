<?php


class Admin_db
{
    public function getAllUsers()
    {
        $db = Database::getConnection();
        $query = "select * from customer";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSalonOwners()
    {
        $db = Database::getConnection();
        $query = "select * from salonowner";
        $statement = $db->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAccountStatus($email)
    {
        $status = "";
        $db = Database::getConnection();
        $query = "select * from role where email=:email";
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result['activationtoken'] == "activated") {
            $status = "activated";
        } else if ($result['activationtoken'] == "deactivated") {
            $status = "deactivated";
        } else {
            $status = "Under Verification";
        }
        return $status;
    }

    public function getReportedReviews()
    {
        $db = Database::getConnection();
        $query = "select * from review  where abusestatus=:abusestatus";
        $statement = $db->prepare($query);
        $statement->bindValue(':abusestatus', 1);
        $statement->execute();
        if ($statement->rowCount() > 0) {
            return $statement->fetchAll();
        } else {
            return "No Reviews were reported";
        }
    }

    public function takeAction($email, $action)
    {
        $db = Database::getConnection();
        if ($action == "activate") {
         $query = "update role set activationtoken='activated' where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
            SendingEmail::sendReactivate($email);
        } else if ($action == "deactivate") {
            $query = "update role set activationtoken='deactivated' where email=:email";
            $statement = $db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
        } else {
            $query = "delete from role  where email=:email";
            $queryTwo = "delete from customer where email=:email";
            $statementTwo = $db->prepare($queryTwo);
            $statement = $db->prepare($query);
            $statement->bindValue(':email',$email);
            $statement->execute();
            $statementTwo->bindValue(':email',$email);
            $statementTwo->execute();
            $statement->closeCursor();
            $statementTwo->closeCursor();
        }
    }
}