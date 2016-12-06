<?php
class SalonOwner
{
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $password;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
//   creating a method for adding salon owners to Database but first checking if the emaild id
// entered by owner already exists or not
    public function createOwner($salonOwner){
        if(LoginAuthentication::IsEmailAlreadyThere($salonOwner->getEmail())){
            return false;
        }else {
            $db = Database::getConnection();
            //adding data to role table
            //generating activation token
            $activationToken = password_hash($salonOwner->getEmail(),PASSWORD_BCRYPT);
            SendingEmail::sendActivationEmail($salonOwner->getEmail(),$activationToken);
            $addintoRole = "insert into role(email,password,role,activationToken) values(:email,:password,'Salon Owner',:token)";
            $statement_two = $db->prepare($addintoRole);
            $statement_two->bindValue(':email', $salonOwner->getEmail());
            $statement_two->bindValue(':token', $activationToken);
            $statement_two->bindValue(':password',password_hash($salonOwner->getPassword(),PASSWORD_BCRYPT));
            $statement_two->execute();
            $statement_two->closeCursor();
            //adding data to salonowner table
            $query = "insert into salonowner(email,firstname,lastname)
              values(:email,:firstname,:lastname)";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $salonOwner->getEmail());
            $statement->bindValue(':firstname', $salonOwner->getFName());
            $statement->bindValue(':lastname', $salonOwner->getLName());

            $statement->execute();
            $statement->closeCursor();
            return true;
        }
    }
    public function getSalonOwnerId ($email){
        $db = Database::getConnection();

        $query = 'SELECT * FROM salonowner WHERE email = :email'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['id'];
    }
    public function getSalonOwnerEmailById ($id){
        $db = Database::getConnection();

        $query = 'SELECT * FROM salonowner WHERE id = :id'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $id);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['email'];
    }
    public function getSalonOwnerName ($email){
        $db = Database::getConnection();

        $query = 'SELECT * FROM salonowner WHERE email = :email'; //use email
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result['firstname']. ' ' . $result['lastname'];
    }
}