<?php
namespace kok\api;

require 'DBconn.php';

class Venta extends DBconn{

    function getVentes(){
        $result = $this->connect()->query('SELECT * FROM ventes');
        return $result;
    }

    function getVentaByName($name){
        $stmt = $this->connect()->prepare("SELECT * FROM ventes WHERE name LIKE :name");
        $stmt->execute([':name' => '%'.$name.'%']);
        return $stmt;
    }

    function getVentaByDate($date){
        $stmt = $this->connect()->prepare("SELECT * FROM ventes WHERE date >= :date");
        $stmt->execute([':date' => $date]);
        return $stmt;
    }

}
?>
