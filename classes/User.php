<?php

/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */
class User
{
    function __construct($mysqli)
    {
        $this->connection = $mysqli;
        $this->Helper = new Helper($mysqli);
    }

    function create($username, $password, $firstName, $lastName)
    {
        //Creates new user
        $firstName = $this->Helper->cleanInput($firstName);
        $lastName = $this->Helper->cleanInput($lastName);
        $username = $this->Helper->cleanInput($username);
        $password = hash("sha512", $password);

        $query = "
        INSERT INTO users (id, firstname, lastname, username, passwd) VALUES (
        NULL, ?, ?, ?, ?);
        ";

        $stmt = $this->connection->prepare($query);
        $stmt->bind_param("ssss", $firstName, $lastName, $username, $password);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function login($username, $password)
    {
        echo $username . "<br>";
        echo $password;
        $stmt = $this->connection->prepare('SELECT id, username, passwd, firstname FROM users WHERE username = ?;');
        echo $this->connection->error;
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($dbId, $dbUser, $dbPasswd, $dbFirstname);

        $hash = hash("sha512", $password);
        echo "<br>HASH<br>" . $hash . "<br>DB<br>" . $dbPasswd . "<br>";

        if ($hash == $dbPasswd) {
            $_SESSION["userId"] = $dbId;
            $_SESSION["username"] = $dbUser;
            $_SESSION["firstname"] = $dbFirstname;
            return true;
        } else {
            return false;
        }


    }
}


