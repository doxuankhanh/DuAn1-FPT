<?php
if(session_id() !== null) {
    session_start();
}else {
    session_destroy();
}
date_default_timezone_set("Asia/Ho_Chi_Minh");
require_once "app/request.php";

$app = new App();
?>