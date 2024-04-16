<?php
class User{
    private string $ID,$PassWord,$FirstName,$LastName,$Email,$CreatedAt,$LastLogin,$Status,$img;
    //ID
    public function getID()
    {
        return $this->ID;
    } 
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }
    //Password
    public function getPassWord()
    {
        return $this->PassWord;
    }
    public function setPassWord($PassWord)
    {
        $this->PassWord = $PassWord;

        return $this;
    }
    //FirstName
    public function getFirstName()
    {
        return $this->FirstName;
    }
    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;

        return $this;
    }
    //LastName
    public function getLastName()
    {
        return $this->LastName;
    }
    public function setLastName($LastName)
    {
        $this->LastName = $LastName;

        return $this;
    }
    //EMAIL
    public function getEmail()
    {
        return $this->Email;
    }
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }
    //CreatedAt
    public function getCreatedAt()
    {
        return $this->CreatedAt;
    }
    public function setCreatedAt($CreatedAt)
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }
    //LastLogin
    public function getLastLogin()
    {
        return $this->LastLogin;
    }
    public function setLastLogin($LastLogin)
    {
        $this->LastLogin = $LastLogin;

        return $this;
    }
    //STATUS
    public function getStatus()
    {
        return $this->Status;
    }
    public function setStatus($Status)
    {
        $this->Status = $Status;

        return $this;
    }
    //IMG
    public function getImg()
    {
        return $this->img;
    }
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }
    public function __construct(string $ID,  string $PassWord, string $FirstName, string $LastName, string $Email, string $CreatedAt, string $LastLogin, string $Status, string $img)
    {
        $this->ID=$ID;
        $this->PassWord=$PassWord;
        $this->FirstName=$FirstName;
        $this->LastName=$LastName;
        $this->Email=$Email;
        $this->CreatedAt=$CreatedAt;
        $this->LastLogin=$LastLogin;
        $this->Status=$Status;
        $this->img=$img;
    }
}
?>