<?php

use App\Classes\View;
require_once realpath("../vendor/autoload.php");


$homeView = new View("home");



try {
  $homeView->render();
}catch (Exception $e) {
  echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>

