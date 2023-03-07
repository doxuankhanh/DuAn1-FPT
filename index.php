<?php
if (session_id() === null) {
    session_start();
}
require_once "app/request.php";
$app = new App();
?>