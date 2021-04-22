<?php

class DATABASE
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'insta';

    public function query($query)
    {
        $link = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        return $res;
    }
}