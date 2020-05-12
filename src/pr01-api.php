<?php
namespace kok\api;

include 'Venta.php';
use PDO;

class ApiVentes{

    function getByName($name) {
      $venta = new Venta();
      $result = $venta->getVentaByName($name);
      $this->show($result);
    }

    function getByDate($date) {
      $venta = new Venta();
      $result = $venta->getVentaByDate($date);
      $this->show($result);
    }

    function getAll() {
      $venta = new Venta();
      $result = $venta->getVentes();
      $this->show($result);
    }

    function show($result){
        $ventes = array();
        $ventes['register'] = array();

        if($result->rowCount()){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                $register = array(
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                    'city' => $row['city'],
                    'date' => $row['date'],
                    'qty' => $row['qty'],
                );
                array_push($ventes['register'], $register);
            }

            http_response_code(200);
            echo json_encode($ventes);
        }else{
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
    }
}


$api = new ApiVentes();
if (isset($_GET['name'])) {

  echo "search by name<br>";
  $api->getByName($_GET['name']);

} else if (isset($_GET['date'])) {

  echo "search by date<br>";
  $api->getByDate($_GET['date']);

} else {

  echo "search all<br>";
  $api->getAll();

}
?>
