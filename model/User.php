<?php
class User
{
    private $firstName;
    private $lastName;
    private $email;
    private $role;
    private $password;
    private $address;

    public function __construct()
    {

    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getRole()
    {
        return $this->role;
    }


    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }
    //this method is to add user to database but first it is checking if email id entered
   // during registration exists or not
    public function createUser($user){
        if(LoginAuthentication::IsEmailAlreadyThere($user->getEmail())){
           return false;
        }else {
            $db = Database::getConnection();
            //using password hash for token by email because email is unique
            $token = password_hash($user->getEmail(),PASSWORD_BCRYPT);
            $addintoRole = "insert into role(email,password,role,activationtoken) values(:email,:password,:role,:token)";
            $statement_two = $db->prepare($addintoRole);
            $statement_two->bindValue(':email', $user->getEmail());
            $statement_two->bindValue(':role', 'User');
            $statement_two->bindValue(':token', $token);
            $statement_two->bindValue(':password', password_hash($user->getPassword(),PASSWORD_BCRYPT));
            $statement_two->execute();
            $statement_two->closeCursor();
            //sending an verification email
            SendingEmail::sendActivationEmail($user->getEmail(),$token);

            $query = "insert into customer(postalcode,email,firstname,lastname,streetaddress,city,phone,province)
              values('empty',:email,:firstname,:lastname,'Not provided','Not provided','Not provided','Not provided')";
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $user->getEmail());
            $statement->bindValue(':firstname', $user->getFirstName());
            $statement->bindValue(':lastname', $user->getLastName());

            $statement->execute();
            $statement->closeCursor();
            return true;
        }
    }

    public function getCustomeridByemail($email){
        $db = Database::getConnection();
        $statement = $db->prepare("select id from customer where email=:email");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $customer = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $customer['id'];
    }
    public function getCustomerDetailsByemail($email){
        $db = Database::getConnection();
        $statement = $db->prepare("select * from customer where email=:email");
        $statement->bindValue(':email',$email);
        $statement->execute();
        $customer = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $customer;
    }
    public function getCustomerEmailByid($id){
        $db = Database::getConnection();
        $statement = $db->prepare("select * from customer where id=:id");
        $statement->bindValue(':id',$id);
        $statement->execute();
        $customer = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();
        return $customer['email'];
    }
    public function updatePassword($password,$email){
        $db = Database::getConnection();
        $encryptedPassword = password_hash($password,PASSWORD_BCRYPT);
        $statement = $db->prepare("update role set password = :password where email=:email");
        $statement->bindValue(':email',$email);
        $statement->bindValue(':password',$encryptedPassword);
        $statement->execute();
        $statement->closeCursor();

    }


}