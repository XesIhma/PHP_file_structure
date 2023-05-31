<?php

use App\Classes\View;
require_once realpath("../vendor/autoload.php");


$homeView = new View("home");

$data = array(
  "name" => "Horld"
);




try {
  $homeView->render($data);
}catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>

