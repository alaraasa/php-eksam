<?php

/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */
class Monitor
{
    function __construct($mysqli)
    {
        $this->connection = $mysqli;
        $this->Helper = new Helper($mysqli);
    }

    function add($size, $type, $maker, $username)
    {

    }
    function get(){
        $query = "SELECT id, size, make, maker FROM monitors";
        if ($stmt = $this->connection->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($id, $size, $make, $maker);
            $result = array();
            while ($stmt->fetch()) {
                $this->id = $id;
                $this->size = $size;
                $this->make = $make;
                $this->maker = $maker;

                array_push($result, $this);
            }
        } else {
            echo "GET error";
            $result = "";
        }
        return $result;
    }

    function getTypes(){
        $query = "SELECT monitortype FROM types";
        if ($stmt = $this->connection->prepare($query)) {
            $stmt->execute();
            $stmt->bind_result($type);
            $result = array();
            while ($stmt->fetch()) {
                $this->type = $type;
                array_push($result, $this);
            }
        } else {
            echo "GETTYPES error";
            $result = "";
        }
        return $result;
    }

}