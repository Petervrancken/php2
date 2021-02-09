<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );

class User
{
    private $userId;
    private $userVoorNaam;
    private $userEmail;

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserVoorNaam()
    {
        return $this->userVoorNaam;
    }

    /**
     * @param mixed $userVoorNaam
     */
    public function setUserVoorNaam($userVoorNaam)
    {
        $this->userVoorNaam = $userVoorNaam;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }
}