<?php

/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */
class Helper
{
    function __construct($mysqli){
        $this->connection = $mysqli;
    }

    function cleanInput($input)
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
}