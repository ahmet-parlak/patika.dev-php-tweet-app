<?php

namespace TweetApp;

class User
{
    private $userId;
    private $username;
    private $userPictureUrl;

    public function __construct($userId, $username, $userPictureUrl = null)
    {
        $this->userId = $userId;
        $this->username = $username;
        $this->userPictureUrl = $userPictureUrl;
    }

    public function getUserId()
    {
        return $this->userId;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getUserPictureUrl()
    {
        return $this->userPictureUrl;
    }
}
