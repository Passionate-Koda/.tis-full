<?php
#Define App Path
define("APP_PATH", dirname(dirname(__FILE__)));

#load database


#load Controllers Tworkers
require APP_PATH."/controllers/admin_controller.php";
require APP_PATH."/controllers/tworker_controller.php";

#load routes
require APP_PATH."/route/router.php";
 ?>
