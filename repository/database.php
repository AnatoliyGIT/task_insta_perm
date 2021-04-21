<?php

class DATABASE
{
    private $args = array('host'=>'localhost', 'database'=>'insta', 'user'=>'root', 'password'=>'');

    public function __construct(){}

    public function get_results($query)
    {
        $link = mysqli_connect($this->args['host'], $this->args['user'], $this->args['password'], $this->args['database'])
        or die("Ошибка подключения" . mysqli_error($link));
        $res = mysqli_query($link, $query);
        mysqli_close($link);
        return $res;
    }



//$query = "SELECT `name`, `last_name`, `email` FROM `users` WHERE `id` = 1";
//$result = mysqli_query($link, $query) or die("Ошибка" . mysqli_error($link));

//debug_to_text_file($result->fetch_assoc(), '$result');



}